<?php
$db = new mysqli('localhost', 'root', '', 'roshdana02');
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

spl_autoload_register(function ($className) {
    $classFileName = $className . ".php";
    if (is_file($classFileName)) {
        require $classFileName;
    }
});