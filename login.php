<?php
require_once '../includes/session.php';
require_once '../config/db.php';

if (isLoggedIn()) { header('Location: index.php'); exit; }

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username'] ?? '');
    $p = trim($_POST['password'] ?? '');
    if ($u && $p) {
        $stmt = mysqli_prepare($conn, "SELECT user_id, first_name, username, password, role FROM users WHERE username=? OR email=? LIMIT 1");
        mysqli_stmt_bind_param($stmt, 'ss', $u, $u);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($res);
        if ($row && password_verify($p, $row['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id']    = $row['user_id'];
            $_SESSION['username']   = $row['username'];
            $_SESSION['role']       = $row['role'];
            $_SESSION['first_name'] = $row['first_name'];
            header('Location: index.php'); exit;
        } else {
            $error = 'Invalid username or password.';
        }
        mysqli_stmt_close($stmt);
    } else {
        $error = 'Please fill in all fields.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login – G7 E-Commerce</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    *{margin:0;padding:0;box-sizing:border-box}
    body{font-family:'Segoe UI',sans-serif;background:#0f172a;
         min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px}
    .bg-shapes{position:fixed;inset:0;overflow:hidden;z-index:0}
    .shape{position:absolute;border-radius:50%;filter:blur(80px);opacity:.15}
    .s1{width:400px;height:400px;background:#f59e0b;top:-100px;left:-100px}
    .s2{width:300px;height:300px;background:#3b82f6;bottom:-80px;right:-80px}
    .card{position:relative;z-index:1;background:#1e293b;border:1px solid #334155;
          border-radius:20px;padding:48px 40px;width:100%;max-width:440px;
          box-shadow:0 25px 60px rgba(0,0,0,.5)}
    .logo{text-align:center;margin-bottom:36px}
    .logo-icon{width:64px;height:64px;background:linear-gradient(135deg,#f59e0b,#ef4444);
               border-radius:16px;display:inline-flex;align-items:center;justify-content:center;
               font-size:28px;color:#fff;margin-bottom:14px}
    .logo h1{font-size:26px;font-weight:800;color:#f8fafc}
    .logo p{font-size:13px;color:#64748b;margin-top:4px}
    .form-group{margin-bottom:18px}
    label{display:block;font-size:12px;font-weight:700;color:#64748b;
          text-transform:uppercase;letter-spacing:.8px;margin-bottom:8px}
    .input-wrap{position:relative}
    .input-wrap i{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#64748b;font-size:15px}
    input{width:100%;padding:13px 14px 13px 42px;background:rgba(255,255,255,.05);
          border:1px solid #334155;border-radius:10px;color:#f8fafc;font-size:14px;transition:.25s}
    input:focus{outline:none;border-color:#f59e0b;background:rgba(245,158,11,.05)}
    input::placeholder{color:#475569}
    .error{background:rgba(239,68,68,.12);border:1px solid rgba(239,68,68,.35);
           color:#fca5a5;padding:12px 16px;border-radius:10px;font-size:13px;margin-bottom:18px;
           display:flex;align-items:center;gap:8px}
    .btn-login{width:100%;padding:14px;background:linear-gradient(135deg,#f59e0b,#ef4444);
               color:#fff;border:none;border-radius:10px;font-size:15px;font-weight:700;
               cursor:pointer;transition:.25s;margin-top:4px}
    .btn-login:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(245,158,11,.4)}
    .store-link{text-align:center;margin-top:22px;font-size:13px;color:#64748b}
    .store-link a{color:#f59e0b;text-decoration:none;font-weight:600}
    .creds{background:rgba(59,130,246,.08);border:1px solid rgba(59,130,246,.2);
           border-radius:10px;padding:14px 16px;margin-bottom:20px;font-size:12px;color:#7dd3fc}
    .creds strong{display:block;color:#93c5fd;margin-bottom:4px}
  </style>
</head>
<body>
<div class="bg-shapes">
  <div class="shape s1"></div>
  <div class="shape s2"></div>
</div>
<div class="card">
  <div class="logo">
    <div class="logo-icon"><i class="fas fa-shield-halved"></i></div>
    <h1>G7 E-Commerce</h1>
    <p>Admin Control Panel</p>
  </div>

  <div class="creds">
    <strong>🔑 Test Credentials</strong>
    Admin: israelzumba / Zumba@2002<br>
    Staff: demostaff / Staff@123
  </div>

  <?php if($error): ?>
  <div class="error"><i class="fas fa-circle-xmark"></i> <?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST">
    <div class="form-group">
      <label>Username or Email</label>
      <div class="input-wrap">
        <i class="fas fa-user"></i>
        <input type="text" name="username" required autofocus placeholder="Enter username or email">
      </div>
    </div>
    <div class="form-group">
      <label>Password</label>
      <div class="input-wrap">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" required placeholder="Enter password">
      </div>
    </div>
    <button type="submit" class="btn-login"><i class="fas fa-right-to-bracket"></i> Login to Dashboard</button>
  </form>
  <div class="store-link"><a href="../public/index.php"><i class="fas fa-store"></i> Back to Store</a></div>
</div>
</body>
</html>
