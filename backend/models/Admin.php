<?php
require_once __DIR__ . '/../lib/Model.php';

class Admin extends Model {
    protected $table = 'admin';

    public function register($nomComplet, $email, $motDePasse) {
        // Check if email exists
        $existing = $this->where('email', $email);
        if (!empty($existing)) {
            return ['error' => 'Email already exists'];
        }

        $hashedPassword = password_hash($motDePasse, PASSWORD_DEFAULT);
        $data = [
            'nom_complet' => $nomComplet,
            'email' => $email,
            'mot_de_passe' => $hashedPassword
        ];

        $id = $this->create($data);
        return $id ? ['success' => 'Admin registered', 'id' => $id] : ['error' => 'Registration failed'];
    }

    public function login($email, $motDePasse) {
        $admin = $this->where('email', $email);
        if (empty($admin)) {
            return ['error' => 'Invalid email'];
        }

        $admin = $admin[0];
        if (password_verify($motDePasse, $admin['mot_de_passe'])) {
            return ['success' => 'Login successful', 'admin' => $admin];
        } else {
            return ['error' => 'Invalid password'];
        }
    }

    public function getById($id) {
        return $this->find($id);
    }
}
?>