<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin</title>
    <script src="https://kit.fontawesome.com/a07dfdc1e6.js" crossorigin="anonymous"></script>
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
            margin-left:22.5%;
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
            <ul>Signin</ul>
            <div class ="sub1">
            <input type="text" placeholder="Enter username" id="username" name="username" >
            <i class="fa-solid fa-user"></i>
            </div>
            <p class="error0" style="color : red"></p>
            <div class ="sub1">
            <input type="email"  placeholder="email" id="email" name="email">
            <i class="fa-solid fa-envelope"></i>
            </div>
            <p class="error1" style="color : red"></p>
            <div class ="sub1">
            <input type="password"  placeholder="password" id="password" name="password">
            <i class="fa-solid fa-key"></i>
            <i class="fa-solid fa-eye" id="togglePassword" onclick="PasswordVisibility()"></i>
            </div>
            <p class="error2" style="color : red "></p>
            <div class ="sub1">
            <input type="tel" placeholder="phone_no" id="phone_no" name="phone_no">
            <i class="fa-solid fa-phone"></i>
            </div>
            <p class="error3" style="color : red"></p>
            <input type="submit" name="signin" value="signin" onclick="signin_check(event)">
        </form>
    </div>
    
    <script>
            function signin_check(a){
                document.querySelector(".error0").innerHTML="";
                document.querySelector(".error1").innerHTML="";
                document.querySelector(".error2").innerHTML="";
                document.querySelector(".error3").innerHTML="";
                var uname=document.getElementById("username").value;
                var mail=document.getElementById("email").value;
                var pass=document.getElementById("password").value;
                var num=document.getElementById("phone_no").value;
                const regexp = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const regphn = /^\d{10}$/;
                var p=regphn.test(num);
                var t=regexp.test(mail);
                if  (!t){
                    document.querySelector(".error1").innerHTML="enter valid email";
                    a.preventDefault();
                }
                if (pass.length< 8 ){
                    document.querySelector(".error2").innerHTML="password must contain atleast 8 characters";
                    a.preventDefault();
                }
                if (!p){
                    document.querySelector(".error3").innerHTML="enter valid phone number contains 10 digits";
                    a.preventDefault();
                }
                if (uname.length==0){
                    document.querySelector(".error0").innerHTML="must fill username";
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
<?php
?>
