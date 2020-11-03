<?php
//username:u17074292
//password:fsuzkhcr
$server = "localhost";
$username = "u17074292";
$password = "fsuzkhcr";
$database = "dbu17074292";
//Create Connection
$conn = mysqli_connect($server, $username, $password, $database);
//Check Connection

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}
?>