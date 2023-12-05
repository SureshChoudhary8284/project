<?php
session_start();
require_once(dirname(__FILE__).'/Classes/Adminlogin.php');
require_once(dirname(__FILE__).'/Classes/sessionMenage.php');
require_once(dirname(__FILE__).'/Classes/Userclass.php');

// Replace these with actual values or retrieve them from a form submission
$checker = new Adminlogin('admin', '1234');
$sessionHandler = new SessionManager();
$user = new RegisterUser('JohnDoe', 'john@example.com', 'password123');
?>
