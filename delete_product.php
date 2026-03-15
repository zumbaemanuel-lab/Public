<?php
require_once '../includes/session.php';
require_once '../config/db.php';
header('Content-Type: application/json');
requireLogin();

if (!can('delete_products')) {
    echo json_encode(['success'=>false,'message'=>'Access Denied – Insufficient Permissions']);
    exit;
}

$id = intval($_GET['id'] ?? 0);
if (!$id) {
    echo json_encode(['success'=>false,'message'=>'Invalid product ID']);
    exit;
}

$stmt = mysqli_prepare($conn,"DELETE FROM products WHERE product_id=?");
mysqli_stmt_bind_param($stmt,'i',$id);
if (mysqli_stmt_execute($stmt)) {
    echo json_encode(['success'=>true,'message'=>'✅ Product deleted successfully!']);
} else {
    echo json_encode(['success'=>false,'message'=>'❌ Failed to delete product.']);
}
mysqli_stmt_close($stmt);
