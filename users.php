<?php
require_once '../includes/session.php';
require_once '../config/db.php';
requireLogin();
requirePermission('view_users');

// Handle Actions: Toggle Active/Inactive
if (isset($_GET['action']) && $_GET['action'] === 'toggle' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id > 0) {
        mysqli_query($conn, "UPDATE users SET is_active = NOT is_active WHERE user_id = $id");
        header('Location: users.php');
        exit;
    }
}

// Search
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$where  = $search ? "WHERE first_name LIKE ? OR last_name LIKE ? OR username LIKE ? OR email LIKE ?" : "";
$stmt   = mysqli_prepare($conn, "SELECT * FROM users $where ORDER BY created_at DESC");
if ($search) {
    $s = "%$search%";
    mysqli_stmt_bind_param($stmt, 'ssss', $s, $s, $s, $s);
}
mysqli_stmt_execute($stmt);
$users = mysqli_stmt_get_result($stmt);

$pageTitle = 'Users';
require_once '../includes/admin_header.php';
?>

<div class="page-header">
  <div>
    <div class="page-title">System <span>Users</span></div>
    <div class="breadcrumb">Dashboard › Manage admin and staff accounts</div>
  </div>
  <div style="display:flex;gap:12px">
    <?php if(can('register_users')): ?>
    <a href="register_user.php" class="btn btn-primary"><i class="fas fa-user-plus"></i> Add User</a>
    <?php endif; ?>
  </div>
</div>

