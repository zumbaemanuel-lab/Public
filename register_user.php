<?php
require_once '../includes/session.php';
require_once '../config/db.php';
requireLogin();
requirePermission('register_users');

$status = null;
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fn   = trim($_POST['first_name'] ?? '');
    $ln   = trim($_POST['last_name']  ?? '');
    $em   = trim($_POST['email']      ?? '');
    $un   = trim($_POST['username']   ?? '');
    $pw   = trim($_POST['password']   ?? '');
    $ph   = trim($_POST['phone']      ?? '');
    $role = trim($_POST['role']       ?? 'staff');

    if ($fn && $ln && $em && $un && $pw) {
        $hash = password_hash($pw, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($conn,
            "INSERT INTO users (first_name,last_name,email,username,password,phone,role) VALUES (?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt,'sssssss',$fn,$ln,$em,$un,$hash,$ph,$role);
        if (mysqli_stmt_execute($stmt)) {
            $status = 'success';
            $msg    = "User '{$un}' registered successfully as " . strtoupper($role) . "!";
        } else {
            $status = 'error';
            $msg    = mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        $status = 'validation';
        $msg    = 'Please fill in all required fields.';
    }
}

$pageTitle = 'Register User';
require_once '../includes/admin_header.php';
?>

<?php if($status==='success'): ?><script>alert('✅ <?= addslashes($msg) ?>');</script>
<?php elseif($status==='error'): ?><script>alert('❌ Registration failed: <?= addslashes($msg) ?>');</script>
<?php elseif($status==='validation'): ?><script>alert('⚠️ <?= addslashes($msg) ?>');</script>
<?php endif; ?>

<div class="page-header">
  <div>
    <div class="page-title">Register <span>User</span></div>
    <div class="breadcrumb">Dashboard › Add system user (Admin / Staff)</div>
  </div>
  <a href="users.php" class="btn btn-muted"><i class="fas fa-users"></i> View Users</a>
</div>

<div class="form-card">
  <form method="POST">
    <div class="form-row">
      <div class="form-group">
        <label>First Name *</label>
        <input type="text" name="first_name" required placeholder="e.g. John">
      </div>
      <div class="form-group">
        <label>Last Name *</label>
        <input type="text" name="last_name" required placeholder="e.g. Doe">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label>Email *</label>
        <input type="email" name="email" required placeholder="john@example.com">
      </div>
      <div class="form-group">
        <label>Phone</label>
        <input type="tel" name="phone" placeholder="+255 712 345 678">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group">
        <label>Username *</label>
        <input type="text" name="username" required placeholder="e.g. johndoe">
      </div>
      <div class="form-group">
        <label>Role *</label>
        <select name="role">
          <option value="staff">Staff</option>
          <option value="admin">Admin</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label>Password *</label>
      <input type="password" name="password" required placeholder="Minimum 6 characters">
    </div>
    <div style="display:flex;gap:12px;margin-top:8px">
      <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register User</button>
      <button type="reset" class="btn btn-muted"><i class="fas fa-rotate-left"></i> Reset</button>
    </div>
  </form>
</div>

<?php require_once '../includes/admin_footer.php'; ?>
