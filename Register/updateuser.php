<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Listing</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Include a separate CSS file for styles -->
    <style>
        #table {
            text-align: justify;
        
        }
        .btnMessage{
            border: 1px solid black;
            border-radius: 20px;
            font-style: italic;
            background-color: lightgoldenrodyellow;
            padding: 5px;
            margin: 5px;
        }
        .btnlink{
            color: blue;
        }

        thead {
            background-color: lightgrey;
            color: lightseagreen;
        }

        tr {
            text-align: center;
        }

        th, td {
            background-color: lightgreen;
            border: 1px solid black;
            font-weight: 800;
            padding: 8px;
        }
        .btn{
            margin-left: 90%;
            color:blue;
        }

        .Action {
            word-spacing: 12px;
        
        }
        .sessionMessage{
            text-align: center;
            color: #F94C09;
            margin-left: 35%;
            margin-right: 35%;
            font-style: bold;
            font-size: 20px;
            background-color: lightgrey;
    
        }
        .Edit{
            color: orange;
            border: 1px solid black;
            background-color: #F94C09;
            font-weight: bold;
            border-radius: 15px;
            font-size: 15px;
            

        }

        .Delete {
            color: black;
            background-color: #F94C10;
            border: 1px solid black;
            font-weight: bold;
            border-radius: 15px;
            font-size: 15px;
            width: 40px;
            text-decoration-line: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="btnMessage"> 
        <a href="./userregister.php" class="btnlink">Home</a>
        <a href="../logout.php" class="btn">Logout</a>
    </div>
    <div class="sessionMessage">
        <?php
        require_once(dirname(__FILE__, 2) . '/bootstrap.php');
        if ($sessionHandler->hasError()) {
            echo $sessionHandler->getError();
            $sessionHandler->removeError();
        }

        if ($sessionHandler->hasMessage()) {
            echo $sessionHandler->getMessage();
            $sessionHandler->removeMessage();
        }
        ?>
    </div>

    <h2>User Listing Table</h2>
    <a href="./dashboard.php">REGISTRATION</a>
    <table id="table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>S.NO.</th>
                <th>USERNAME</th>
                <th>EMAILID</th>
                <th>USERID</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once(dirname(__FILE__, 2) . '/bootstrap.php');
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editUserId'])) {
                // Handle form submission to update user data
                $editUserId = $_POST['editUserId'];
                $editUsername = $_POST['editUsername'];
                $editEmail = $_POST['editEmail'];
                // Fetch the existing user data
                $jsonFilePath = '/opt/lampp/htdocs/suresh/project/Register/data.json';
                $jsonString = file_get_contents($jsonFilePath);
                $userData = json_decode($jsonString, true) ?? [];
                // Find and update the user data
                foreach ($userData as &$user) {
                    if ($user['id'] == $editUserId) {
                        $user['username'] = $editUsername;
                        $user['email'] = $editEmail;
                        break;
                    }   
                }
                // Write the updated data back to the JSON file
                file_put_contents($jsonFilePath, json_encode($userData, JSON_PRETTY_PRINT));

                $row = 1; // Initialize $row outside the loop
                if($user) {
                    echo '<tr>';
                    echo '<td>' . $row . '</td>';
                    echo '<td>' . $user['username'] . '</td>';
                    echo '<td>' . $user['email'] . '</td>';
                    echo '<td>' . $user['id'] . '</td>';
                    ?>
                    <td class="Action">
                        <a class="Edit" href="edituser.php?action=edit&id=<?php echo $user['id']; ?>">Edit</a>
                        <a class="Delete" href="userremove.php?id=<?php echo $user['id']; ?>">Delete</a>
                    </td>
                    <?php
                    echo '</tr>';
                    $row++;
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>
