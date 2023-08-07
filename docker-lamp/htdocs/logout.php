<?php
include 'define.php';

// セッションを開始または既存のセッションを再開
session_start();

// セッションを破棄してログアウト
session_unset();
session_destroy();

// ログアウト後にリダイレクトするURLを指定（例：ログインページなど）
// リダイレクト処理
header("Location: $LOGIN_URL");
exit;
