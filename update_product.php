<?php
require_once '../includes/session.php';
require_once '../config/db.php';
requireLogin();
requirePermission('update_products');

$id = intval($_GET['id'] ?? 0);
if (!$id) { header('Location: index.php'); exit; }

// Load product
$stmt = mysqli_prepare($conn,"SELECT * FROM products WHERE product_id=? LIMIT 1");
mysqli_stmt_bind_param($stmt,'i',$id);
mysqli_stmt_execute($stmt);
$product = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
if (!$product) { header('Location: index.php'); exit; }

$status = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $brand    = trim($_POST['brand'] ?? '');
    $price    = floatval($_POST['price'] ?? 0);
    $qty      = intval($_POST['quantity'] ?? 0);
    $desc     = trim($_POST['description'] ?? '');
    $category = trim($_POST['category'] ?? 'General');
    $image    = trim($_POST['image_url'] ?? '');

    if ($name && $brand && $price > 0) {
        $stmt2 = mysqli_prepare($conn,
            "UPDATE products SET name=?,brand=?,price=?,quantity=?,description=?,category=?,image_url=? WHERE product_id=?");
        mysqli_stmt_bind_param($stmt2,'ssdisssi',$name,$brand,$price,$qty,$desc,$category,$image,$id);
        $status = mysqli_stmt_execute($stmt2) ? 'success' : 'error';
        if ($status === 'success') $product = array_merge($product,compact('name','brand','price','qty','desc','category','image'));
        mysqli_stmt_close($stmt2);
    } else {
        $status = 'validation';
    }
}

$pageTitle = 'Update Product';
require_once '../includes/admin_header.php';
?>

<?php if($status==='success'): ?><script>alert('✅ Product updated successfully!');</script>
<?php elseif($status==='error'): ?><script>alert('❌ Update failed. Please try again.');</script>
<?php elseif($status==='validation'): ?><script>alert('⚠️ Please fill in all required fields.');</script>
<?php endif; ?>

<div class="page-header">
  <div>
    <div class="page-title">Update <span>Product</span></div>
    <div class="breadcrumb">Dashboard › Edit product details</div>
  </div>
  <a href="index.php" class="btn btn-muted"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="form-card">
  <form method="POST">
    <div class="form-row">
      <div class="form-group">
        <label>Product / Service Name *</label>
        <input type="text" name="name" required value="<?= htmlspecialchars($product['name']) ?>">
      </div>
      <div class="form-group">
        <label>Brand *</label>
        <input type="text" name="brand" required value="<?= htmlspecialchars($product['brand']) ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label>Price (Tsh) *</label>
        <input type="number" name="price" required min="0" step="0.01" value="<?= $product['price'] ?>">
      </div>
      <div class="form-group">
        <label>Quantity *</label>
        <input type="number" name="quantity" required min="0" value="<?= $product['quantity'] ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label>Category</label>
        <select name="category">
          <?php foreach(['General','Electronics','Fashion','Home','Sports','Food','Health'] as $c): ?>
          <option value="<?= $c ?>" <?= $product['category']===$c?'selected':'' ?>><?= $c ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Image URL</label>
        <input type="text" name="image_url" value="<?= htmlspecialchars($product['image_url'] ?? '') ?>">
      </div>
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea name="description"><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
    </div>
    <div style="display:flex;gap:12px;margin-top:8px">
      <button type="submit" class="btn btn-primary"><i class="fas fa-floppy-disk"></i> Save Changes</button>
      <a href="index.php" class="btn btn-muted"><i class="fas fa-xmark"></i> Cancel</a>
    </div>
  </form>
</div>

<?php require_once '../includes/admin_footer.php'; ?>
