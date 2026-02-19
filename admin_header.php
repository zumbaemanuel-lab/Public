<?php
// Called from within admin pages; $pageTitle must be set before including
$role = getUserRole();
$fname = $_SESSION['first_name'] ?? $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle ?? 'Admin') ?> – G7 E-Commerce</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    :root{
      --bg:#0f172a; --sidebar:#1e293b; --accent:#f59e0b;
      --accent2:#3b82f6; --text:#f8fafc; --muted:#94a3b8;
      --border:#334155; --danger:#ef4444; --success:#22c55e;
      --card:#1e293b;
    }
    *{margin:0;padding:0;box-sizing:border-box}
    body{font-family:'Segoe UI',Tahoma,sans-serif;background:var(--bg);
         color:var(--text);display:flex;min-height:100vh}

    /* ── Sidebar ── */
    .sidebar{width:260px;background:var(--sidebar);border-right:1px solid var(--border);
             display:flex;flex-direction:column;position:fixed;height:100vh;z-index:100}
    .sidebar-logo{padding:28px 24px;border-bottom:1px solid var(--border)}
    .sidebar-logo .logo-text{font-size:26px;font-weight:800;color:var(--accent);letter-spacing:1px}
    .sidebar-logo .logo-sub{font-size:11px;color:var(--muted);text-transform:uppercase;letter-spacing:2px}
    nav a{display:flex;align-items:center;gap:12px;padding:14px 24px;color:var(--muted);
          text-decoration:none;font-size:14px;font-weight:500;transition:.2s;border-left:3px solid transparent}
    nav a:hover,nav a.active{color:var(--text);background:rgba(245,158,11,.08);border-left-color:var(--accent)}
    nav a i{width:18px;text-align:center}
    .nav-section{padding:14px 24px 6px;font-size:10px;font-weight:700;
                 color:var(--muted);text-transform:uppercase;letter-spacing:2px}
    .sidebar-footer{margin-top:auto;padding:20px 24px;border-top:1px solid var(--border)}
    .user-chip{display:flex;align-items:center;gap:10px;margin-bottom:12px}
    .user-avatar{width:36px;height:36px;border-radius:50%;background:var(--accent);
                 display:flex;align-items:center;justify-content:center;font-weight:700;
                 color:#0f172a;font-size:14px}
    .user-name{font-size:13px;font-weight:600}
    .user-role{font-size:11px;color:var(--muted);text-transform:capitalize}
    .btn-logout{display:flex;align-items:center;gap:8px;padding:10px 16px;
                background:rgba(239,68,68,.15);color:var(--danger);border:1px solid rgba(239,68,68,.3);
                border-radius:8px;text-decoration:none;font-size:13px;font-weight:600;
                width:100%;justify-content:center;transition:.2s}
    .btn-logout:hover{background:var(--danger);color:#fff}

    /* ── Main ── */
    .main{margin-left:260px;flex:1;padding:32px;min-height:100vh}
    .page-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:32px}
    .page-title{font-size:26px;font-weight:800}
    .page-title span{color:var(--accent)}
    .breadcrumb{font-size:13px;color:var(--muted);margin-top:4px}

    /* ── Cards / Stats ── */
    .stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px;margin-bottom:32px}
    .stat-card{background:var(--card);border:1px solid var(--border);border-radius:14px;padding:24px;
               display:flex;align-items:center;gap:18px;transition:.3s}
    .stat-card:hover{border-color:var(--accent);transform:translateY(-3px)}
    .stat-icon{width:56px;height:56px;border-radius:12px;display:flex;align-items:center;
               justify-content:center;font-size:22px}
    .stat-val{font-size:32px;font-weight:800}
    .stat-lbl{font-size:13px;color:var(--muted);margin-top:2px}

    /* ── Table ── */
    .card{background:var(--card);border:1px solid var(--border);border-radius:14px;
          overflow:hidden;margin-bottom:28px}
    .card-header{padding:20px 24px;border-bottom:1px solid var(--border);
                 display:flex;align-items:center;justify-content:space-between}
    .card-header h2{font-size:17px;font-weight:700}
    table{width:100%;border-collapse:collapse}
    thead th{padding:14px 16px;text-align:left;font-size:12px;font-weight:700;
             color:var(--muted);text-transform:uppercase;letter-spacing:.8px;
             background:rgba(255,255,255,.02);border-bottom:1px solid var(--border)}
    tbody td{padding:14px 16px;font-size:14px;border-bottom:1px solid rgba(255,255,255,.04)}
    tbody tr:last-child td{border-bottom:none}
    tbody tr:hover{background:rgba(255,255,255,.02)}
    .product-thumb{width:48px;height:48px;border-radius:8px;object-fit:cover;border:1px solid var(--border)}

    /* ── Buttons ── */
    .btn{display:inline-flex;align-items:center;gap:6px;padding:8px 16px;border-radius:8px;
         border:none;cursor:pointer;font-size:13px;font-weight:600;text-decoration:none;
         transition:.2s;white-space:nowrap}
    .btn-sm{padding:6px 12px;font-size:12px}
    .btn-primary{background:var(--accent);color:#0f172a}
    .btn-primary:hover{background:#d97706;color:#fff}
    .btn-blue{background:var(--accent2);color:#fff}
    .btn-blue:hover{background:#2563eb}
    .btn-danger{background:rgba(239,68,68,.15);color:var(--danger);border:1px solid rgba(239,68,68,.3)}
    .btn-danger:hover{background:var(--danger);color:#fff}
    .btn-success{background:rgba(34,197,94,.15);color:var(--success);border:1px solid rgba(34,197,94,.3)}
    .btn-success:hover{background:var(--success);color:#fff}
    .btn-muted{background:rgba(148,163,184,.1);color:var(--muted);border:1px solid var(--border)}
    .btn-muted:hover{background:var(--border);color:var(--text)}

    /* ── Form ── */
    .form-card{background:var(--card);border:1px solid var(--border);border-radius:14px;padding:32px;max-width:700px}
    .form-group{margin-bottom:20px}
    .form-group label{display:block;margin-bottom:8px;font-size:13px;font-weight:600;color:var(--muted);text-transform:uppercase;letter-spacing:.6px}
    .form-group input,.form-group select,.form-group textarea{
      width:100%;padding:12px 16px;background:rgba(255,255,255,.05);
      border:1px solid var(--border);border-radius:8px;color:var(--text);
      font-size:14px;transition:.2s;font-family:inherit}
    .form-group input:focus,.form-group select:focus,.form-group textarea:focus{
      outline:none;border-color:var(--accent);background:rgba(245,158,11,.05)}
    .form-group textarea{resize:vertical;min-height:90px}
    .form-group select option{background:var(--sidebar)}
    .form-row{display:grid;grid-template-columns:1fr 1fr;gap:20px}
    .form-group input::placeholder{color:var(--muted)}

    /* ── Badge ── */
    .badge{display:inline-flex;align-items:center;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:700;text-transform:uppercase}
    .badge-admin{background:rgba(245,158,11,.15);color:var(--accent)}
    .badge-staff{background:rgba(59,130,246,.15);color:var(--accent2)}
    .badge-active{background:rgba(34,197,94,.15);color:var(--success)}

    /* ── Modal ── */
    .modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.7);z-index:999;align-items:center;justify-content:center}
    .modal-overlay.open{display:flex}
    .modal{background:var(--sidebar);border:1px solid var(--border);border-radius:16px;
           padding:32px;width:90%;max-width:560px;max-height:90vh;overflow-y:auto;animation:slideUp .3s}
    .modal-title{font-size:20px;font-weight:700;margin-bottom:24px;display:flex;align-items:center;justify-content:space-between}
    .modal-close{cursor:pointer;color:var(--muted);font-size:22px;transition:.2s}
    .modal-close:hover{color:var(--text)}
    @keyframes slideUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}

    /* ── Responsive ── */
    @media(max-width:768px){
      .sidebar{width:0;overflow:hidden}
      .main{margin-left:0}
      .form-row{grid-template-columns:1fr}
    }
  </style>
</head>
<body>

<div class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-text">G7 Store</div>
    <div class="logo-sub">Admin Panel</div>
  </div>
  <nav>
    <div class="nav-section">Main</div>
    <a href="index.php" class="<?= basename($_SERVER['PHP_SELF'])==='index.php'?'active':'' ?>">
      <i class="fas fa-house"></i> Dashboard
    </a>
    <div class="nav-section">Products</div>
    <?php if(can('view_products')): ?>
    <a href="index.php" class="<?= basename($_SERVER['PHP_SELF'])==='index.php'?'active':'' ?>">
      <i class="fas fa-boxes-stacked"></i> All Products
    </a>
    <?php endif; ?>
    <?php if(can('add_products')): ?>
    <a href="upload_product.php" class="<?= basename($_SERVER['PHP_SELF'])==='upload_product.php'?'active':'' ?>">
      <i class="fas fa-plus-circle"></i> Upload Product
    </a>
    <?php endif; ?>
    <?php if(can('view_users')): ?>
    <div class="nav-section">Users</div>
    <a href="users.php" class="<?= basename($_SERVER['PHP_SELF'])==='users.php'?'active':'' ?>">
      <i class="fas fa-users"></i> All Users
    </a>
    <a href="register_user.php" class="<?= basename($_SERVER['PHP_SELF'])==='register_user.php'?'active':'' ?>">
      <i class="fas fa-user-plus"></i> Register User
    </a>
    <?php endif; ?>
    <div class="nav-section">Store</div>
    <a href="../public/index.php" target="_blank">
      <i class="fas fa-store"></i> View Store
    </a>
  </nav>
  <div class="sidebar-footer">
    <div class="user-chip">
      <div class="user-avatar"><?= strtoupper(substr($fname,0,1)) ?></div>
      <div>
        <div class="user-name"><?= htmlspecialchars($fname) ?></div>
        <div class="user-role"><?= htmlspecialchars($role) ?></div>
      </div>
    </div>
    <a href="logout.php" class="btn-logout"><i class="fas fa-right-from-bracket"></i> Logout</a>
  </div>
</div>

<div class="main">
