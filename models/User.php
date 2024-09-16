<?php
require_once 'db/db.php';

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($name, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, password, created_at, updated_at) VALUES (:name, :password, NOW(), NOW())");
        $stmt->execute([
            ':name' => $name,
            ':password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    public function login($name, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE name = :name");
        $stmt->execute([':name' => $name]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
