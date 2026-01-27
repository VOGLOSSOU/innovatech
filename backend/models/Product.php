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

    public function getProductsByCategory($categoryId) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE category_id = ?");
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll();
    }

    public function deleteProduct($id) {
        return $this->delete($id);
    }
}
?>