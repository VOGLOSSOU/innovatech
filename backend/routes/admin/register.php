<?php
require_once __DIR__ . '/../../models/Admin.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

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

$nomComplet = trim($input['nom_complet'] ?? '');
$email = trim($input['email'] ?? '');
$motDePasse = $input['mot_de_passe'] ?? '';

if (empty($nomComplet) || empty($email) || empty($motDePasse)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid email format']);
    exit;
}

if (strlen($motDePasse) < 6) {
    http_response_code(400);
    echo json_encode(['error' => 'Password must be at least 6 characters']);
    exit;
}

$admin = new Admin();
$result = $admin->register($nomComplet, $email, $motDePasse);

if (isset($result['error'])) {
    http_response_code(400);
    echo json_encode($result);
} else {
    http_response_code(201);
    echo json_encode($result);
}
?>