<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dimite - Sacco System</title>
</head>
<body style="background-image: url('wepesa.png');">
    <div>
        <div>
            <h4>Welcome To Dimite Sacco</h4>
        </div>
        <?php echo "<h1>Welcome " .$_SESSION['username'] ."</h1>"; ?>
        <a href="logout.php">Logout</a>
    </div>
</body> 
</html>