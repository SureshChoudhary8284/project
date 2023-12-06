<?php
require_once(dirname(__FILE__, 2) . '/bootstrap.php');

    // Handle user removal based on ID

    $userIdToRemove = $_GET['id'];

    // Fetch existing user data from the file
    $jsonFilePath = '/opt/lampp/htdocs/suresh/project/Register/data.json';
    $jsonString = file_get_contents($jsonFilePath);
    $userData = json_decode($jsonString, true) ?? [];

    // Find the index of the user with the provided ID
    $userIndex = findUserIndexById($userData, $userIdToRemove);

    if ($userIndex == false) {
        // Remove the user from the array
        unset($userData[$userIndex]);

        // Reindex the array to ensure consecutive numeric keys
        $userData = array_values($userData);

        // Write the updated data back to the JSON file
        file_put_contents($jsonFilePath, json_encode($userData, JSON_PRETTY_PRINT));

        // Set a success message in the session
        $sessionHandler->setMessage('User Id remove Successfully');
    } else {
        // Set an error message in the session
        $sessionHandler->setMessage('User not found or unable to remove');
    }

    // Redirect to the user listing page after setting the session message
    header("Location:./userlist.php");
    exit();


// Function to find the index of a user by ID
function findUserIndexById($userData, $userId)
{
    foreach ($userData as $index => $user) {
        if ($user['id'] == $userId) {
            return $index;
        }
    }
    return false;
}
?>

