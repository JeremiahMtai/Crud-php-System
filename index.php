<?php
include 'config.php';
session_start();
error_reporting(0);
if(isset($_SESSION['username'])){
    header("Location: welcome.php");
}
if(isset ($_POST['submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows>0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: welcome.php");
    } else{
        echo "<script>alert('Whoops ! Email or Password is Wrong.'</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
    <!--Head Section-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- css stylng -->
    <link rel="stylesheet" href="style.css">

    <!-- Title -->
    <title>Login Form - Dinite Technologies</title>
    
</head><br>
<body>
    <div style="padding: 50px;" class="container">
        <form action="" method="POST" class="login-email">
           <div class="login-text"> <h2>Login</h2></div><br>
           <div class="input-group">
                <input type="email" name="email" placeholder="Enter Email" value="" <?php echo $_POST['email']?> required><br><br>
           </div>
           <div class="input-group">
                <input type="password" name="password" placeholder="Enter Password" value="" <?php echo $_POST['password']?> required>><br><br>
           </div>
           <div class="input-group">
               <button type="submit" class="btn" name="Login">Login</button>
           </div><br>
           <div>
               <p>Don't Have an Account? <a href="register.php">Register Here</a></p>
           </div>
           <div class="social-icon">

           </div>

        </form>
    </div>
    
</body>
</html>