<?php
require 'include/init.php';

$user = new User();
$user->logout();
$showTemplate = false;
redirectToUrl('login.php');
?>
<!--<meta http-equiv="refresh" content="2; url=login.php">-->