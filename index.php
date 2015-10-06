<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">

  <title>投稿</title>

  </head>
  <body>

  <h1>投稿</h1>

  <?php

    $db = mysqli_connect('localhost', 'root', 'root', 'php_test') or die(mysqli_connect_error());
    mysqli_set_charset($db, 'utf8');


    $name = $_POST['name'];
    $password = $_POST['password'];
    $message = $_POST['message'];

    $name = htmlspecialchars($name);
    $password = htmlspecialchars($password);
    $message = htmlspecialchars($message);

  ?>
  
  <form method = "post" action = "index.php" >
  ニックネームを入力してください。</br>
  <input name = "name" type = "text" style = "width:100px"></br>
  パスワードを入力してください。</br>
  <input name = "password" type = "password" style = "width:200px"></br>
  本文を入力してください。(最大400文字)</br>
  <textarea name = "message" cols = "50" row = "10"></textarea></br>
  </br>
  <input type = "submit" value = "投稿">
  

  <?php

  $sql = 'INSERT INTO comments(name,password,message)VALUES("'.$name.'","'.$password.'","'.$message.'")';
    mysqli_query($db, $sql) or die(mysqli_error($db));
    exit();
  ?>

  <a href="index.php">投稿一覧に戻る</a></br>
  </form>

  </body>
</html>