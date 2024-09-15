<?php
// 投稿を取得するAPI
include 'db.php';

$limit = 10; // 1回のリクエストで取得する投稿数
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$query = $pdo->prepare("
    SELECT posts.id, posts.content, posts.created_at, posts.updated_at, users.name
    FROM posts
    JOIN users ON posts.user_id = users.id
    ORDER BY posts.created_at DESC
    LIMIT :limit OFFSET :offset
");

$query->bindParam(':limit', $limit, PDO::PARAM_INT);
$query->bindParam(':offset', $offset, PDO::PARAM_INT);
$query->execute();

$posts = $query->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($posts);
