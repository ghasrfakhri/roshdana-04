<?php
require 'include/init.php';

$code = $db->real_escape_string($_GET['code']);

if (isPostMethod()) {
    $password = $_POST['password'];
    $rPassword = $_POST['r_password'];

    if ($password == $rPassword) {
        $user->resetPassword($code, $password);
        echo "Password has been reset";
        exit;
    } else {
        echo "Password and the repeat are not equal";
    }
}


$query = "SELECT COUNT(*) FROM user WHERE reset_password_code='$code'";
$result = $db->query($query);
if (false == $result) {
    echo $db->error;
}
list($c) = $result->fetch_row();

if ($c == 1) {
    ?>
    <form method="post">
        <label>
            Password: <input type="password" name="password">
        </label><br>
        <label>
            Repeat Password: <input type="password" name="r_password">
        </label><br>
        <input type="submit" value="Reset Password">
    </form>


    <?php
} else {
    echo "Invalid Code";
}