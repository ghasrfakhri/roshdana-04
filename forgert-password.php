<?php
require 'include/init.php';
if (isPostMethod()) {
    $email = $db->real_escape_string($_POST['email']);

    $code = sha1(uniqid() . md5(time()));

    $query = "UPDATE user SET reset_password_code='$code' WHERE email='$email'";
    $db->query($query);
    echo "If you entered correct email, An email will be sent to you, Please click the provided link ";

    if ($db->affected_rows == 1) {
        $body = <<<body

Hello,
If you requested to reset you password please click on the following link.<br>
<a href="http://localhost/04/reset-password.php?code=$code">http://localhost/04/reset-password.php?code=$code</a>

body;


        sendEmail("Reset Password", $email, $body);
    }
}
?>
<form method="post">
    <label>Email:
        <input type="email" name="email">
    </label>
    <input type="submit" value="Reset Password">
</form>
