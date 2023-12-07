<?php
require_once(dirname(__FILE__, 2) . '/bootstrap.php');

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $userId = $_GET["id"];
  
    // Load existing user data
    $jsonFilePath = '/opt/lampp/htdocs/suresh/project/Register/data.json';
    $jsonString = file_get_contents($jsonFilePath);
    $userData = json_decode($jsonString, true) ?? [];

    // Find and remove the user with the specified ID
    $updatedUserData = array_filter($userData, function ($user) use ($userId) {
        return $user["id"] != $userId;
    });

    // Save the updated user data back to the file
    file_put_contents($jsonFilePath, json_encode(array_values($updatedUserData)));

    // session success message
    $sessionHandler->setError('<center>User with ID $userId deleted successfully.</center>');
    header("Location:./dashboard.php");
    exit();
} else {
    // session if the request method is not GET or if the ID is not set
    $sessionHandler->setError('<center>Invalid userid removed.</center>');
    header("Location:./dashboard.php");
exit();
}

?>
