<html>
    <head>
        <title>upload</title>
    </head>
    <body>
        <div class="main">
            <form method="post" action="upload.php" enctype="multipart/form-data">
            <label for="song_name">song_name:</label>
            <input type="text" name="song_name" id="song_name"> <br>
            <label for="img">imagefile:</label>
            <input type="file" name="song_image" id="song_image"> <br>
            <label for="audio">audiofile:</label>
            <input type="file" name="song_audio" id="song_audio"> <br>
            <input type="submit" value="upload" name="upload">
            </form>
        </div>
    </body>
</html>
<?php
if(isset($_POST["upload"])){
    $name=$_POST["song_name"];
    $img=$_FILES["song_image"];
    $aud=$_FILES["song_audio"];
    $conn=new mysqli("localhost","root","","web basic") or die("db not connected");
    $res=mysqli_query($conn,"select max(`id`) as `id` from `songs`");
    $res=mysqli_fetch_array($res);
    $val=$res['id']+1;
    move_uploaded_file($img['tmp_name'],'./upld_img/'. $val .'.png');
    move_uploaded_file($aud['tmp_name'],'./upld_aud/'. $val.'.mp3');
    $res="INSERT INTO `songs`(`song_name`) VALUES ('$name')";
    $res=mysqli_query($conn,$res);
    if ($res){
        echo 'uploaded';
    }
}
?>