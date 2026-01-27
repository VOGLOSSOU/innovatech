<?php
require_once __DIR__ . '/../../auth/session.php';
require_once __DIR__ . '/../../models/UserReview.php';

requireLogin();

header('Content-Type: application/json');

$review = new UserReview();

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $result = $review->getReviewById($id);
    if ($result) {
        echo json_encode(['success' => true, 'review' => $result]);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Review not found']);
    }
} elseif (isset($_GET['product_id'])) {
    $productId = (int)$_GET['product_id'];
    $reviews = $review->getReviewsByProduct($productId);
    echo json_encode(['success' => true, 'reviews' => $reviews]);
} else {
    $reviews = $review->getAllReviews();
    echo json_encode(['success' => true, 'reviews' => $reviews]);
}
?>