<?php
require_once __DIR__ . '/../../models/UserReview.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON']);
    exit;
}

$name = trim($input['name'] ?? '');
$email = trim($input['email'] ?? '');
$message = trim($input['message'] ?? '');
$rating = (int)($input['rating'] ?? 0);
$productId = (int)($input['product_id'] ?? 0);

if (empty($name) || empty($message) || $rating < 1 || $rating > 5 || !$productId) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid data']);
    exit;
}

$review = new UserReview();
$id = $review->createReview($name, $email, $message, $rating, $productId);

if ($id) {
    http_response_code(201);
    echo json_encode(['success' => 'Review created', 'id' => $id]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to create review']);
}
?>