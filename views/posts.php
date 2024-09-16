<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿一覧</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/infinite-scroll.js" defer></script>
</head>
<body>
    <div class="header">
        <div class="header-left">
            <h1>投稿一覧</h1>
            <a href="index.php?action=createPost" class="new-post-button">新規投稿</a>
        </div>
        <div class="header-right">
            <a href="index.php?action=logout" class="logout-button">ログアウト</a>
        </div>
    </div>

    <div id="posts">
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <p><strong>@<?php echo htmlspecialchars($post['name']); ?></strong></p>
                <p><?php echo htmlspecialchars($post['content']); ?></p>
                <p><small><?php echo htmlspecialchars($post['created_at']); ?></small></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
