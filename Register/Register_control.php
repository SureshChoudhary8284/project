<?php
require_once(dirname(__FILE__, 2) . '/bootstrap.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission to add a new user

        $username = $_POST['username'];
        $email = $_POST['email'];
        $id = $_POST['id'];

    // Basic form validation
    if (empty($username) || empty($email) || empty($id)) {
        // Set error message in session
        $sessionHandler->setError("All fields are required.");
        // Redirect back to the registration page
        header('Location:./userregister.php');
        exit;
    } 
   
    if($Register->getAllUsers()){
        $sessionHandler->setMessage('Successfully registered');
        header("Location:./userlist.php");

        exit();
    }    
}
?>
