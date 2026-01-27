<?php
require_once __DIR__ . '/../../models/Admin.php';
require_once __DIR__ . '/../../auth/session.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true');

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

$email = trim($input['email'] ?? '');
$motDePasse = $input['mot_de_passe'] ?? '';

if (empty($email) || empty($motDePasse)) {
    http_response_code(400);
    echo json_encode(['error' => 'Email and password are required']);
    exit;
}

$admin = new Admin();
$result = $admin->login($email, $motDePasse);

if (isset($result['error'])) {
    http_response_code(401);
    echo json_encode($result);
} else {
    login($result['admin']['id'], $result['admin']['nom_complet']);
    http_response_code(200);
    echo json_encode(['success' => 'Login successful', 'admin' => getCurrentAdmin()]);
}
?>