<?php
require_once 'db/db.php';

class Post {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createPost($userId, $content) {
        $stmt = $this->pdo->prepare("INSERT INTO posts (user_id, content, created_at, updated_at) VALUES (:user_id, :content, NOW(), NOW())");
        $stmt->execute([
            ':user_id' => $userId,
            ':content' => $content
        ]);
    }

    public function getPosts($offset = 0, $limit = 10) {
        $stmt = $this->pdo->prepare("
            SELECT posts.*, users.name 
            FROM posts 
            JOIN users ON posts.user_id = users.id 
            ORDER BY posts.created_at DESC 
            LIMIT :offset, :limit
        ");
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
