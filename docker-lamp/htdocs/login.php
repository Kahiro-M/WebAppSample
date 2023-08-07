<?php
include 'define.php';
include 'config.php';
include 'common.php';

session_start();

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("エラー: " . $e->getMessage());
}

// フォームから送信されたデータを取得
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $target = $_POST['target'];

    // ユーザーが存在するかを確認
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // パスワードを確認
    if ($user && password_verify($password, $user['password'])) {
        print('<div>階層情報表示</div>');

        // その他の必要な処理を追加
        $sql = "SELECT * FROM `sample`.`data` WHERE `id` LIKE $target";
        $ret = $db->query($sql);
        if($ret){
            while ($row = $ret->fetch()) {
                print(str_repeat('　',$row['level']).'id:'.$row['id']);
                print('　'.$row['name']);
                print('　'.'('.$row['level'].')');
                print('<br>');
                $top_level_id = $row['id'];
                dig_level($db, $top_level_id);
            }
        }
    
    } else {
        // ログイン失敗
        echo "ログイン失敗：ユーザー名またはパスワードが正しくありません。";
    }
}
?>
<a href='<?php echo($LOGOUT_URL) ?>'>ログアウト</a>
