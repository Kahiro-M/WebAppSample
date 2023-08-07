<?php include 'define.php'; ?>


<!DOCTYPE html>
<html>
<head>
    <title>ログイン</title>
</head>
<body>
    <h2>ログイン</h2>
    <form action="login.php" method="post">
        <label for="username">ユーザー名:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="password">検索対象のid:</label>
        <input type="text" id="target" name="target" required><br>
        <input type="submit" value="ログイン">
    </form>
</body>
</html>
