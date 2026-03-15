<?php
require_once '../includes/session.php';
require_once '../config/db.php';
requireLogin();
requirePermission('update_users');

$id = intval($_GET['id'] ?? 0);
if (!$id) { header('Location: users.php'); exit; }

$stmt = mysqli_prepare($conn,"SELECT * FROM users WHERE user_id=? LIMIT 1");
mysqli_stmt_bind_param($stmt,'i',$id);
mysqli_stmt_execute($stmt);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
if (!$user) { header('Location: users.php'); exit; }

$status = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fn   = trim($_POST['first_name'] ?? '');
    $ln   = trim($_POST['last_name']  ?? '');
    $em   = trim($_POST['email']      ?? '');
    $ph   = trim($_POST['phone']      ?? '');
    $role = trim($_POST['role']       ?? 'staff');
    $pw   = trim($_POST['password']   ?? '');

    if ($fn && $ln && $em) {
        if ($pw) {
            $stmt2 = mysqli_prepare($conn,"UPDATE users SET first_name=?,last_name=?,email=?,phone=?,role=?,password=? WHERE user_id=?");
            $hash  = password_hash($pw, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt2,'ssssssi',$fn,$ln,$em,$ph,$role,$hash,$id);
        } else {
            $stmt2 = mysqli_prepare($conn,"UPDATE users SET first_name=?,last_name=?,email=?,phone=?,role=? WHERE user_id=?");
            mysqli_stmt_bind_param($stmt2,'sssssi',$fn,$ln,$em,$ph,$role,$id);
        }
        $status = mysqli_stmt_execute($stmt2) ? 'success' : 'error';
        mysqli_stmt_close($stmt2);
        if ($status === 'success') {
            $user = array_merge($user,['first_name'=>$fn,'last_name'=>$ln,'email'=>$em,'phone'=>$ph,'role'=>$role]);
        }
    } else {
        $status = 'validation';
    }
}

$pageTitle = 'Update User';
require_once '../includes/admin_header.php';
?>
<?php if($status==='success'): ?><script>alert('✅ User updated successfully!');</script>
<?php elseif($status==='error'): ?><script>alert('❌ Update failed. Please try again.');</script>
<?php elseif($status==='validation'): ?><script>alert('⚠️ Please fill in all required fields.');</script>
<?php endif; ?>

<div class="page-header">
  <div>
    <div class="page-title">Update <span>User</span></div>
    <div class="breadcrumb">Dashboard › Edit user account</div>
  </div>
  <a href="users.php" class="btn btn-muted"><i class="fas fa-arrow-left"></i> Back to Users</a>
</div>

<div class="form-card">
  <form method="POST">
    <div class="form-row">
      <div class="form-group">
        <label>First Name *</label>
        <input type="text" name="first_name" required value="<?= htmlspecialchars($user['first_name']) ?>">
      </div>
      <div class="form-group">
        <label>Last Name *</label>
        <input type="text" name="last_name" required value="<?= htmlspecialchars($user['last_name']) ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label>Email *</label>
        <input type="email" name="email" required value="<?= htmlspecialchars($user['email']) ?>">
      </div>
      <div class="form-group">
        <label>Phone</label>
        <input type="tel" name="phone" value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label>Role</label>
        <select name="role">
          <option value="staff" <?= $user['role']==='staff'?'selected':'' ?>>Staff</option>
          <option value="admin" <?= $user['role']==='admin'?'selected':'' ?>>Admin</option>
        </select>
      </div>
      <div class="form-group">
        <label>New Password <span style="color:#64748b;font-weight:400">(leave blank to keep current)</span></label>
        <input type="password" name="password" placeholder="Enter new password">
      </div>
    </div>
    <div style="display:flex;gap:12px;margin-top:8px">
      <button type="submit" class="btn btn-primary"><i class="fas fa-floppy-disk"></i> Save Changes</button>
      <a href="users.php" class="btn btn-muted"><i class="fas fa-xmark"></i> Cancel</a>
    </div>
  </form>
</div>

<?php require_once '../includes/admin_footer.php'; ?>
