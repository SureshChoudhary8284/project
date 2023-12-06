<?php
    session_start();
      require_once(dirname(__FILE__, 2) . '/bootstrap.php');
      if ($sessionHandler->hasMessage()) {
          echo $sessionHandler->getMessage();
          $sessionHandler->removeMessage();
      } else {
        echo "No message available.<br>";
    }
?>


<a href="./userregister.php">Home</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Listing</title>
    <style>
        #table {
            text-align: justify;
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

        .Action {
            word-spacing: 12px;
           
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
    <h2>User Listing Table</h2>
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
            // Fetch existing user data from the file
            $jsonFilePath = '/opt/lampp/htdocs/suresh/project/Register/data.json';
            $jsonString = file_get_contents($jsonFilePath);
            $userData = json_decode($jsonString, true) ?? [];
            // Change the loop to properly display user data
            if ($userData) {
                $row = 1;
                foreach ($userData as $user) {
                    echo '<tr>';
                    echo '<td>' . $row . '</td>';
                    echo '<td>' . $user['username'] . '</td>';
                    echo '<td>' . $user['email'] . '</td>';
                    echo '<td>' . $user['id'] . '</td>'; 
                    ?>
                    <td class="Action">
                        <a class="Edit" href="updatedata.php?id=<?php echo $row; ?>">Active</a>
                        <a class="Delete" href="userremove.php?id=<?php echo $row; ?>">Delete</a>
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