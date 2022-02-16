<?php
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'monclass';

$conn = mysqli_connect($server, $user, $password, $database );

if(!$conn){
    die("<script>alert('Connection failed')</script>");
}
?>