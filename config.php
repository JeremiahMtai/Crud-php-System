<?php
$_server = "localhost";
$user = "root";
$password = "";
$database = "dimitedb";

$conn = mysqli_connect($_server, $user, $password, $database);

if(!$conn){
    die("<script>alert('connection Failed')</script>");

}
?>