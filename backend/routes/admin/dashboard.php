<?php
require_once __DIR__ . '/../../auth/session.php';
require_once __DIR__ . '/../../models/Product.php';
require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../models/UserReview.php';

requireLogin();

header('Content-Type: application/json');

$product = new Product();
$category = new Category();
$review = new UserReview();

$stats = [
    'products' => count($product->all()),
    'categories' => count($category->all()),
    'reviews' => count($review->all())
];

echo json_encode([
    'success' => true,
    'admin' => getCurrentAdmin(),
    'stats' => $stats
]);
?>