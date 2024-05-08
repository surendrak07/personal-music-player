<?php 
    session_start();
    if(!isset($_SESSION["login"])){
        echo "Please login";
        die();
    }
    $email = $_SESSION["login"];
    $conn = new mysqli('localhost','root','','web basic')or die("db not connected");
    $req = mysqli_query($conn,"SELECT * FROM `signin` where `email`='$email'");
    $req = mysqli_fetch_array($req);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a07dfdc1e6.js" crossorigin="anonymous"></script>
    <title>Edit Profile</title>
    <style>
       body{
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #191919;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }.main{
            padding: 15px;
            border-radius: 10px;
            min-width: 225px;
            min-height:100px;
            background-color: #49c5b6;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5), 0 0 10px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.5);
        }
        .main ul{
            margin-left:25%;
            color:white;
        }
        .main:hover{
            transform : scale(1.1);
            transition : 0.5s;
        }
        input{
            padding:5px;
            margin-bottom:10px;
            padding-left: 50px;
            border-radius:5px;
            border:none;
        }
        input[type="submit"]{
            margin-left:40%;
            padding: 5px;
        }
        input[type="submit"]:hover{
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5), 0 0 10px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.5);
            transition:0.5s;
        }   
        .sub1 {
            position: relative;
        }
        i{
            position: absolute;
            left:5px;
            font-size: 20px;
            padding:5px;
        }
    </style>
</head>
<body>
    <div class="main">
        <form method="post" action="./authn.php">
            <ul>Edit</ul>
            <div class ="sub1">
            <input type="text" placeholder="username" id="username" name="username" value = "<?php echo $req["username"] ?>">
            <i class="fa-solid fa-user"></i>
            </div>
            <p class="error0" style="color : red"></p>
            <div class="sub1">
            <input type="email"  placeholder="email" id="email" name="email" value='<?php echo $req["email"]?>' disabled>
            <i class="fa-solid fa-envelope"></i>
            </div>
            <p class="error1" style="color : red"></p>
            <div class="sub1">
            <input type="tel" placeholder="phone_no" id="phone_no" name="phone_no" value = "<?php echo $req["phone_no"]?>">
            <i class="fa-solid fa-phone"></i> 
            </div>
            <p class="error3" style="color : red"></p>
            <input type="submit" name="update" value="update" onclick="signin_check(event)">
        </form>
    </div>
    <script>
            function signin_check(a){
                document.querySelector(".error0").innerHTML="";
                document.querySelector(".error1").innerHTML="";
                document.querySelector(".error2").innerHTML="";
                var uname=document.getElementById("username").value;
                var mail=document.getElementById("email").value;
                var num=document.getElementById("phone_no").value;
                const regexp = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const regphn = /^\d{10}$/;
                var p=regphn.test(num);
                var t=regexp.test(mail);
                if  (!t){
                    document.querySelector(".error1").innerHTML="enter valid email";
                    a.preventDefault();
                }
                if (!p){
                    document.querySelector(".error2").innerHTML="enter valid phone number contains 10 digits";
                    a.preventDefault();
                }
                if (uname.length==0){
                    document.querySelector(".error0").innerHTML="must fill username";
                    a.preventDefault();
                }
            }         
    </script>
</body>
</html>