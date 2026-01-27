<?php
require_once __DIR__ . '/../../auth/session.php';
require_once __DIR__ . '/../../models/Category.php';

requireLogin();

header('Content-Type: application/json');

$category = new Category();

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $result = $category->getCategoryById($id);
    if ($result) {
        echo json_encode(['success' => true, 'category' => $result]);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Category not found']);
    }
} else {
    $categories = $category->getAllCategories();
    echo json_encode(['success' => true, 'categories' => $categories]);
}
?>