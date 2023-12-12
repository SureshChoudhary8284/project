<?php
require_once(dirname(__FILE__, 2) . '/bootstrap.php');

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $editUserId = $_GET['id'];

    // Fetch the user data for the specified ID
    $jsonFilePath = '../Register/data.json';
    $jsonString = file_get_contents($jsonFilePath);
    $userData = json_decode($jsonString, true) ?? [];

    $userToUpdate = null;

    foreach ($userData as $user) {
        if ($user['id'] == $editUserId) {
            $userToUpdate = $user;
            break;
        }
    }

    // Check if the user to update is found
    if ($userToUpdate) {
        // Display a form with the existing user details for editing
        ?>
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
            text-align: center;
            color:orange;
            margin-left: 10%;
            margin-right: 10%;
            font-style: bold;
            font-size: 20px;
            background-color:lightgray;
        }

        h2 {
            text-align: center;
            color:blueviolet;
            border: 1px solid black;
            border-radius: 20px;
            margin-left:  14% ; 
            margin-right:  14% ;
            background-color: lightgoldenrodyellow;
        }
    </style>
</head>
<body>
<h2>Edit User</h2>

                <form action="updateuser.php" method="post">
                <label for="editUsername">USERNAME:</label>
                <input  class="input_field" type="text" name="editUsername" value="<?php echo $userToUpdate['username']; ?>"><br>
                <br><br>
                <label for="editEmail">EMAILID:</label>
                <input class="input_field"  type="email" name="editEmail" value="<?php echo $userToUpdate['email']; ?>"><br>
                <br><br>
                <label for="id">USERID:</label>
                <input  class="input_field" type="text" name="editUserId" value="<?php echo $userToUpdate['id']; ?>">
                <br><br>
                <button class="submit_btn " type="submit" name="submit">UPDATE</button>
            </form>
        </body>
        </html>
        <?php
        exit;
    }
}
// Redirect back to userregister.php if user ID is not provided or not found
header('Location: ./userregister.php');
exit;
?>
