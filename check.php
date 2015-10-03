<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">

  <title>チェックPHP</title>

  
  </head>
  <body>
    <!--post送信されたデータをここでも使用できるように$_POSTで取得する
        $nicknameという変数名をつけて 'nickname'のデータを取ってくる-->
    <?php
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $passward = $_POST['passward'];
    $goiken = $_POST['goiken'];

    //htmlspecialchars
    //いたずらをされないよにデータを消毒する
    //他から入力されたHTMLを効かないようにする、怪しい文字を無毒化すること
    $nickname = htmlspecialchars($nickname);
    $email = htmlspecialchars($email);
    $passward = htmlspecialchars($passward);
    $goiken = htmlspecialchars($goiken);


    //内容に空欄がないかチェックする
    //内容が空だったら　と　入ってたら　の場合をif文で書く
    if($nickname == ''){
    	print'ニックネームが入力されていません。';
    }else{
    	print'ようこそ';
    	print $nickname;
    	print '様';
    	print'</br>';
    }

    if($email == ''){
    	print'メールアドレスが入力されていません。';
    }else{
    	print'メールアドレス';
    	print $email;
    	print'</br>';
    }

    if($passward == ''){
        print'パスワードが入力されていません。';
    }else{
        print'パスワード';
        print $passward;
        print'</br>';
    }

    if($goiken == ''){
    	print'ご意見が入力されていません。';
    }else{
    	print'ご意見';
    	print $goiken;
    	print'</br>';
    }

    if($nickname == ''|| $email == ''|| $goiken == ''){
        print '<form>';

        //onclick = "history.back()これはJavaScriptを利用しており、便利な機能
        //PHPでこの機能を書こうとすると難しいからよく使われている機能
        print '<input type = "button" onclick = "history.back()" value = "戻る">';
        print '</form>';
    }else{

        //さっきと同じようにpost送信でデータを指定したページへ運んでいる
        //postは郵便屋さんと同じような役割
        print '<form method = "post" action = "thanks.php">';
        //hiddenにすることで画面に表示されることなく、飛び先に飛ばす
        print '<input name = "nickname" type = "hidden" value = "'.$nickname.'">';
        // . ドットで文字と文字を連結している
        print '<input name = "email" type = "hidden" value = "'.$email.'">';
        print '<input name = "passward" type = "hidden" value = "'.$passward.'">';
        print '<input name = "goiken" type = "hidden" value = "'.$goiken.'">';
        print '<input type = "button" onclick = "history.back()" value = "戻る">';
        print '<input type = "submit" value = "OK">';
        print '</form>';
    }
    ?>

  </body>
</html>