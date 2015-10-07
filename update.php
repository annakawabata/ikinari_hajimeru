<?php
	$db = mysqli_connect('localhost', 'root', 'root', 'ikinari_hajimeru') or die(mysqli_connect_error());
	        mysqli_set_charset($db, 'utf8');


	$code = $_REQUEST['code'];

	$sql = sprintf("SELECT * FROM anketo WHERE code=%d",
	    mysql_real_escape_string($code)
	);
	$recordSet = mysql_query($sql);
	$data = mysql_fetch_assoc($recordSet);
	//更新している

	$sql = sprintf('UPDATE anketo SET nickname="%s", goiken="%s" WHERE code=%d',
	    mysql_real_escape_string($_POST['code']),
	    mysql_real_escape_string($_POST['nickname']),
	    mysql_real_escape_string($_POST['goiken'])
	);
		mysql_query($sql) or die(mysql_error());
?>



<!DOCTYPE>
<html>
<head>
	<meta charset="UTF-8">
	<title>ひとこと掲示板</title>
</head>
<body>
	<div>
		<h1>ひとこと掲示板</h1>
	</div>
	<div>
		<div style="text-align: right"><a href="index.html">投稿</a></div>
		<form action="" method="post">
			<!-- dlタグは定義・説明を表す際に使用。dlで全体を囲み、dtは説明される言葉・ddは説明や定義 -->
			<dl>
				<dt><?php echo htmlspecialchars($nickname['nickname']);?>さん、メッセージを編集してください</dt>
				<h4><?php echo htmlspecialchars($nickname['nickname']);?>さん</h4>
				<h4>メールアドレス：<?php echo htmlspecialchars($email['email']);?></h4>
				<dd>
					<!-- <TEXTAREA>は複数行の入力フィールドを作成するタグです。<TEXTAREA>～</TEXTAREA>内に記述されたテキストは、入力フィールドの初期値として表示されます。 -->
					<!-- colsとrowsは必須。colsは横の長さ、rowsは行数を指定 -->
					<textarea name="goiken" cols="50" rows="5"><?php if(isset($_REQUEST['code'])){echo h($goiken);}?></textarea>					
				</dd>
			</dl>
			<div>
				<input type="submit" value="保存する">
			</div>
		</form>
	</div>
</body>
</html>