<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
        * {
            max-width: 400px;
            margin: auto;
        }

        form {
            width: 80%;
            text-align: center;
            height: 400px;
            border: 2px solid brown;
            border-radius: 22px;
            margin-top: 10%;
            padding: 20px;
        }


        .input_field {
            margin-top: 10px;
            padding: 5px 10px;
            border-radius: 12px;
            width: 80%;
            height: 30px;
        }

        .submit_btn {
            width: 90px;
            height: 40px;
            background-color: azure;
            color: black;
            border: 2px solid black;
            border-radius: 18px;
            margin-top: 20px;
        }

        .message {
            margin-top: 20px;
            text-align: center;
           color:orange;
        }

        h2 {
            text-align: center;
            color: greenyellow;
        }

        
    </style>
</head>

<body>
    <div class="message">
        <?php
        require_once(dirname(__FILE__, 2) . '/bootstrap.php');
        if ($sessionHandler->hasError()) {
            echo $sessionHandler->getError();
            $sessionHandler->removeError();
        }
        ?>
    </div>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="POST" action="./Register_control.php">
        <label   for="username">USERNAME:</label>
        <input class="input_field" type="text" name="username" >
        <br><br><br>
        <label for="email">EMAILID:</label>
        <input class="input_field"  type="email" name="email" >
        <br><br><br>
        <label for="id">USERID:</label>
        <input class="input_field"  type="text" name="id" >
        <br><br><br>
        <button class="submit_btn " type="submit" name="submit">Register</button>
    </form>
</body>
</html>

