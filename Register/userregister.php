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
            height: 350px;
            border: 2px solid brown;
            border-radius: 22px;
            margin-top: 10%;
            padding: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
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
            margin-top: 21px;
            text-align: center;
        }

        h2 {
            text-align: center;
        }

        .password-toggle {
            cursor: pointer;
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
    <form id="RegisterPage" action="./Register_control.php" method="post">
        <h2>Registration page</h2>
        <div>
            <label for="user">USERNAME :</label>
            <input class="input_field" type="text" name="username" id="user" placeholder="Full Name" aria-label="Full Name">
        </div><br>

        <div>
            <label for="email">EMAILID :</label>
            <input class="input_field" type="email" name="email" id="email" placeholder="Email ID" aria-label="Email ID">
        </div><br>

        <div>
            <label for="password">PASSWORD :</label>
            <input class="input_field password-toggle" type="password" name="password" id="password" placeholder="Password" aria-label="Password">
        </div><br>

        <button class="submit_btn" type="submit" name="Registration" id="Registration" value="Registration">Registration</button>
    </form>
</body>


</html>

