<?php
// Debug file to test PHP execution
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'backend/config/database.php';
require_once 'backend/models/Product.php';
require_once 'backend/models/Category.php';

$productModel = new Product();
$categoryModel = new Category();

$recentProducts = $productModel->getRecentProducts(6);
$bestSellers = $productModel->getBestSellers(8);
$categories = $categoryModel->getAllCategories();

echo "PHP EXECUTION WORKS!\n";
echo "Recent Products: " . count($recentProducts) . "\n";
echo "Best Sellers: " . count($bestSellers) . "\n";
echo "Categories: " . count($categories) . "\n";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Debug</title>
</head>
<body>
    <h1>Debug - Categories should appear below:</h1>
    <div class="nav">
        <button class="tab-btn th-btn active">Tous</button>
        <?php foreach ($categories as $cat): ?>
        <button class="tab-btn th-btn"><?php echo htmlspecialchars($cat['nom']); ?></button>
        <?php endforeach; ?>
    </div>
</body>
</html>
