<?php
mb_internal_encoding("utf8");

//セッションスタート
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="mypage.css">
    </head>

    <body>
    <h2>会員情報</h2>
        <p>こんにちは！<?php echo $_SESSION['name'];?>さん</p>
        <form action="mypage_update.php" method="post">
        <img src="<?php echo $_SESSION['path_filename'];?>">
        <br>
        氏名:<input type="text" name="name" value="<?php echo $_SESSION['name'];?>">
        <br>
        メール:<input type="text" name="mail" value="<?php echo $_SESSION['mail'];?>">
        <br>
        パスワード:<input type="text" name="password" value="<?php echo $_SESSION['password'];?>">
        <br>
        <textarea name="comments" ><?php echo $_SESSION['comments'];?></textarea>
        <br>
        <input type="submit" value="この内容に変更する">
        </form>

    </body>
</html>