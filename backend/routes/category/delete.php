<?php
require_once __DIR__ . '/../../auth/session.php';
require_once __DIR__ . '/../../models/Category.php';

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

$category = new Category();
$success = $category->deleteCategory($id);

if ($success) {
    echo json_encode(['success' => 'Category deleted']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to delete category']);
}
?>