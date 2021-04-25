<?php
$db = new mysqli('localhost', 'root', '','roshdana02');
session_start();
function redirectToUrl($url)
{
    header("Location: $url");
    exit();
}

function isPostMethod()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

require 'user.php';