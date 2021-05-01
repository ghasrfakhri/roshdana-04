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
    $classFileName = __DIR__ . '/' . $className . ".php";
    if (is_file($classFileName)) {
        require $classFileName;
    }
});

ob_start();

$content = "";
$user = new User();
$path = '/04';
$showTemplate = true;


register_shutdown_function(function () {
    global $content, $user, $path, $showTemplate;

    if ($showTemplate == true) {
        $content = ob_get_clean();
        include __DIR__ . '/../template/template.php';
    }

});

