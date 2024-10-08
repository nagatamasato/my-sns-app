<?php
require_once 'models/User.php';

class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function register($name, $password) {
        $this->userModel->register($name, $password);
    }

    public function login($name, $password) {
        return $this->userModel->login($name, $password);
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?action=login');
        exit();
    }

    public function getUserById($id) {
        return $this->userModel->getUserById($id);
    }
}
