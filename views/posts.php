<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿一覧</title>
    <script src="js/infinite-scroll.js" defer></script>
</head>
<body>
    <h1>投稿一覧</h1>
    <div id="posts">
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <p><strong><?php echo htmlspecialchars($post['name']); ?></strong></p>
                <p><?php echo htmlspecialchars($post['content']); ?></p>
                <p><small><?php echo htmlspecialchars($post['created_at']); ?></small></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
