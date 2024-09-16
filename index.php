<?php
session_start();
require_once 'db/db.php';
require_once 'controllers/UserController.php';
require_once 'controllers/PostController.php';

$userController = new UserController($pdo);
$postController = new PostController($pdo);

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $user = $userController->login($name, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: index.php?action=posts');
            } else {
                echo 'ログイン失敗';
            }
        } else {
            include 'views/login.php';
        }
        break;

    case 'logout':
        $userController->logout();
        break;    

    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $userController->register($name, $password);
            header('Location: index.php?action=login');
        } else {
            include 'views/register.php';
        }
        break;

    case 'posts':
        $posts = $postController->getPosts(0, 10);
        include 'views/posts.php';
        break;

    case 'createPost':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = $_POST['content'];
            $userId = $_SESSION['user_id'];
            $postController->createPost($userId, $content);
            header('Location: index.php?action=posts');
        } else {
            include 'views/create_post.php';
        }
        break;

    case 'getPosts':
        $offset = (int)$_GET['offset'];
        $limit = (int)$_GET['limit'];
        $posts = $postController->getPosts($offset, $limit);
        echo json_encode(['posts' => $posts]);
        break;

    default:
        include 'views/login.php';
        break;
}
