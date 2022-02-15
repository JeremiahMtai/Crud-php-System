<?php
require_once 'config.php';

session_start();
error_reporting(0);
if(isset($_SESSION['username'])){
    header("Location: index.php");
}
if(isset ($_POST['Register'])){
    $user_Id=$_POST['user_Id'];
    $fmail=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $cpassword=md5($_POST['cpassword']);

    if($password == $cpassword){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0){
            $sql = "INSERT INTO users (user_Id, fname, lname, email, username, password, cpassword) 
                    VALUES ('$user_Id', '$fname', '$lname', '$email', '$password', '$cpassword')";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo "<script>alert('Wow! User Registration Completed')</script>";
                $user_Id = "";
                $fname = "";
                $lname = "";
                $email = "";
                $username = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else{
                echo "<script>alert('Please Input Full Details')</script>";
            }
            }

            } 
            else{
            echo "<script>alert('Whoops ! Email Already Exist')</script>";
        }
    }
        else{
        echo "<script>alert('Password Do Not Match')</script>";
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
        <title>Register Form - Dinite Technologies</title>
    
    </head><br>
<body>
    <div style="padding: 50px;" class="container">
        <form action="" method="POST" class="login-email" style="height: 70vh;">
            <div class="login-text"> <h2>Register</h2></div><br>
                <div class="input-group">
                        <input type="fnmae" name="fname" placeholder="First Name" value="" <?php echo $fname?> required><br><br>
                </div>
                <div class="input-group">
                        <input type="lnmae" name="lname" placeholder="Last Name" value="" <?php echo $lname?> required><br><br>
                </div>
                <div class="input-group">
                        <input type="email" name="email" placeholder="Enter Email" value="" <?php echo $email?> required><br><br>
                </div>
                <div class="input-group">
                        <input type="text" name="usernmae" placeholder="Enter Username" value="" <?php echo $username?> required><br><br>
                </div>
                <div class="input-group">
                        <input type="password" name="password" placeholder="Enter Password" value="" <?php echo $password?> required><br><br>
                </div>
                <div class="input-group">
                        <input type="password" name="cassword" placeholder="Confirm Password" value="" <?php echo $cpassword?> required><br><br>
                </div>
                <div class="input-group">
                    <button type="submit" class="btn" name="register">Register</button>
                </div>
                <div>
                    <p>Have an Account? <a href="index.php">Login Here</a></p>
                </div>
                <div class="social-icon">

                </div>-

        </form>
    </div>
</body>
</html>