<!-- Search Bar -->
<div class="card" style="margin-bottom:24px">
  <div style="padding:20px">
    <form method="GET" style="display:flex;gap:10px;align-items:center">
      <input type="text" name="search" placeholder="🔍 Search users by name, username or email..." 
             value="<?= htmlspecialchars($search) ?>"
             style="flex:1;padding:12px 16px;background:rgba(255,255,255,.05);border:1px solid var(--border);border-radius:8px;color:var(--text);font-size:14px">
      <button type="submit" class="btn btn-blue"><i class="fas fa-magnifying-glass"></i> Search</button>
      <?php if($search): ?>
      <a href="users.php" class="btn btn-muted"><i class="fas fa-xmark"></i> Clear</a>
      <?php endif; ?>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h2><i class="fas fa-users" style="color:#f59e0b"></i> &nbsp;User List</h2>
    <span style="font-size:12px;color:#64748b">
      <?= mysqli_num_rows($users) ?> total • <?= $search ? "Filtered results for '$search'" : 'All users' ?>
    </span>
  </div>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Status</th>
        <th>Joined</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1; mysqli_data_seek($users,0); while($u = mysqli_fetch_assoc($users)): ?>
      <tr>
        <td style="color:#64748b"><?= $i++ ?></td>
        <td style="display:flex;align-items:center;gap:12px">
          <div style="width:36px;height:36px;border-radius:50%;background:<?= $u['role']==='admin'?'linear-gradient(135deg,#f59e0b,#ef4444)':'linear-gradient(135deg,#3b82f6,#8b5cf6)' ?>;display:flex;align-items:center;justify-content:center;font-weight:700;color:#fff;font-size:14px">
            <?= strtoupper(substr($u['first_name'],0,1)) ?>
          </div>
          <strong><?= htmlspecialchars($u['first_name'] . ' ' . $u['last_name']) ?></strong>
        </td>
        <td style="color:#f59e0b;font-family:monospace">@<?= htmlspecialchars($u['username']) ?></td>
        <td style="color:#64748b;font-size:13px"><?= htmlspecialchars($u['email']) ?></td>
        <td><?= htmlspecialchars($u['phone'] ?? '—') ?></td>
        <td><span class="badge <?= $u['role']==='admin'?'badge-admin':'badge-staff' ?>"><?= $u['role'] ?></span></td>
        <td>
          <?php if($u['is_active']): ?>
            <span style="color:#22c55e;font-weight:600;display:flex;align-items:center;gap:6px">
              <i class="fas fa-circle-check"></i> Active
            </span>
          <?php else: ?>
            <span style="color:#ef4444;font-weight:600;display:flex;align-items:center;gap:6px">
              <i class="fas fa-circle-xmark"></i> Inactive
            </span>
          <?php endif; ?>
        </td>
        <td style="color:#64748b"><?= date('M d, Y', strtotime($u['created_at'])) ?></td>
        <td>
          <div style="display:flex;gap:8px;flex-wrap:wrap">
            <!-- View -->
            <button onclick="viewUser(<?= $u['user_id'] ?>)" class="btn btn-sm btn-muted" title="View Details">
              <i class="fas fa-eye"></i>
            </button>
            
            <!-- Toggle Status -->
            <?php if(can('update_users')): ?>
            <a href="?action=toggle&id=<?= $u['user_id'] ?>" 
               class="btn btn-sm <?= $u['is_active'] ? 'btn-danger' : 'btn-success' ?>" 
               title="<?= $u['is_active'] ? 'Deactivate' : 'Activate' ?>"
               onclick="return confirm('<?= $u['is_active'] ? 'Deactivate' : 'Activate' ?> this user?')">
              <i class="fas fa-power-off"></i>
            </a>
            <?php endif; ?>
            
            <!-- Update -->
            <?php if(can('update_users')): ?>
            <a href="update_user.php?id=<?= $u['user_id'] ?>" class="btn btn-sm btn-blue" title="Edit User">
              <i class="fas fa-pen"></i>
            </a>
            <?php endif; ?>
            
            <!-- Delete (can't delete yourself) -->
            <?php if(can('delete_users') && $u['user_id'] !== $_SESSION['user_id']): ?>
            <button onclick="deleteUser(<?= $u['user_id'] ?>, '<?= htmlspecialchars(addslashes($u['username'])) ?>')"
                    class="btn btn-sm btn-danger" title="Delete User">
              <i class="fas fa-trash"></i>
            </button>
            <?php endif; ?>
          </div>
        </td>
      </tr>
    <?php endwhile; ?>
    <?php if(mysqli_num_rows($users)==0): ?>
      <tr><td colspan="9" style="text-align:center;padding:40px;color:#64748b">
        <i class="fas fa-users" style="font-size:40px;display:block;margin-bottom:12px;opacity:0.3"></i>
        <?= $search ? "No users found matching '$search'" : 'No users yet' ?>
      </td></tr>
    <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- View Modal -->
<div class="modal-overlay" id="viewModal">
  <div class="modal">
    <div class="modal-title">User Details
      <span class="modal-close" onclick="closeModal()"><i class="fas fa-xmark"></i></span>
    </div>
    <div id="modal-body" style="color:#94a3b8;font-size:14px;line-height:2"></div>
  </div>
</div>

<script>
const users = <?php
  $arr = [];
  $res = mysqli_query($conn,"SELECT user_id,first_name,last_name,email,username,phone,role,is_active,created_at FROM users");
  while($r = mysqli_fetch_assoc($res)) $arr[] = $r;
  echo json_encode($arr);
?>;

function viewUser(id) {
  const u = users.find(x => x.user_id == id);
  if (!u) return;
  const initial = u.first_name[0].toUpperCase();
  const bgColor = u.role === 'admin' ? 'linear-gradient(135deg,#f59e0b,#ef4444)' : 'linear-gradient(135deg,#3b82f6,#8b5cf6)';
  document.getElementById('modal-body').innerHTML = `
    <div style="display:flex;align-items:center;gap:16px;margin-bottom:20px">
      <div style="width:64px;height:64px;border-radius:50%;background:${bgColor};display:flex;align-items:center;justify-content:center;font-size:26px;font-weight:800;color:#fff">${initial}</div>
      <div>
        <div style="font-size:18px;font-weight:700;color:#f8fafc">${u.first_name} ${u.last_name}</div>
        <div style="color:#64748b">@${u.username}</div>
      </div>
    </div>
    <table style="width:100%">
      <tr><td style="color:#64748b;width:90px">Email</td><td style="color:#f8fafc">${u.email}</td></tr>
      <tr><td style="color:#64748b">Phone</td><td>${u.phone||'—'}</td></tr>
      <tr><td style="color:#64748b">Role</td><td><span style="color:${u.role==='admin'?'#f59e0b':'#3b82f6'};font-weight:700;text-transform:uppercase">${u.role}</span></td></tr>
      <tr><td style="color:#64748b">Status</td><td><span style="color:${u.is_active=='1'?'#22c55e':'#ef4444'};font-weight:700">${u.is_active=='1'?'✓ Active':'✗ Inactive'}</span></td></tr>
      <tr><td style="color:#64748b">Joined</td><td>${new Date(u.created_at).toLocaleDateString()}</td></tr>
    </table>`;
  document.getElementById('viewModal').classList.add('open');
}
function closeModal() {
  document.getElementById('viewModal').classList.remove('open');
}
function deleteUser(id, name) {
  if (!confirm(\`Delete user "@\${name}"?\nThis cannot be undone.\`)) return;
  fetch('delete_user.php?id=' + id)
    .then(r => r.json())
    .then(d => {
      alert(d.message);
      if (d.success) location.reload();
    });
}
</script>

<?php require_once '../includes/admin_footer.php'; ?>
