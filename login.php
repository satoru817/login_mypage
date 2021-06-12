<?php
session_start();
if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログインページ</title>
        <link rel="stylesheet" type="text/css" href="after_register.css">
    </head>
    <body>
        <header>
            <img src="4eachblog_logo.jpg">
            <div class="login"><a href="login.php">ログイン</a></div>
        </header>
        <form action="mypage.php" method="post">
            メールアドレス
            <br>
            <!--前回ログイン状態を保持するにチェックを入れていた場合、メールアドレスとパスワード入力項目にcookieからの値を呼び出して入力する。-->
            <input type="text" name="mail" value="<?php if(isset($_COOKIE['login_keep'])){echo $_COOKIE['mail'];}?>">
            <br>
            パスワード
            <br>
            <input type="password" name="password" value="<?php if(isset($_COOKIE['login_keep'])){echo $_COOKIE['password'];}?>">
            <br>
            <p><input type="checkbox" name="login_keep" value="login_keep" 
            <?php 
            if(isset($_COOKIE['login_keep'])){
                echo "checked='checked'";
            }
            ?>>ログイン状態を保持する</p>
            <br>
            <input type="submit" value="ログイン">
        </form>
        
    </body>
</html>