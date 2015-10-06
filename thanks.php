<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">

  <title>PHP基礎</title>

  </head>
  <body>
    <?php

    //データベース関連
    //下に書いてあるやつとセット①
    $db = mysqli_connect('localhost', 'root', 'root', 'ikinari_hajimeru') or die(mysqli_connect_error());
    mysqli_set_charset($db, 'utf8');
    //--------------------------------------------

    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $goiken = $_POST['goiken'];

    //htmlspecialcharsn
    //いたずらをされないよにデータを消毒する
    //他から入力されたHTMLを効かないようにする、怪しい文字を無毒化すること
    $nickname = htmlspecialchars($nickname);
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);
    $goiken = htmlspecialchars($goiken);

    print $nickname;
    print'様</br>';
    print'ご意見ありがとうございました。</br>';
    print'頂いたご意見「';
    print $goiken;
    print'」</br>';
    print $email;
    print'にメールを送りましたのでご確認ください。';


    //アンケートに答えてくださった方に自動でメールを送信させる機能
    
    // $mail_sub = 'アンケート受け付けました。';//メールタイトル
    // $mail_body = $nickname."様へ\nアンケートご協力ありがとうございました。";//メール本文
    // $mail_body = html_entity_decode($mail_body,ENT_QUOTES,"UTF-8");
    // $mail_head = 'From:xxx@xxx.co.jp';
    // mb_language('Japanese');
    // mb_internal_encoding("UTF-8");
    // mb_send_mail($email,$mail_sub,$mail_body,$mail_head);
    
    //------------------------------------------
    //データベース関連
    //一番上に書いてある文章とセット⑵
    $sql = 'INSERT INTO anketo(nickname,email,password,goiken)VALUES("'.$nickname.'","'.$email.'","'.$password.'","'.$goiken.'")';
    mysqli_query($db, $sql) or die(mysqli_error($db));
    exit();
    ?>
  </body>
</html>