<?php 
require_once('bootstrap.php');

if (!$sessionHandler->isAuthExists()) {
    header("Location:./index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        div {
            text-align: center;
            font-size: large;

        }
        .logout {

            width: 80px;
            height: 35px;
            margin: 30px;
            background-color: lightskyblue;
            border: 2px solid black;
            border-radius: 9px;
            text-align: center;
        }

        .upload {

            width: 80px;
            height: 20px;
            border: 2px solid black;
            border-radius: 9px;
            cursor: pointer;

        }
        form {
            width: 500px;
            text-align: center;
            height: 40px;
            padding: 10px;
            border: 2px solid yellow;
            border-radius: 20px;
            margin: auto;
        }

        .message {
            margin-top: 100px;
        }
        button{
            margin-left: 1%;
            padding: 0px;
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
        
    <div>
        <h3>WELCOME USER</h3>
    </div>
        <div> 
            <button type="submit" name="submit" class="logout"><a href="logout.php">Logout</a></button>
        </div>     
         <a href="./Register/userregister.php">User_Register</a>
</body>
</html>