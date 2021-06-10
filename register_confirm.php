<?php 
mb_internal_encoding("utf8");
//$_FILESは連想配列：仮保存されたファイル名を取得（サーバーへ仮アップロードされたディレクトリとファイル名)
$temp_pic_name=$_FILES['picture']['tmp_name'];

//元のファイル名を取得。事前に画像を格納するimageという名前のフォルダを作成しておく必要あり
$original_pic_name=$_FILES['picture']['name'];
$path_filename='./image/'.$original_pic_name;

//仮保存のファイルを指定したパスに移動する
move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);
?>

<!DOCTYPE HTML>
<html>
    <head>
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    </head>
        <body>
        <h2>会員登録　確認</h2>
        <div class="name">
            氏名：
            <?php echo $_POST['name'];?>
            <br>
            メール：
            <?php echo $_POST['mail'];?>
            <br>
            パスワード:
            <?php echo $_POST['password'];?>
            <br>
            プロフィール写真：
            <?php echo $original_pic_name;?>
            <br>
            コメント：
            <?php echo $_POST['comments'];?>
            <br>
        </div>

        <form action="register.php"> 
            <input type="submit" class="button1" value="戻って修正する"/>
        </form>

        <form action="register_insert.php" method="post">
            <input type="submit" class="button2" value="登録する"/>
            <input type="hidden" value="<?php echo $_POST['name'];?>" name="name">
            <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
            <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
            <input type="hidden" value="<?php echo $path_filename;?>" name="path_filename">
            <input type="hidden" value="<?php echo $_POST['comments'];?>" name="comments">
        </form>

        
        </body>
<html>