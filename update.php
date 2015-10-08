<?php
    //編集時に必要な情報
	session_start();
	$db = mysqli_connect('localhost', 'root', 'root', 'ikinari_hajimeru') or die(mysqli_connect_error());
	        mysqli_set_charset($db, 'utf8');

	//編集時に必要な情報
	  //$tableの中に anketo　の情報を全部入れている
	if(isset($_REQUEST['code'])){
	$sql = sprintf('SELECT * FROM anketo WHERE code=%d',
		mysqli_real_escape_string($db,$_REQUEST['code']));
	$record = mysqli_query($db,$sql) or die(mysqli_error($db));
	$table = mysqli_fetch_array($record);
}

//更新している
if(!empty($_POST)){
	if($_POST['goiken'] != ''){
		$sql = sprintf('UPDATE * SET goiken="%s" WHERE id=%d',
			mysqli_real_escape_string($db,$_POST['goiken']),
			mysqli_real_escape_string($db,$_GET['code']));

			mysqli_query($db,$sql) or die(mysqli_error($db));

			//これすることによって再読込ボタンを押したことによる、二重投稿を防止している。
			header('Location:menu.html');
			exit();
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">

  <title>PHP基礎</title>

  </head>
  <body>
  <!--<?php if(isset($_REQUEST['code'])){print $table['nickname'].'様';}?>
  これはcode(id)をリクエストしてその中のデータをプリントしている-->
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