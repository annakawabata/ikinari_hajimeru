<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">

  <title>PHP基礎</title>

  </head>
  <body>
    <?php

    //検索機能をつけてデータを取ってくる
    // $codeから結果を取ってくる場合


        $code = $_POST['code'];

        $db = mysqli_connect('localhost', 'root', 'root', 'ikinari_hajimeru') or die(mysqli_connect_error());
        mysqli_set_charset($db, 'utf8');
        //------------------------------
        // anketo　から $code を取ってくる
        //これがクエリ

        // WHERE code ='.$code
        $sql = 'SELECT * FROM anketo WHERE code ='.$code;
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
    <a href="kensaku.html">検索画面に戻る</a></br>
  </body>
</html>