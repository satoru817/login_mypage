<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログインページ</title>
        <link rel="stylesheet" type="text/css" href="after_register.css">
    </head>
    <body>
        <form action="mypage.php" method="post">
            メールアドレス
            <br>
            <input type="text" name="mail">
            <br>
            パスワード
            <br>
            <input type="password" name="password">
            <br>
            <p><input type="checkbox" name="login_keeper">ログイン状態を保持する</p>
            <br>
            <input type="submit" value="ログイン">
        </form>
        
    </body>
</html>