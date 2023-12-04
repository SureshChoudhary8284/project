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
    $register = $_SESSION['userObject'];   
        echo $register->usernameExits();
        echo $register->checkFilevalue();
        echo $register->insertUser();
}
?>
<br>
<a href="./userregister.php">Home</a>
