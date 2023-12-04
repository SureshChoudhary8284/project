<?php
require('bootstrap.php');
$sessionHandler->removeAuthId();
$sessionHandler->removeAuthUser();
session_destroy();
header('location:./userindex.php');
exit();
?>