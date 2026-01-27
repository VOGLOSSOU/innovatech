<?php
require_once __DIR__ . '/../config/database.php';

abstract class Model {
    protected $pdo;
    protected $table;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll();
    }

    public function create($data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = str_repeat('?, ', count($data) - 1) . '?';
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} ($columns) VALUES ($placeholders)");
        $stmt->execute(array_values($data));
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data) {
        $set = implode(' = ?, ', array_keys($data)) . ' = ?';
        $data['id'] = $id;
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET $set WHERE id = ?");
        return $stmt->execute(array_values($data));
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function where($column, $value) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE $column = ?");
        $stmt->execute([$value]);
        return $stmt->fetchAll();
    }
}
?>