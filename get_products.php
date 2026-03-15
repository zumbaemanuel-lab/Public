<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once '../../config/db.php';

$result = mysqli_query($conn, "SELECT product_id, name, brand, price, quantity, description, image_url, category FROM products ORDER BY created_at DESC");

if (!$result) {
    echo json_encode(['success' => false, 'message' => mysqli_error($conn)]);
    exit;
}

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

echo json_encode(['success' => true, 'products' => $products]);
