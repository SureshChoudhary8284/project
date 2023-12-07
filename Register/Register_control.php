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
        $sessionHandler->setError("<b>All fields are required.</b>");
        // Redirect back to the registration page
        header('Location:./userregister.php');
        exit;
    } 
    if($Register->exist($id)){
        $sessionHandler->setError("<b>user details .$id. alread exist.</b>");
        // Redirect back to the registration page
        header('Location:./userregister.php');
        exit;
    }
    if($Register->getAllUsers()){
        $sessionHandler->setMessage( '<center><b> Successfully registered </b></center>');
        header("Location:./dashboard.php");
        exit();
    }    
}
?>
