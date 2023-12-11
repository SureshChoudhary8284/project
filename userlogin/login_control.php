<?php

require_once(dirname(__FILE__, 2) . '/bootstrap.php');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($username) || empty($password)) {
        $sessionHandler->setError('Username and password are required.');
        header('Location: ../userindex.php');
        exit();
    }

    // Check admin login
    if ($adminLogin->matchAdmin($username, $password)) {
        $sessionHandler->setAuthId(1); // Use a different identifier for admin
        $sessionHandler->setAuthUser($username);
        $sessionHandler->setMessage('Admin login successfully! ' . $username);
        header("Location: ../adminpage.php");
        exit(); // Exit after header
    } elseif ($userLogin->matchUser($username, $password)) {
        // User login successful
        $sessionHandler->setAuthId(2); // Use a different identifier for user
        $sessionHandler->setAuthUser($username);
        $sessionHandler->setMessage('User login successfully! Welcome, ' . $username . '. User ID: ' . $password);
        header("Location: ../Register/userdetails.php");
        exit(); // Exit after header
    } else {
        // Invalid username or password
        $sessionHandler->setError('Invalid username or password.');
        header('Location: ../userindex.php');
        exit(); // Exit after header
    }
} else {
    // Redirect for invalid request method
    $sessionHandler->setError('Invalid Request Method');
    header('Location: ../userindex.php');
    exit(); // Exit after header
}
