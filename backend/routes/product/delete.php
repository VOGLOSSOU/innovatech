<?php
require_once __DIR__ . '/../../auth/session.php';
require_once __DIR__ . '/../../models/Product.php';

requireLogin();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$id = (int)($_GET['id'] ?? 0);

if (!$id) {
    http_response_code(400);
    echo json_encode(['error' => 'ID is required']);
    exit;
}

$product = new Product();
$success = $product->deleteProduct($id);

if ($success) {
    echo json_encode(['success' => 'Product deleted']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to delete product']);
}
?>