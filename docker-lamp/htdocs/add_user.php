<?php include 'define.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>ユーザー追加</title>
</head>
<body>
    <h2>ユーザー追加</h2>
    <form action="register.php" method="post">
        <label for="username">ユーザー名:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="ユーザー追加">
    </form>
</body>
</html>
