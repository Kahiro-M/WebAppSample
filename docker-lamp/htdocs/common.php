<?php
// common.php
// 共通関数
function dig_level($db, $upper_id){
    $sql = "SELECT * FROM `sample`.`data` WHERE `upper_id` LIKE $upper_id";
    $ret = $db->query($sql);
    while ($row = $ret->fetch()) {
        
        print(str_repeat('　',$row['level']*2).'id:'.$row['id']);
        print('　'.$row['name']);
        print('　'.'('.$row['level'].')');
        print('<br>');

        $child_ret = dig_level($db, $row['id']);
    }
}
?>