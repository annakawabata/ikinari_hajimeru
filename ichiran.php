<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">

  <title>PHP基礎</title>

  </head>
  <body>
    <?php
        //投稿された内容の一覧を表示させる

        //thanks.phpに書いてあるものをコピペし、持ってくる
        //データベースに接続するための大事な文章
        $db = mysqli_connect('localhost', 'root', 'root', 'ikinari_hajimeru') or die(mysqli_connect_error());
        mysqli_set_charset($db, 'utf8');
        //------------------------------
        // anketo　から 1(全部)を取ってくる
        //これがクエリ
        $sql = 'SELECT * FROM anketo WHERE 1';
        //データベースを使用する際に必要なこと
        //mysqli_queryに($db, $sql)が入っている
        //mysqli_query($db, $sql) or die(mysqli_error($db));
        
        //mysqli_query($db, $sql) or die(mysqli_error($db));

        //
        if ($result = mysqli_query($db, $sql)) {

            /* 連想配列を取得します */
            while ($row = mysqli_fetch_assoc($result)) {
                print $row['code'];
                print $row['nickname'];
                print $row['goiken'];
                print '</br>';
            }

            /* 結果セットを開放します */
            mysqli_free_result($result);
        }

    ?>
    </br>
    <a href="menu.html">メニューに戻る</a></br>
  </body>
</html>