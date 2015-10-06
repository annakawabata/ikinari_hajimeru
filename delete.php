<?php
//WHEREは必ずカラム名
// mysqli_query($db,'DELETE FROM anketo WHERE code=' . $_REQUEST['code']) or die (mysqli_error($db));

//データ扱う時に絶対に必要な３つ

// $db = mysqli_connect('localhost', 'root', 'root', 'ikinari_hajimeru') or die(mysqli_connect_error());
// mysqli_set_charset($db, 'utf8');

// var_dump($_REQUEST['code']);

// $sql = sprintf('DELETE * FROM anketo WHERE code=%d', $_REQUEST['code']);

// mysqli_query($db,$sql);
//1.DB情報用意
//2.データ操作方法（SQLを決める）
//3.クエリを発行する(mysqli_query)
//SQL文はデータを操作する方法を決めている
//

$db = mysqli_connect('localhost', 'root', 'root', 'ikinari_hajimeru') or die(mysqli_connect_error());
mysqli_set_charset($db, 'utf8');

// var_dump($_REQUEST['code']);

//削除の場合 （アスタリスク いらない）
// code はいつもはidと同じ
//$sql = sprintf('DELETE FROM anketo WHERE code=%d', $_REQUEST['code']);
// mysqli_query($db,$sql);
// header('Location: ichiran.php');


//論理削除の場合UPDATE
//anketo の中のdel_flg=1　を１に変えるという文章
$sql = sprintf('UPDATE anketo SET del_flg=1 WHERE code=%d' , $_REQUEST['code']);
mysqli_query($db,$sql);
header('Location: ichiran.php');

// $sql = 'DELETE * FROM anketo WHERE code=1';
// $sql = sprintf('SELECT * FROM anketo WHERE code=%d',$_REQUEST['code']);
// echo $sql;

// $result = mysqli_query($db,$sql) or die(mysqli_connect_error());

// while ($row = mysqli_fetch_assoc($result)) {
//     var_dump($row);
// }
// header('Location: ichiran.php');

// $code = (int)$_REQUEST['code'];
// var_dump($code);

// $int = 2;
// var_dump($int);
?>