<?php
include 'define.php';
include 'config.php';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("エラー: " . $e->getMessage());
}

// フォームから送信されたデータを取得
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // パスワードをハッシュ化
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // ユーザーをデータベースに追加
    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashed_password);

    if ($stmt->execute()) {

        // 3秒待機
        sleep(3);
        // リダイレクト処理
        header("Location: $LOGIN_URL");
        echo "ユーザーが追加されました！";
        exit;
        
    } else {
        echo "エラー: ユーザーを追加できませんでした。";
    }
}
?>
