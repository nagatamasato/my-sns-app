<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="index.php?action=login" method="post">
        <label for="name">ユーザー名:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">ログイン</button>
    </form>
    <p>アカウントがありませんか？ <a href="index.php?action=register">登録はこちら</a></p>
</body>
</html>
