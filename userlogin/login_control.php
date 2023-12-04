<?php

require_once(dirname(__FILE__,2).'/bootstrap.php');
// echo "test";
if($_SERVER["REQUEST_METHOD"] !== 'POST'){
    header('location:../userindex.php');
}

$username = trim($_POST['username']);
$password = trim($_POST['password']);

if(empty($username)){
    $sessionHandler->setError('Enter Your Name');
    header('location:../userindex.php');
    exit();
}
if(empty($password)){
    $sessionHandler->setError('Enter Your Password');
    header('location:../userindex.php');
    exit();
}
if(!$checker->match($username,$password)){
    $sessionHandler->setError('Invalid UserName And Password');
    header('location:../userindex.php');
    exit();
}

$sessionHandler->setAuthId(1);
$sessionHandler->setAuthUser($username);
$sessionHandler->setMessage('success');
header("Location:../dashboard.php");
exit();
?>