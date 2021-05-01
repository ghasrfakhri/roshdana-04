<?php
require 'include/init.php';

$msg = "";
if (isPostMethod()) {
    $email = $db->real_escape_string($_POST['email']);
    $password = $db->real_escape_string($_POST['password']);

    $remember = isset($_POST['remember']);

    $user = new User;
    if ($user->login($email, $password, $remember)) {
        redirectToUrl('index.php');
    } else {
        $msg = "invalid username or password";
    }

}
?>
<?= $msg ?>
<form method="post">
    <label>
        Email: <input type="email" name="email">
    </label><br>
    <label>
        Password: <input type="password" name="password">
    </label><br>
    <input type="submit" value="Login">
    <label>Remember me <input type="checkbox" name="remember" value="1"></label>
</form>
