<?php
$db = new mysqli('localhost', 'root', '', 'roshdana02');
session_start();

require __DIR__ . '/../vendor/autoload.php';

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

function sendEmail($subject, $to, $body)
{
    $transport = (new Swift_SmtpTransport('mail.roshdana.i-gh.ir', 587))
        ->setUsername('info@roshdana.i-gh.ir')
        ->setPassword('@91@I1bos_R2');

    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message($subject))
        ->setFrom(['info@roshdana.i-gh.ir' => 'Roshdana PHP'])
        ->setTo([$to])
        ->setBody($body)
        ->setContentType('text/html');

    $i = $mailer->send($message);
}