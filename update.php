<?php

	session_start();
	$db = mysqli_connect('localhost', 'root', 'root', 'ikinari_hajimeru') or die(mysqli_connect_error());
	        mysqli_set_charset($db, 'utf8');

	if(isset($_REQUEST['code'])){
	$sql = sprintf('SELECT * FROM anketo WHERE code=%d',
		mysqli_real_escape_string($db,$_REQUEST['code']));
	$record = mysqli_query($db,$sql) or die(mysqli_error($db));
	$table = mysqli_fetch_array($record);
}
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">

  <title>PHP基礎</title>

  </head>
  <body>

  ニックネーム:<?php if(isset($_REQUEST['code'])){print $table['nickname'].'様';}?></br>
  メールアドレス:<?php if(isset($_REQUEST['code'])){print $table['email'];}?></br>
  ご意見を編集してください:</br>
  <input name = "goiken" type = "text" style = "width:300px" value="<?php if(isset($_REQUEST['code'])){print $table['goiken'];}?>">
  
  </br>
  
  <!--submitボタンでデータを共に次のページへ持っていく-->
  <input type = "submit" value = "保存">
  <input type = "button" onclick = "history.back()" value = "戻る">
  </form>

  </body>
</html>