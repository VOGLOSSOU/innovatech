<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['admin_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: /backend/routes/admin/login.php');
        exit;
    }
}

function login($adminId, $adminName) {
    $_SESSION['admin_id'] = $adminId;
    $_SESSION['admin_name'] = $adminName;
}

function logout() {
    session_destroy();
    header('Location: /backend/routes/admin/login.php');
    exit;
}

function getCurrentAdmin() {
    return [
        'id' => $_SESSION['admin_id'] ?? null,
        'name' => $_SESSION['admin_name'] ?? null
    ];
}
?>