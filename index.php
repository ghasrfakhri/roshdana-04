<?php
require_once 'include/init.php';

$x = new Xyz;

$user = new User();
if (!$user->isLogin()) {
    redirectToUrl('login.php');
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Hello <?= $user->isLogin() ? $user->getLoginUser()['firstname'] : 'User'; ?></h1>
<a href="logout.php">Logout</a>
</body>
</html>
