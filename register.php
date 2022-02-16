
<?php
include('config.php');
session_start();
error_reporting(0);
if(isset($_SESSION['username'])){
    header('Location: index.php');
}
if(isset($_POST['Register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $conf_pass = md5($_POST['cpassword']);

    if($password == $conf_pass){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if(!$result ->num_rows > 0){
            $sql = "INSERT INTO users(fname, lname, username, email, password)
                    VALUES('$fname', '$lname', '$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script>alert('Wow! User Registration Complete.')</script>";
                $fname = "";
                $lname = "";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            }else{
                echo "<script>alert('Whoops! Something went wrong, Please try again.')</script>";
            }
        }else{
            echo "<script>alert('Whoops! Email Already exists.')</script>";
        }
    }else{
        echo "<script>alert('Passwords not Matched.')</script>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup Form</title>

        <!-- style.css
        <link rel="stylesheet" href="style.css">-->

        <!--Bootstrap Link-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Popins', sans-serif;
            }
            body{
                width: 100%;
                min-height: 100vh;
                background-image: url("img/sacco.jpg");
                background-position: center;
                background-size: cover;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .container{
                width: 400px;
                height: 95vh;
                background: #fff;
                border-radius: 5px;
                box-shadow: 0 0 5px rgba(0,0,0,.3);
                padding: 40px;
                background-image: url("img/sacco.jpg");
            }
            .container .login-text{
                color: black;
                font-weight: 500px;
                font-size: 1.1rem;
                text-align: center;
                margin-bottom: 2px;
                display: block;
                text-transform: capitalize;
            }
            .container .login-social{
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(50%, 1fr));
                margin-bottom: 25px;
            }
            .container .login-email .input-group{
                width: 100%;
                height: 50px;
                margin-bottom: 5px;
            }
            .container .login-email .input-group input{
                width: 100%;
                height: 100%;
                border: 2px solid #e7e7e7;
                padding: 15px 20px;
                font-size: 1rem;
                border-radius: 30px;
                background: transparent;
                outline: none;
                transition: .3s;
                color: white;
            }
            .container .login-email .input-group input:focus, .container .input-group input:valid{
                border-color: #a29bfa;
            }
            .container .login-email .input-group .btn{
                display: block;
                width: 100%;
                padding: 15px;
                text-align: center;
                border: none;
                background: goldenrod;
                outline: none;
                border-radius: 30px;
                font-size: 1.2rem;
                color: #fff;
                cursor: pointer;
                transition: .3s;
            }
            .container .login-email .input-group .btn:hover{
                color: brown;
                text-transform: uppercase;
                transition: all ease 0.2s;
                background-color: green;
            }
            .register-login-text a{
                background: goldenrod;
                color: blueviolet;
            }
            .register-login-text a:hover{
                color: brown;
                text-transform: uppercase;
            }

            
        </style>
    </head>
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
                        <input type="text" name="username" placeholder="Enter Username" value="" <?php echo $username?> required><br><br>
                </div>
                <div class="input-group">
                        <input type="password" name="password" placeholder="Enter Password" value="" <?php echo $password?> required><br><br>
                </div>
                <div class="input-group">
                        <input type="password" name="cpassword" placeholder="Confirm Password" value="" <?php echo $cpassword?> required><br><br>
                </div>
                <div class="input-group">
                    <button type="submit" class="btn" name="Register">Register</button>
                </div><br>
                <div>
                    <p class="register-login-text">Have an Account? <a href="index.php">Login Here</a></p>
                </div>
                <div class="social-icon">

                </div>-

        </form>
    </div>
</body>
</html>