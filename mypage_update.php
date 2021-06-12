<?php
require "DB.php";
mb_internal_encoding("utf8");
//セッションスタート
session_start();

//データベース接続　try catch文
try{
    //DB接続
    //$pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","");
    $dbconnect=new DB();
    $pdo=$dbconnect->connect();
   }catch(PDOException $e){
       die();
   }

//プリペアドステートメント
// $stmt=$pdo->prepare("update login_mypage set name=?,mail=?,password=?,comments=? where name=? and password=?");
$stmt=$pdo->prepare($dbconnect->update());

//バインドバリューで値セット
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['comments']);
$stmt->bindValue(5,$_SESSION['name']);
$stmt->bindValue(6,$_SESSION['password']);
//excuteでクエリを実行
$stmt->execute();

//
// $stmt1=$pdo->prepare("select*from login_mypage where name=? and password=?");
$stmt1=$pdo->prepare($dbconnect->select1());
$stmt1->bindValue(1,$_POST['name']);
$stmt1->bindValue(2,$_POST['password']);
$stmt1->execute();

//データベースを切断
$pdo=NULL;

//fetch while文でデータを取得し、sessionを上書き（してるはず）
while($row=$stmt1->fetch()){
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['path_filename']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}

//mypage.phpへリダイレクト
header('Location:./mypage.php');


?>
