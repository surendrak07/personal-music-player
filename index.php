<?php
session_start();
if (isset($_SESSION["login"])){
    header("Location: ./home.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <script src="https://kit.fontawesome.com/a07dfdc1e6.js" crossorigin="anonymous"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #191919;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }
        .main{
            padding: 15px;
            border-radius: 10px;
            width:250px;
            min-width: 250px;
            min-height:100px;
            background-color: #49c5b6;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5), 0 0 10px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.5);
        }
        .main ul{
            margin-left:40%;
            margin-bottom:20px;
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
        p{
            margin-left:15px;
        }
        .sub{
            position: relative;
        }
        i{
            position: absolute;
            left:5px;
            padding: 5px;
            font-size:20px;
        }
        .fa-eye {
            left:85%;
            font-size :15px;
            top:2px;
        }
        .fa-eye-slash{
            left:85%;
            font-size :15px;
            top:2px;
        }
        
    </style>
</head>
<body>
    <div class="main">
        <form method="post" action="./authn.php">
            <ul>Login</ul>
            <div class="sub">
            <input type="email"  placeholder="Enter email" id="email" name="email">
            <i class="fa-solid fa-envelope"></i>
            </div>
            <p class="error1" style="color : red"></p>
            <div class="sub">
            <input type="password" placeholder="Enter password" id="password" name="password">
            <i class="fa-solid fa-key"></i>
            <i class="fa-solid fa-eye" id="togglePassword" onclick="PasswordVisibility()"></i>
            </div>
            <p class="error2" style="color : red "></p>
            <input type="submit" name="login" value="login" onclick="login_check(event)">
            <p style="color : white">Don't have account? <a href="./signin.php">signin</a></p>
            
            
        </form>
    </div>
    
    <script>
            function login_check(a){
                document.querySelector(".error2").innerHTML = "";
                document.querySelector(".error1").innerHTML = "";
                var pass=document.getElementById("password").value;
                var mail=document.getElementById("email").value;
                const regexp = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (pass.length< 8 ){
                    document.querySelector(".error2").innerHTML="password must contain atleast 8 characters";
                    a.preventDefault();
                }
                var t=regexp.test(mail);
                if  (!t){
                    document.querySelector(".error1").innerHTML="enter valid email";
                    a.preventDefault();
                }
            }
            function PasswordVisibility() {
            var pass = document.getElementById("password");
            var Icon = document.getElementById("togglePassword");
            if (pass.type === "password") {
                pass.type = "text";
                Icon.classList.remove("fa-eye");
                Icon.classList.add("fa-eye-slash");
            } 
            else {
                pass.type = "password";
                Icon.classList.remove("fa-eye-slash");
                Icon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>


