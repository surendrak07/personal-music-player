<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>move files</title>
    <style>
        body{
            width:100vw;
            height:100vh;
        }
        input{
            margin-top:5px;
        }
    </style>
</head>
<body>
    <div class="main">
    <label for="songname">song name:</label>
    <input type="text"><br>
    <label for="img">image file:</label>
    <input type="file" name="song_image" id="song_image"><br>
    <label for="img">songfile file:</label>
    <input type="file" name="song_audio" id="song_audio"><br>
    <input type="submit" value="move">
    </div>
</body>
</html>
