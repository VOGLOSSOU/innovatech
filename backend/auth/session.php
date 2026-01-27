<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['admin_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        http_response_code(401);
        echo json_encode(['error' => 'Unauthorized']);
        exit;
    }
}

function login($adminId, $adminName) {
    $_SESSION['admin_id'] = $adminId;
    $_SESSION['admin_name'] = $adminName;
}

function logout() {
    session_destroy();
    header('Location: /admin/login.php');
    exit;
}

function getCurrentAdmin() {
    return [
        'id' => $_SESSION['admin_id'] ?? null,
        'name' => $_SESSION['admin_name'] ?? null
    ];
}
?>