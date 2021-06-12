<?php
require "DB.php";
mb_internal_encoding("utf8");

try{
//DB接続
// $pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","");
$dbconnect=new DB();
$pdo=$dbconnect->connect();
}catch(PDOException $e){
    die();
}

//プリペアドステートメントでSQL文の型を作る
// $stmt=$pdo->prepare("insert into login_mypage(name,mail,password,picture,comments)values(?,?,?,?,?)");
$stmt=$pdo->prepare($dbconnect->insert());

//bindvalueを使用し、実際に各カラムに何をするか記述
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['path_filename']);
$stmt->bindValue(5,$_POST['comments']);

//executeでクエリを実行
$stmt->execute();
$pdo=NULL;

//遷移先をheaderで指定
header('Location:after_register.html');
?>