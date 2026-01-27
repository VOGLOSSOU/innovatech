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
}
?>