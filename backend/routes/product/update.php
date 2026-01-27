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

$id = (int)($_POST['id'] ?? 0);
$categoryId = (int)($_POST['category_id'] ?? 0);
$nom = trim($_POST['nom'] ?? '');
$description = trim($_POST['description'] ?? '');
$prix = (float)($_POST['prix'] ?? 0);
$quantity = (int)($_POST['quantity'] ?? 0);

if (!$id) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing ID']);
    exit;
}

if (empty($nom) || $prix <= 0 || $quantity < 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid data']);
    exit;
}

$image = $_POST['image'] ?? '';
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'tiff', 'svg'];
    $maxSize = 10 * 1024 * 1024; // 10MB

    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];

    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($extension, $allowedExtensions)) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid image format. Allowed: ' . implode(', ', $allowedExtensions)]);
        exit;
    }

    if ($fileSize > $maxSize) {
        http_response_code(400);
        echo json_encode(['error' => 'Image size too large. Max 10MB']);
        exit;
    }

    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/products_images/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    $newFileName = uniqid() . '_' . basename($fileName);
    $targetFile = $uploadDir . $newFileName;

    if (move_uploaded_file($fileTmpPath, $targetFile)) {
        $image = 'products_images/' . $newFileName;
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to save image']);
        exit;
    }
}

$product = new Product();
$success = $product->updateProduct($id, $categoryId, $nom, $description, $prix, $image, $quantity);

if ($success) {
    echo json_encode(['success' => 'Product updated']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to update product']);
}
?>