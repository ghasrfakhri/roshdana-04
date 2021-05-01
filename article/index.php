<?php
require_once '../include/init.php';

if (!$user->isLogin()) {
    redirectToUrl('../login.php');
}
?>
<H1>Articles</H1>


