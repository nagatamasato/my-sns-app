<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿作成</title>
</head>
<body>
    <h1>新規投稿</h1>
    <form action="index.php?action=createPost" method="post">
        <label for="content">投稿内容:</label>
        <textarea id="content" name="content" rows="4" cols="50" required></textarea>
        <br>
        <button type="submit">投稿</button>
    </form>
    <p><a href="index.php?action=posts">投稿一覧に戻る</a></p>
</body>
</html>
