<?php
require('bootstrap.php');
if($sessionHandler->isAuthExists()) {
    header("Location:dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
        * {
            max-width: 400px;
            margin: auto;

        }

        form {
            width: 500px;
            text-align: center;
            height: 300px;
            border: 2px solid grey;
            border-radius: 22px;
        }

        .input_field {
            margin-top: 20px;
            padding-left: 20px;
            border-radius: 12px;
            width: 200px;
            height: 30px;
            color: red;
        }

        .submit_btn {
            width: 80px;
            height: 35px;
            background-color:azure;
            color: black;
            border: 2px solid black;
            border-radius: 20px;

        }

        .message {
            margin-top: 100px;
        }
        h2{
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="message">
        <?php
        if($sessionHandler->hasError()){
            echo $sessionHandler->getError();
            $sessionHandler->removeError();
        }

        if($sessionHandler->hasMessage()){
            echo $sessionHandler->getMessage();
            $sessionHandler->removeMessage();
        }
        ?>
    </div>
    <form id="loginPage" action="./userlogin/login_control.php" method="post">
        <h2>Login Page</h2>
        <div>ADMINNAME :
            <input class="input_field" type="text" name="username" id="user" placeholder="username" >
        </div><br><br>
        <div>PASSWORD :
            <input class="input_field" type="password" name="password" id="password" placeholder="Password" >

        </div><br><br>
        <div>
            <button class="submit_btn" type="submit" name="Login" id="login" value="Login">LOGIN</button>
        </div>
    </form>
</body>

</html>