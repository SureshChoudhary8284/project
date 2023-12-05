<?php
require_once(dirname(__FILE__, 2) . '/bootstrap.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Trim input values
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
 
    // Basic form validation
    if (empty($username) || empty($email) || empty($password)) {
        // Set error message in session
        $sessionHandler->setError("All fields are required.");

        // Redirect back to the registration page
        header('Location:./userregister.php');
        exit;
    } 
    
    // Set session variables
    $_SESSION['username'] = $username;
    $sessionHandler->setAuthUser($username);

    // Set success message
    $sessionHandler->setMessage('Successfully registered');

    // Redirect to the user list page
    header("Location:./userlist.php");
    exit();
}
?>
