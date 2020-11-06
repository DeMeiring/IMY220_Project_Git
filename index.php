<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="DeVilliers Meiring">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="282828">
    <title>a thousand words</title>
    <link rel="stylesheet" href="styles/LoginArt.css">
    <link rel="stylesheet" href="styles/generalStyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="icon" href="Images/1000.png">
</head>
<body>
    <div class="fluid-container" id="largeFrame">
        <div class="row">
            <div id="bigArtContainer" class="col-6 col-md-5 offset-sm-1">
                <div class="artContainer row">
                    <div class="col loginContainer" id="Login">
                        <label><i class="fa fa-camera-retro"></i>Login:</label>
                        <div class="row" id="formLogin">
                            <form action="index.php" class="col-12" method="post">
                                <label class="col-12">Email</label><br>
                                <input class="col-12" type="text" id="emailIn" name="email" placeholder="johnDoe@gmail.com"><br>
                                <label class="col-12">Password</label><br>
                                <input class="col-12" type="password" id="pswIn" name="password" placeholder="strongPass123"><br>
                                <input class="btn col-12" style="color: rgba(245,245,245,0.9);font-weight: bold" type="submit" name="lSubmit" id="loginSubmit" value="Log in">
                            </form>
                        </div>
                        <div class="errorContainer">

                        </div>
                    </div>

                    <div class="col registerContainer" id="Register">
                        <label><i class="fa fa-camera-retro"></i>Register:</label>
                        <div class="row" id="formRegister">
                            <form id="frmControl" class="col-12" action="index.php" method="post">
                                <label class="col-sm-12">Email:</label><br/>
                                <input class="col-sm-12" type="email" name="regEmail" placeholder="DaneJoe@gmail.com"><br/>
                                <label class="col-sm-12">Password:</label><br/>
                                <input class="col-sm-12" type="password" name="regPassword" placeholder="strongPass123"><br/>
                                <label class="col-sm-12">Confirm Password:</label><br/>
                                <input class="col-sm-12" type="password" name="regConfirmPassword" placeholder="strongPass123">
                                <input class="btn col-sm-12" style="color: rgba(245,245,245,0.9);font-weight: bold" type="submit" name="rSubmit" id="registerSubmit" value="Register">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-5" id="textAnimateContainer">
                <p class="textAnimate">a</p><br/>
                <p class="textAnimate" id="thousand">thousand</p><br/>
                <p class="textAnimate">words</p>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST["rSubmit"])){
        $email = $_POST["regEmail"];
        $pass = $_POST["regPassword"];
        $confPass = $_POST["regConfirmPassword"];
        $query = "INSERT INTO tbusers (email, password, username) VALUES ('$email','$pass','$email');";
        global $conn;
        include ('myConnect.php');
        $res = mysqli_query($conn, $query) == TRUE;
    }
    if(isset($_POST["lSubmit"])){
        $email=$_POST["email"];
        $password = $_POST["password"];
        $query= "SELECT * from tbusers where email='".$email."' and password='".$password."';";
        global $conn;
        include ('myConnect.php');
        $res = mysqli_query($conn, $query);
        if(mysqli_num_rows($res)!==0){
            setcookie("email",$email,time()+(86400*30));
            header("Location: home.php");
        }else{
            echo"<script src='scripts/errorScript.js'></script>";
        }
    }
?>