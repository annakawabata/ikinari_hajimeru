<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">

  <title>PHP基礎</title>

  </head>
  <body>

    <h1>投稿一覧</h1>
    <?php
        //投稿された内容の一覧を表示させる

        //thanks.phpに書いてあるものをコピペし、持ってくる
        //データベースに接続するための大事な文章
        $db = mysqli_connect('localhost', 'root', 'root', 'ikinari_hajimeru') or die(mysqli_connect_error());
        mysqli_set_charset($db, 'utf8');
        //------------------------------
        // anketo　から 1(全部)を取ってくる
        //これがクエリ

        //WHERE del_flg=0 論理削除
        $sql = 'SELECT * FROM anketo WHERE del_flg=0';
        //データベースを使用する際に必要なこと
        //mysqli_queryに($db, $sql)が入っている
        //mysqli_query($db, $sql) or die(mysqli_error($db));
        
        //mysqli_query($db, $sql) or die(mysqli_error($db));

        //mysqli_queryデータベースにCRUD処理を与える
        if ($result = mysqli_query($db, $sql)) {

            /* 連想配列を取得します */
            while ($row = mysqli_fetch_assoc($result)) {
                print $row['code'];
                print $row['nickname'];
                print $row['goiken'];
                print sprintf('<a href="delete.php?code=%d">削除</a>',$row['code']);
                print '</br>';
                // var_dump($row['code']);
            }

            /* 結果セットを開放します */
            mysqli_free_result($result);
        }



    ?>
    <a href="delete.php?id=<?php echo h($post['code']); ?>" style="color: #F33;">削除</a>
    </br>
    <a href="menu.html">メニューに戻る</a></br>
  </body>
</html>