<?php 
require_once('bootstrap.php');
if (!$sessionHandler->isAuthExists()) {
    header('location:../userindex.php');
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

        .message {
            margin-top: 10px;
        }
        .btn{
            margin-left: 80%;
            color:blue;
        }
        .btnMessage{
            border: 1px solid black;
            border-radius: 20px;
            font-style: italic;
            background-color: lightgoldenrodyellow;
            padding: 5px;
            margin: 5px;
        }
        h3{
            font-style: bold;
            font-size: 20px;
        
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
        <div class="btnMessage"> 
             <a href="./Register/dashboard.php">USER_LISTING</a>
            <a href="./logout.php" class="btn">Logout</a>
        </div><hr>
    <div>
        <h3>WELCOME </h3>
    </div>
</body>
</html>