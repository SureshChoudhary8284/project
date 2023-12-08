<?php
session_start();

require_once(dirname(__FILE__) . '/Classes/Adminlogin.php');
require_once(dirname(__FILE__) . '/Classes/sessionMenage.php');
require_once(dirname(__FILE__) . '/Classes/Userclass.php');

// Replace these with actual values or retrieve them from a form submission

$userUsername = ''; // Define or retrieve the user username
$userid = ''; // Define or retrieve the user ID

$username = ''; // Define or retrieve the username
$email = ''; // Define or retrieve the email
$id = ''; // Define or retrieve the user ID

$adminLogin = new AdminLogin('admin', '1234');
$userLogin = new UserLogin($userUsername, $userid);
$sessionHandler = new SessionManager();
$Register = new RegisterUser($username, $email, $id);
?>
