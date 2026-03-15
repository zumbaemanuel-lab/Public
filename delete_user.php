<?php
require_once '../includes/session.php';
require_once '../config/db.php';
header('Content-Type: application/json');
requireLogin();

if (!can('delete_users')) {
    echo json_encode(['success'=>false,'message'=>'Access Denied – Insufficient Permissions']);
    exit;
}
$id = intval($_GET['id'] ?? 0);
if ($id === (int)$_SESSION['user_id']) {
    echo json_encode(['success'=>false,'message'=>'You cannot delete your own account.']);
    exit;
}
$stmt = mysqli_prepare($conn,"DELETE FROM users WHERE user_id=?");
mysqli_stmt_bind_param($stmt,'i',$id);
echo mysqli_stmt_execute($stmt)
    ? json_encode(['success'=>true,'message'=>'✅ User deleted successfully!'])
    : json_encode(['success'=>false,'message'=>'❌ Failed to delete user.']);
mysqli_stmt_close($stmt);
