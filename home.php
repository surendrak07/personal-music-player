<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Music Player</title>
        <style>
            *{  
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
            body {
                font-family: Arial, sans-serif;
                background-color: #000;
                color: #fff;
            }
            .main{
                display: flex;
                padding: 10px;
                height: 100vh;
            }
            .list{
                /* border: 2px solid black; */
                padding: 10px;
                width: 25vw;
                height: 95vh;
                overflow: auto;
                border-radius:10px;
                background-color: #191919;
                /* background-color: #49c5b6; */
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            }
            .list p {
                font-weight: bold;
                margin-bottom: 10px;
                color: #fff;
            }
            .list a{
                cursor: pointer;
                padding : 10px;
                display : inline-block;
                width : 90%;
                border-radius : 10px;
                margin-bottom : 10px;
                margin-left : 17.5px;
                transition : 0.5s;
                color: #000;
                background-color: #ffffff;
            }
            .list a:hover{
                transform : scale(1.1);
                background-color: #49c5b6; 
                box-shadow: 0 0 20px rgba(73, 197, 182, 0.8);
            }
            .photo{
                width: 75vw;
                margin-left: 5px;
                padding: 15px;
                height: 95vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background-color: #49c5b6;
                border-radius: 10px;
                box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            }
            .photo img{
                width: 65%;
                height: 65%;
                border-radius: 10px;
                box-shadow: 0 0 20px rgba(255, 255, 255, 0.5), 0 0 40px rgba(255, 255, 255, 0.5), 0 0 80px rgba(255, 255, 255, 0.5);
            }
            .photo img:hover{
            transform : scale(1.05);
            transition : 0.5s;
        }
            .audio1{
                margin-top: 25px;
                padding-top: 10px;
                width: 100%;
                height : 14.5%;
            }
            .audio1 audio{
                width : 100%;
                padding: 5px;
                outline: none;
                background-color: #ffffff;
                border-radius: 10px;
            }
            .edit{
                cursor: pointer;
                padding:10px;
                text-align:right;
                height:5%;
            }
            .edit a {
                margin-left: 10px;
                text-decoration: none;
                color: #000;
                padding: 5px 10px;
                border-radius: 5px;
                background-color: #fff;
                transition: background-color 0.3s ease, color 0.3s ease;
            }
            .edit a:hover {
                background-color: #49c5b6; 
                box-shadow: 0 0 20px rgba(73, 197, 182, 0.8);

            }
            
            
        </style>
    </head>
    <body>
    <?php 
        session_start();
        if (!isset($_SESSION['login'])){
            echo "please login<br>";
            echo '<a href="index.php">login</a>';
            die();
        }
        $conn=mysqli_connect('localhost','root','','web basic');
        $songs=mysqli_query($conn,'select * from `songs`'); 
    ?>
        <div class="edit">
        <a href="./edit.php">Edit profile</a>
        <a href="./logout.php">Logout</a>
        </div>
        <div class="main">
        <div class="list">
            <p>List of songs:</p><br>
            <?php
                foreach($songs as $item){
                    // echo '<a onclick= "hai(\''.base64_encode($item["song_name"]).'\')">hai</a>'.'<br>';
                    echo '<a  data-item="' . base64_encode($item["id"]) . '">'.$item['song_name'].'</a>';
                }
            ?>
        </div>
        <div class="photo">
            <img alt="404 file not found" class='main_theme'>
            <div class="audio1">
                <audio controls class='audio'>
                    <source type="audio/mpeg" class='main_song'>
                </audio>
            </div>
        </div>
    </div>
    
    </body>
</html>
<!-- <script>
    let i=0;
    let a = document.querySelector(".list");
    let ancher = a.querySelectorAll("a");
    ancher.forEach(item =>{
        const val = item.getAttribute("data-item");
        item.addEventListener("click",(e) =>{
            k = atob(val);
            document.querySelector(".main_theme").src = "./img/" + k +  ".png";
            document.querySelector(".main_song").src = "./audio/" + k +  ".mp3";
            document.querySelector(".audio").load();
            document.querySelector(".audio").play();
        })
    })
    ancher[0].click();
</script> -->
<script>
    let currentIndex = 0;
    let songs = document.querySelectorAll(".list a");
    let audio = document.querySelector(".audio");

    function playSong(index) {
        let song = songs[index];
        let val = song.getAttribute("data-item");
        let decodedValue = atob(val);
        document.querySelector(".main_theme").src = "./upld_img/" + decodedValue + ".png";
        document.querySelector(".main_song").src = "./upld_aud/" + decodedValue + ".mp3";
        audio.load();
        audio.play();
        currentIndex = index;
    }

    songs.forEach((song, index) => {
        song.addEventListener("click", (e) => {
            playSong(index);
        });
    });

    audio.addEventListener("ended", () => {
        // Play the next song
        currentIndex = (currentIndex + 1) % songs.length;
        playSong(currentIndex);
    });

    // Play the first song initially
    playSong(0);
</script>