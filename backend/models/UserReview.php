<?php
require_once __DIR__ . '/../lib/Model.php';

class UserReview extends Model {
    protected $table = 'user_review';

    public function createReview($name, $email, $message, $rating, $productId) {
        $data = [
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'rating' => $rating,
            'product_id' => $productId
        ];
        return $this->create($data);
    }

    public function getReviewsByProduct($productId) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE product_id = ? ORDER BY created_at DESC");
        $stmt->execute([$productId]);
        return $stmt->fetchAll();
    }

    public function getAllReviews() {
        $stmt = $this->pdo->query("SELECT r.*, p.nom as product_name FROM {$this->table} r LEFT JOIN product p ON r.product_id = p.id ORDER BY r.created_at DESC");
        return $stmt->fetchAll();
    }

    public function getReviewById($id) {
        return $this->find($id);
    }

    public function deleteReview($id) {
        return $this->delete($id);
    }
}
?>