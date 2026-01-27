<?php
require_once __DIR__ . '/../../auth/session.php';
require_once __DIR__ . '/../../models/Product.php';

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

$categoryId = (int)($input['category_id'] ?? 0);
$nom = trim($input['nom'] ?? '');
$description = trim($input['description'] ?? '');
$prix = (float)($input['prix'] ?? 0);
$quantity = (int)($input['quantity'] ?? 0);

if (empty($nom) || $prix <= 0 || $quantity < 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid data']);
    exit;
}

$image = '';
if (isset($_FILES['image'])) {
    $uploadDir = __DIR__ . '/../../../assets/img/products/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
    $targetFile = $uploadDir . $fileName;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $image = 'assets/img/products/' . $fileName;
    }
}

$product = new Product();
$id = $product->createProduct($categoryId, $nom, $description, $prix, $image, $quantity);

if ($id) {
    http_response_code(201);
    echo json_encode(['success' => 'Product created', 'id' => $id]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to create product']);
}
?>