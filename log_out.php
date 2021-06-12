<?php
session_start();
//session_destroyでログアウトできる
session_destroy();
header("Location:login.php");
?>