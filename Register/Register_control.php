<?php
require_once(dirname(__FILE__, 2) . '/bootstrap.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
 
    //Basic form validation
    if(!$register->checkFilevalue()){
        $sessionHandler->setError("All fields are required.");
        header('Location:./userregister.php');
        exit;
    } 

    if(!$register->insertUser()){
        $sessionHandler->setError("Please try again.");
        header('Location:./userregister.php');
        exit;
    }

    if(!$register->usernameExits()){
        $sessionHandler->setError("username already exist please different name");
        header('Location:./userregister.php');
        exit;
    }

    $sessionHandler->setAuthUser($username);
    $sessionHandler->setMessage('Successfully registered');
    header("Location:./userlist.php");
    exit();
}
?>

