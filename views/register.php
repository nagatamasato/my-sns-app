<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
</head>
<body>
    <h1>ユーザー登録</h1>
    <form action="index.php?action=register" method="post">
        <label for="name">ユーザー名:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">登録</button>
    </form>
    <p>既にアカウントをお持ちですか？ <a href="index.php?action=login">ログインはこちら</a></p>
</body>
</html>
