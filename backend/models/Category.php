<?php
require_once __DIR__ . '/../lib/Model.php';

class Category extends Model {
    protected $table = 'category';

    public function createCategory($nom, $description) {
        $data = [
            'nom' => $nom,
            'description' => $description
        ];
        return $this->create($data);
    }

    public function updateCategory($id, $nom, $description) {
        $data = [
            'nom' => $nom,
            'description' => $description
        ];
        return $this->update($id, $data);
    }

    public function getAllCategories() {
        return $this->all();
    }

    public function getCategoryById($id) {
        return $this->find($id);
    }

    public function deleteCategory($id) {
        return $this->delete($id);
    }

    /**
     * Récupère les catégories ayant le plus de produits
     * Trié par nombre de produits (décroissant)
     */
    public function getCategoriesWithMostProducts($limit = 5) {
        $stmt = $this->pdo->query("SELECT c.*, COUNT(p.id) as product_count 
            FROM {$this->table} c 
            LEFT JOIN product p ON c.id = p.category_id 
            GROUP BY c.id 
            HAVING product_count > 0
            ORDER BY product_count DESC 
            LIMIT {$limit}");
        return $stmt->fetchAll();
    }

    /**
     * Récupère toutes les catégories triées par nombre de produits
     */
    public function getAllCategoriesSortedByProducts($limit = 5) {
        $stmt = $this->pdo->query("SELECT c.*, COUNT(p.id) as product_count 
            FROM {$this->table} c 
            LEFT JOIN product p ON c.id = p.category_id 
            GROUP BY c.id 
            ORDER BY product_count DESC 
            LIMIT {$limit}");
        return $stmt->fetchAll();
    }
}
?>