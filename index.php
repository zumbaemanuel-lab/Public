<?php
require_once '../includes/session.php';
require_once '../config/db.php';
requireLogin();
requirePermission('view_products');

// Stats
$total_products = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) c FROM products"))['c'];
$total_users    = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) c FROM users"))['c'];
$low_stock      = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) c FROM products WHERE quantity<10"))['c'];
$total_value    = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(price*quantity) v FROM products"))['v'] ?? 0;

// Search
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$where  = $search ? "WHERE name LIKE ? OR brand LIKE ? OR category LIKE ?" : "";
$stmt   = mysqli_prepare($conn, "SELECT p.*, u.username as added_by FROM products p
  LEFT JOIN users u ON p.created_by=u.user_id $where ORDER BY p.created_at DESC");
if ($search) {
    $s = "%$search%";
    mysqli_stmt_bind_param($stmt,'sss',$s,$s,$s);
}
mysqli_stmt_execute($stmt);
$products = mysqli_stmt_get_result($stmt);

// Recent activity
$recent = mysqli_query($conn,"SELECT p.*, u.username as added_by FROM products p
  LEFT JOIN users u ON p.created_by=u.user_id ORDER BY p.created_at DESC LIMIT 5");

$pageTitle = 'Dashboard';
require_once '../includes/admin_header.php';
?>

<div class="page-header">
  <div>
    <div class="page-title">Dashboard <span>/ Product Management</span></div>
    <div class="breadcrumb">Welcome back, <?= htmlspecialchars($_SESSION['first_name'] ?? 'Admin') ?> &mdash; <?= date('l, F j, Y') ?></div>
  </div>
  <div style="display:flex;gap:12px;align-items:center">
    <span class="badge badge-<?= isAdmin()?'admin':'staff' ?>" style="font-size:11px;padding:6px 14px">
      <?= strtoupper(getUserRole()) ?> ACCOUNT
    </span>
    <?php if(can('add_products')): ?>
    <a href="upload_product.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add Product</a>
    <?php endif; ?>
  </div>
</div>

<!-- Stats -->
<div class="stats-grid">
  <div class="stat-card" style="border-color:#f59e0b">
    <div class="stat-icon" style="background:rgba(245,158,11,.15);color:#f59e0b"><i class="fas fa-boxes-stacked"></i></div>
    <div><div class="stat-val"><?= $total_products ?></div><div class="stat-lbl">Total Products</div></div>
  </div>
  <div class="stat-card" style="border-color:#3b82f6">
    <div class="stat-icon" style="background:rgba(59,130,246,.15);color:#3b82f6"><i class="fas fa-users"></i></div>
    <div><div class="stat-val"><?= $total_users ?></div><div class="stat-lbl">System Users</div></div>
  </div>
  <div class="stat-card" style="border-color:#ef4444">
    <div class="stat-icon" style="background:rgba(239,68,68,.15);color:#ef4444"><i class="fas fa-triangle-exclamation"></i></div>
    <div><div class="stat-val"><?= $low_stock ?></div><div class="stat-lbl">Low Stock Alert</div></div>
  </div>
  <div class="stat-card" style="border-color:#22c55e">
    <div class="stat-icon" style="background:rgba(34,197,94,.15);color:#22c55e"><i class="fas fa-money-bill-trend-up"></i></div>
    <div><div class="stat-val">Tsh <?= number_format($total_value/1000) ?>k</div><div class="stat-lbl">Inventory Value</div></div>
  </div>
</div>

<!-- Recent Activity -->
<div class="card" style="margin-top:32px">
  <div class="card-header">
    <h2><i class="fas fa-clock-rotate-left" style="color:#f59e0b"></i> &nbsp;Recent Activity</h2>
    <span style="font-size:12px;color:#64748b">Last 5 products added</span>
  </div>
  <table>
    <thead>
      <tr><th>Product</th><th>Brand</th><th>Price</th><th>Stock</th><th>Category</th><th>Added By</th><th>Date</th></tr>
    </thead>
    <tbody>
    <?php while($p = mysqli_fetch_assoc($recent)): ?>
      <tr>
        <td style="display:flex;align-items:center;gap:12px">
          <img src="<?= htmlspecialchars($p['image_url'] ?: 'https://via.placeholder.com/40') ?>"
               style="width:40px;height:40px;border-radius:6px;object-fit:cover;border:1px solid var(--border)">
          <strong><?= htmlspecialchars($p['name']) ?></strong>
        </td>
        <td><?= htmlspecialchars($p['brand']) ?></td>
        <td style="color:#f59e0b;font-weight:700">Tsh <?= number_format($p['price']) ?></td>
        <td>
          <?php $c = $p['quantity']<10 ? '#ef4444' : ($p['quantity']<30 ? '#f59e0b' : '#22c55e'); ?>
          <span style='color:<?=$c?>;font-weight:600'><?=$p['quantity']?></span>
        </td>
        <td><span style="background:rgba(59,130,246,.1);color:#3b82f6;padding:4px 10px;border-radius:20px;font-size:11px"><?= htmlspecialchars($p['category']) ?></span></td>
        <td style="color:#64748b"><?= htmlspecialchars($p['added_by'] ?? '—') ?></td>
        <td style="color:#64748b;font-size:13px"><?= date('M d, Y', strtotime($p['created_at'])) ?></td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
</div>

<!-- All Products with Search -->
<div class="card" style="margin-top:32px">
  <div class="card-header">
    <h2><i class="fas fa-boxes-stacked" style="color:#f59e0b"></i> &nbsp;Product List</h2>
    <form method="GET" style="display:flex;gap:10px">
      <input type="text" name="search" placeholder="Search products..." value="<?= htmlspecialchars($search) ?>"
             style="padding:8px 16px;background:rgba(255,255,255,.05);border:1px solid var(--border);border-radius:8px;color:var(--text);font-size:13px">
      <button type="submit" class="btn btn-sm btn-blue"><i class="fas fa-magnifying-glass"></i> Search</button>
      <?php if($search): ?>
      <a href="index.php" class="btn btn-sm btn-muted"><i class="fas fa-xmark"></i> Clear</a>
      <?php endif; ?>
    </form>
  </div>
  <table>
    <thead>
      <tr><th>#</th><th>Image</th><th>Product</th><th>Brand</th><th>Price</th><th>Qty</th><th>Category</th><th>Added By</th><th>Actions</th></tr>
    </thead>
    <tbody>
    <?php $i=1; mysqli_data_seek($products,0); while($p = mysqli_fetch_assoc($products)): ?>
      <tr>
        <td style="color:#64748b"><?= $i++ ?></td>
        <td><img src="<?= htmlspecialchars($p['image_url'] ?: 'https://via.placeholder.com/48') ?>" class="product-thumb"></td>
        <td style="font-weight:600"><?= htmlspecialchars($p['name']) ?></td>
        <td><?= htmlspecialchars($p['brand']) ?></td>
        <td style="color:#f59e0b;font-weight:700"><?= number_format($p['price']) ?></td>
        <td>
          <?php
          $c = $p['quantity']<10 ? '#ef4444' : ($p['quantity']<30 ? '#f59e0b' : '#22c55e');
          echo "<span style='color:$c;font-weight:600'>{$p['quantity']}</span>";
          if($p['quantity']<10) echo " <i class='fas fa-triangle-exclamation' style='color:#ef4444;font-size:11px'></i>";
          ?>
        </td>
        <td><?= htmlspecialchars($p['category']) ?></td>
        <td style="color:#64748b"><?= htmlspecialchars($p['added_by'] ?? '—') ?></td>
        <td>
          <div style="display:flex;gap:6px;flex-wrap:wrap">
            <button onclick="viewProduct(<?= $p['product_id'] ?>)" class="btn btn-sm btn-muted"><i class="fas fa-eye"></i> View</button>
            <?php if(can('update_products')): ?>
            <a href="update_product.php?id=<?= $p['product_id'] ?>" class="btn btn-sm btn-success"><i class="fas fa-pen"></i> Update</a>
            <?php endif; ?>
            <?php if(can('delete_products')): ?>
            <button onclick="deleteProduct(<?= $p['product_id'] ?>, '<?= htmlspecialchars(addslashes($p['name'])) ?>')"
                    class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
            <?php endif; ?>
          </div>
        </td>
      </tr>
    <?php endwhile; ?>
    <?php if(mysqli_num_rows($products)==0): ?>
      <tr><td colspan="9" style="text-align:center;padding:40px;color:#64748b">
        <?= $search ? "No products found matching '$search'" : 'No products yet' ?>
      </td></tr>
    <?php endif; ?>
    </tbody>
  </table>
</div>

<div class="modal-overlay" id="viewModal">
  <div class="modal">
    <div class="modal-title">Product Details <span class="modal-close" onclick="closeModal()"><i class="fas fa-xmark"></i></span></div>
    <div id="modal-body" style="color:#94a3b8;font-size:14px;line-height:1.8"></div>
  </div>
</div>

<script>
const products = <?php
  $arr = [];
  $res = mysqli_query($conn,"SELECT * FROM products");
  while($r = mysqli_fetch_assoc($res)) $arr[] = $r;
  echo json_encode($arr);
?>;
function viewProduct(id) {
  const p = products.find(x => x.product_id == id);
  if (!p) return;
  document.getElementById('modal-body').innerHTML = `
    <img src="${p.image_url||'https://via.placeholder.com/200'}" style="width:100%;height:200px;object-fit:cover;border-radius:10px;margin-bottom:16px">
    <table style="width:100%">
      <tr><td style="color:#64748b;width:110px">Name</td><td style="font-weight:600;color:#f8fafc">${p.name}</td></tr>
      <tr><td style="color:#64748b">Brand</td><td>${p.brand}</td></tr>
      <tr><td style="color:#64748b">Price</td><td style="color:#f59e0b;font-weight:700">Tsh ${Number(p.price).toLocaleString()}</td></tr>
      <tr><td style="color:#64748b">Quantity</td><td style="font-weight:600;color:${p.quantity<10?'#ef4444':'#22c55e'}">${p.quantity} ${p.quantity<10?'⚠️ LOW':''}</td></tr>
      <tr><td style="color:#64748b">Category</td><td>${p.category}</td></tr>
      <tr><td style="color:#64748b">Description</td><td>${p.description||'—'}</td></tr>
      <tr><td style="color:#64748b">Added</td><td>${new Date(p.created_at).toLocaleDateString()}</td></tr>
    </table>`;
  document.getElementById('viewModal').classList.add('open');
}
function closeModal() { document.getElementById('viewModal').classList.remove('open'); }
function deleteProduct(id, name) {
  if (!confirm(`Delete "${name}"?\nThis cannot be undone.`)) return;
  fetch('delete_product.php?id=' + id).then(r => r.json()).then(d => { alert(d.message); if (d.success) location.reload(); });
}
</script>

<?php require_once '../includes/admin_footer.php'; ?>
