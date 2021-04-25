<?php
require 'include/init.php';

$user = new User();
$user->logout();
redirectToUrl('login.php');