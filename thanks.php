<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">

  <title>PHP基礎</title>

  </head>
  <body>
    <?php
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $passward = $_POST['passward'];
    $goiken = $_POST['goiken'];

    //htmlspecialcharsn
    //いたずらをされないよにデータを消毒する
    //他から入力されたHTMLを効かないようにする、怪しい文字を無毒化すること
    $nickname = htmlspecialchars($nickname);
    $email = htmlspecialchars($email);
    $passward = htmlspecialchars($passward);
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
    
    $mail_sub = 'アンケート受け付けました。';//メールタイトル
    $mail_body = $nickname."様へ\nアンケートご協力ありがとうございました。";//メール本文
    $mail_body = html_entity_decode($mail_body,ENT_QUOTES,"UTF-8");
    mb_language('Japanese');
    mb_internal_encoding("UTF-8");
    mb_send_mail($email,$mail_sub,$mail_body,$mail_head);
    ?>

  </form>

  </body>
</html>