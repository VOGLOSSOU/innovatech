<?php
// Database configuration
define('DB_HOST', 'srv1580.hstgr.io');
define('DB_NAME', 'u433704782_innovatech_db');
define('DB_USER', 'u433704782_innova_user'); // Change as needed
define('DB_PASS', 'myInnovaPassWord1607mdp'); // Change as needed

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>