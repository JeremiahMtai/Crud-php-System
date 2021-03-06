<?php

include('config.php');
session_start();
error_reporting(0);
if(isset($_SESSION['username'])){
    header('Location: welcome.php');
}
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header('Location: welcome.php');
    }else{
        echo "<script>alert('Whoops! Email or Password is wrong')</script>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>

        <!--Bootstrap Link-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Popins', sans-serif;
            }
            body{
                width: 100%;
                min-height: 100vh;
                background-image: url("Sacco.jpg"), linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5));
                background-position: center;
                background-size: cover;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .container{
                width: 400px;
                height: 70vh;
                background: #fff;
                border-radius: 5px;
                background-image: url("img/sacco.jpg");
                padding: 40px 30px;
            }
            .container .login-text{
                color: #111;
                font-weight: 500px;
                font-size: 1.1rem;
                text-align: center;
                margin-bottom: 25px;
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
                margin-bottom: 25px;
                color: white;
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
                padding: 15px 20px;
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
            .login-register-text a{
                background: goldenrod;
                color: blueviolet;
            }
            .login-register-text a:hover{
                color: white;
                background: green;
                text-transform: uppercase;
            }

            
        </style>
    </head>
    <body>
        <div class="container">
            <form action="" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800">Login</p>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" value="<?php echo $email;?>" required>
                </div>
                
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" value="<?php echo $_POST['pass'];?>" required>
                </div>

                <div class="input-group">
                    <button name="submit" class="btn">Login</button>
                </div>
                <p class="login-register-text">Don't have an Account?<a href="register.php">Register Here</a>.</p>
                
            </form>
            
        </div>
    </body>
</html>