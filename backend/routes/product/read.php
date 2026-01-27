<?php
require_once __DIR__ . '/../../auth/session.php';
require_once __DIR__ . '/../../models/Product.php';

requireLogin();

header('Content-Type: application/json');

$product = new Product();

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $result = $product->getProductById($id);
    if ($result) {
        echo json_encode(['success' => true, 'product' => $result]);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Product not found']);
    }
} elseif (isset($_GET['category_id'])) {
    $categoryId = (int)$_GET['category_id'];
    $products = $product->getProductsByCategory($categoryId);
    echo json_encode(['success' => true, 'products' => $products]);
} else {
    $products = $product->getAllProducts();
    echo json_encode(['success' => true, 'products' => $products]);
}
?>