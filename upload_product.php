<?php
require_once '../includes/session.php';
require_once '../config/db.php';
requireLogin();
requirePermission('add_products');

$status = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $brand    = trim($_POST['brand'] ?? '');
    $price    = floatval($_POST['price'] ?? 0);
    $qty      = intval($_POST['quantity'] ?? 0);
    $desc     = trim($_POST['description'] ?? '');
    $category = trim($_POST['category'] ?? 'General');
    $image    = trim($_POST['image_url'] ?? '');
    $uid      = $_SESSION['user_id'];

    if ($name && $brand && $price > 0 && $qty >= 0) {
        $stmt = mysqli_prepare($conn,
            "INSERT INTO products (name,brand,price,quantity,description,category,image_url,created_by)
             VALUES (?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt,'ssdisssi',$name,$brand,$price,$qty,$desc,$category,$image,$uid);
        $status = mysqli_stmt_execute($stmt) ? 'success' : 'error';
        mysqli_stmt_close($stmt);
    } else {
        $status = 'validation';
    }
}

$pageTitle = 'Upload Product';
require_once '../includes/admin_header.php';
?>

<?php if($status === 'success'): ?>
<script>alert('✅ Product uploaded successfully!');</script>
<?php elseif($status === 'error'): ?>
<script>alert('❌ Failed to upload product. Please try again.');</script>
<?php elseif($status === 'validation'): ?>
<script>alert('⚠️ Please fill in all required fields correctly.');</script>
<?php endif; ?>

<div class="page-header">
  <div>
    <div class="page-title">Upload <span>Product</span></div>
    <div class="breadcrumb">Dashboard › Add new product or service</div>
  </div>
  <a href="index.php" class="btn btn-muted"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="form-card">
  <form method="POST">
    <div class="form-row">
      <div class="form-group">
        <label>Product / Service Name *</label>
        <input type="text" name="name" required placeholder="e.g. Sony WH-1000XM5">
      </div>
      <div class="form-group">
        <label>Brand *</label>
        <input type="text" name="brand" required placeholder="e.g. Sony">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label>Price (Tsh) *</label>
        <input type="number" name="price" required min="0" step="0.01" placeholder="e.g. 120000">
      </div>
      <div class="form-group">
        <label>Quantity *</label>
        <input type="number" name="quantity" required min="0" placeholder="e.g. 50">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label>Category</label>
        <select name="category">
          <option value="General">General</option>
          <option value="Electronics">Electronics</option>
          <option value="Fashion">Fashion</option>
          <option value="Home">Home &amp; Living</option>
          <option value="Sports">Sports &amp; Outdoors</option>
          <option value="Food">Food &amp; Beverages</option>
          <option value="Health">Health &amp; Beauty</option>
        </select>
      </div>
      <div class="form-group">
        <label>Image URL</label>
        <input type="text" name="image_url" placeholder="https://...">
      </div>
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea name="description" placeholder="Describe the product or service..."></textarea>
    </div>
    <div style="display:flex;gap:12px;margin-top:8px">
      <button type="submit" class="btn btn-primary"><i class="fas fa-cloud-arrow-up"></i> Upload Product</button>
      <button type="reset" class="btn btn-muted"><i class="fas fa-rotate-left"></i> Reset</button>
    </div>
  </form>
</div>

<?php require_once '../includes/admin_footer.php'; ?>
