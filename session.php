<?php
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_httponly', 1);
    session_start();
}

/* ─── helpers ─────────────────────────────────────────── */

function isLoggedIn(): bool {
    return isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['role']);
}

function getUserRole(): string {
    return $_SESSION['role'] ?? '';
}

function isAdmin(): bool { return getUserRole() === 'admin'; }
function isStaff(): bool { return getUserRole() === 'staff'; }

/** Redirect to login if not authenticated */
function requireLogin(): void {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

/**
 * RBAC permission matrix (matches the spec table exactly)
 *   action key => ['admin','staff'] = both allowed
 *                 ['admin']         = admin only
 */
$_PERMS = [
    'view_products'   => ['admin','staff'],
    'add_products'    => ['admin','staff'],
    'update_products' => ['admin','staff'],
    'delete_products' => ['admin'],
    'register_users'  => ['admin'],
    'update_users'    => ['admin'],
    'delete_users'    => ['admin'],
    'view_users'      => ['admin'],
];

/** Die with "Access Denied" if role not permitted */
function requirePermission(string $action): void {
    global $_PERMS;
    requireLogin();
    $role = getUserRole();
    if (!in_array($role, $_PERMS[$action] ?? [])) {
        http_response_code(403);
        echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8">
        <title>Access Denied – G7 Admin</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <style>
          *{margin:0;padding:0;box-sizing:border-box}
          body{font-family:\'Segoe UI\',sans-serif;background:#0f172a;min-height:100vh;
               display:flex;align-items:center;justify-content:center}
          .box{background:#1e293b;border:2px solid #ef4444;border-radius:16px;
               padding:60px 50px;text-align:center;max-width:460px;width:90%}
          .icon{font-size:72px;color:#ef4444;margin-bottom:24px}
          h1{color:#f8fafc;font-size:28px;margin-bottom:12px}
          p{color:#94a3b8;font-size:15px;line-height:1.6;margin-bottom:30px}
          a{display:inline-flex;align-items:center;gap:8px;padding:12px 28px;
            background:#ef4444;color:#fff;border-radius:8px;text-decoration:none;
            font-weight:600;transition:.2s}
          a:hover{background:#dc2626}
        </style></head><body>
        <div class="box">
          <div class="icon"><i class="fas fa-ban"></i></div>
          <h1>Access Denied</h1>
          <p>Insufficient Permissions – your role (<strong>' . htmlspecialchars($role) . '</strong>) does not allow this action.</p>
          <a href="index.php"><i class="fas fa-house"></i> Back to Dashboard</a>
        </div></body></html>';
        exit;
    }
}

/** UI helper: can this logged-in user do $action? (for show/hide) */
function can(string $action): bool {
    global $_PERMS;
    $role = getUserRole();
    if (!isset($_PERMS[$action])) return true;
    return in_array($role, $_PERMS[$action]);
}
