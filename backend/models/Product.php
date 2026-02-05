<?php
require_once __DIR__ . '/../lib/Model.php';

class Product extends Model {
    protected $table = 'product';

    public function createProduct($categoryId, $nom, $description, $prix, $image, $quantity) {
        $uuid = uniqid('prod_', true);
        $data = [
            'uuid' => $uuid,
            'category_id' => $categoryId,
            'nom' => $nom,
            'description' => $description,
            'prix' => $prix,
            'image' => $image,
            'quantity' => $quantity,
            'available' => $quantity > 0
        ];
        return $this->create($data);
    }

    public function updateProduct($id, $categoryId, $nom, $description, $prix, $image, $quantity) {
        $data = [
            'category_id' => $categoryId,
            'nom' => $nom,
            'description' => $description,
            'prix' => $prix,
            'image' => $image,
            'quantity' => $quantity,
            'available' => $quantity > 0
        ];
        return $this->update($id, $data);
    }

    public function getAllProducts() {
        $stmt = $this->pdo->query("SELECT p.*, c.nom as category_name FROM {$this->table} p LEFT JOIN category c ON p.category_id = c.id");
        return $stmt->fetchAll();
    }

    public function getProductById($id) {
        $stmt = $this->pdo->prepare("SELECT p.*, c.nom as category_name FROM {$this->table} p LEFT JOIN category c ON p.category_id = c.id WHERE p.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getRecentProducts($limit = 6) {
        $stmt = $this->pdo->query("SELECT p.*, c.nom as category_name 
            FROM {$this->table} p 
            LEFT JOIN category c ON p.category_id = c.id 
            WHERE p.available = 1
            ORDER BY p.created_at DESC 
            LIMIT {$limit}");
        return $stmt->fetchAll();
    }

    public function getBestSellers($limit = 8) {
        $stmt = $this->pdo->query("SELECT p.*, c.nom as category_name 
            FROM {$this->table} p 
            LEFT JOIN category c ON p.category_id = c.id 
            WHERE p.available = 1 AND p.quantity > 0
            ORDER BY p.quantity DESC 
            LIMIT {$limit}");
        return $stmt->fetchAll();
    }

    public function getProductsByCategory($categoryId, $limit = 4) {
        $stmt = $this->pdo->prepare("SELECT p.*, c.nom as category_name 
            FROM {$this->table} p 
            LEFT JOIN category c ON p.category_id = c.id 
            WHERE p.category_id = ? AND p.available = 1
            ORDER BY p.created_at DESC 
            LIMIT {$limit}");
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll();
    }

    public function deleteProduct($id) {
        return $this->delete($id);
    }
}
?>