<?php
require_once 'models/Post.php';

class PostController {
    private $postModel;

    public function __construct($pdo) {
        $this->postModel = new Post($pdo);
    }

    public function createPost($userId, $content) {
        $this->postModel->createPost($userId, $content);
    }

    public function getPosts($offset, $limit) {
        return $this->postModel->getPosts($offset, $limit);
    }
}
