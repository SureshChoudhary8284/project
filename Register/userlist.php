<?php
require_once(dirname(__FILE__, 2) . '/bootstrap.php');

// Check and display messages

if ($sessionHandler->hasMessage()) {
    echo $sessionHandler->getMessage() . "<br>";
    $sessionHandler->removeMessage();
} else {
    echo "No message available.<br>";
}
// Check and display user information
if (isset($_SESSION['userObject'])) {
    $user = $_SESSION['userObject'];   
        echo $user->usernameExits();
        echo $user->checkFilevalue();
        echo $user->insertUser();
}
?>
<br>
<a href="./userregister.php">Home</a>
