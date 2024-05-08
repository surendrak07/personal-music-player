    <?php 
    session_start();
    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $conn = mysqli_connect("localhost","root","","web basic") or die("db not connected");
        $sql = "SELECT * FROM signin WHERE `email`='$email'";
        $res = mysqli_query($conn,$sql);
        if ($res->num_rows!= 0){
            $res = mysqli_fetch_array($res);
            $pass = $res["password"];
            if($pass!=$password){
                echo "<script>alert('incorrect password')</script>";
                echo "<script>window.open('./index.php','_self')</script>";
            }
            else{
                $_SESSION["login"] = $email;
                echo "<script>alert('login successful')</script>";
                echo "<script>window.open('./home.php','_self')</script>";
            }
        }
        else{
            echo "<script>alert('user not found please signin')</script>";
            echo "<script>window.open('./signin.php','_self')</script>";
        }
    }
    if(isset($_POST["signin"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $phone_no = $_POST["phone_no"];

        $conn = new mysqli("localhost","root","","web basic") or die("db not connected");
        $sql= "INSERT INTO `signin`(`username`,`email`,`password`,`phone_no`) VALUES ('$username','$email','$password','$phone_no')";
        $res=mysqli_query($conn,$sql);
        if ($res){
            $_SESSION["login"] = $email;
            echo "<script>alert('signin successful')</script>";
            echo "<script>window.open('./home.php','_self')</script>";
        }
        else{
            echo "incorrect data";
        }
    }
    if(isset($_POST["update"])){
        $username = $_POST["username"];
        $email = $_SESSION["login"];
        $phone_no = $_POST["phone_no"];

        $conn = new mysqli("localhost","root","","web basic") or die("db not connected");
        $sql = "UPDATE `signin` SET `username`='$username',`phone_no`='$phone_no' WHERE `email`='$email'";
        $res = mysqli_query($conn,$sql);
        if ($res){
            echo "<script>alert('update successful')</script>";
            echo "<script>window.open('./home.php','_self')</script>";
        }
        else{
            echo "incorrect data";
        }
    }

    ?>