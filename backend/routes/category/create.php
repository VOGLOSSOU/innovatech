<?php
require_once __DIR__ . '/../../auth/session.php';
require_once __DIR__ . '/../../models/Category.php';

requireLogin();

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

$nom = trim($input['nom'] ?? '');
$description = trim($input['description'] ?? '');

if (empty($nom)) {
    http_response_code(400);
    echo json_encode(['error' => 'Name is required']);
    exit;
}

$category = new Category();
$id = $category->createCategory($nom, $description);

if ($id) {
    http_response_code(201);
    echo json_encode(['success' => 'Category created', 'id' => $id]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to create category']);
}
?>