<?php
mb_internal_encoding("utf8");
session_start();

try{
//try catch文 DBに接続できなければエラーメッセージを表示する。
//データベース接続開始
$pdo = new PDO("mysql:dbname=lesson01;host=localhost","root","");
}catch(PDOException $e){
//dieはメッセージを出力し、現在のスクリプトを終了するものである。
//ダブルクオテーション内に出力するメッセージを記述する。
die("<p>申し訳ございません。現在サーバーが込み合っており、一時的にアクセスできません。<br>しばらくしてからサイドログインしてください</p>
<a> href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
);
}

//プリペアドステートメントでSQL文の型を作る
$stmt=$pdo->prepare("select*from login_mypage where mail=? and password=? ");

//bindvalueを使用し、実際に各カラムに何をするか記述
//login.phpからpost通信を受けとる場合と、mypage_update.phpからリダイレクトしてsessionを受け取る場合にissetで場合分け
if(isset($_POST['mail'])){
    $stmt->bindValue(1,$_POST['mail']);
    $stmt->bindValue(2,$_POST['password']);    
}else{
    $stmt->bindValue(1,$_SESSION['mail']);
    $stmt->bindValue(2,$_SESSION['password']); 
}

//executeでクエリを実行
$stmt->execute();

//データベース切断
$pdo=NULL;

//fetch.while文でデータを取得し、sessionに代入
while($row=$stmt->fetch()){
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['path_filename']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}

//データ取得できず(emptyを使用して判定)sessionがなければ、リダイレクト（エラー画面へ)
if (empty($_SESSION['id'])){
    header('Location: ./login_error.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="mypage.css">
    </head>
    <!--sessionとhtmlを使って記述-->
    <body>
        <h2>会員情報</h2>
        <p>こんにちは！<?php echo $_SESSION['name'];?>さん</p>
        <img src="<?php echo $_SESSION['path_filename'];?>">
        <br>
        氏名:<?php echo $_SESSION['name'];?>
        <br>
        メール:<?php echo $_SESSION['mail'];?>
        <br>
        パスワード:<?php echo $_SESSION['password'];?>
        <br>
        <?php echo $_SESSION['comments'];?>
        <br>
        <form action="mypage_hensyu.php" method="post">
            <input type="submit" value="編集する">
        </form>
    </body>
<html>
