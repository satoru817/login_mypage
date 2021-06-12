<?php
class DB{
    //mypage.phpのpdoオブジェクト作成。
    public function connect(){
        $pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","");    
        return $pdo;
    }

    //register_insert.phpのinsert文
    public function insert(){
        return "insert into login_mypage(name,mail,password,picture,comments)values(?,?,?,?,?)";
    }
    //mypage.phpのselect文の用意
    public function select(){
        return "select*from login_mypage where mail=? && password=? ";
    }
    
    //mypage_updateのupdate文の用意
    public function update(){
        return "update login_mypage set name=?,mail=?,password=?,comments=? where name=? and password=?";
    }

    //mypage_updateのselect文の用意
    public function select1(){
        return "select*from login_mypage where name=? and password=?";
    }



}
?>