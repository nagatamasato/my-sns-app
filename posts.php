<?php
// db.php - データベース接続
$host = 'localhost';
$dbname = 'testdb';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("データベース接続エラー: " . $e->getMessage());
}

// posts.php - APIエンドポイント
$limit = 10; // 1回のリクエストで取得する投稿数
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$query = $pdo->prepare("SELECT * FROM posts ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
$query->bindParam(':limit', $limit, PDO::PARAM_INT);
$query->bindParam(':offset', $offset, PDO::PARAM_INT);
$query->execute();

$posts = $query->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($posts);
?>
