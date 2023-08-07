<?php
// データベース接続設定
include 'config.php';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    print('接続成功');
} catch (PDOException $e) {
    die("エラー: " . $e->getMessage());
}