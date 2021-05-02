<?php
require 'include/init.php';

$transport = (new Swift_SmtpTransport('mail.roshdana.i-gh.ir', 587))
    ->setUsername('info@roshdana.i-gh.ir')
    ->setPassword('@91@I1bos_R2');

$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message('Salam'))
    ->setFrom(['info@roshdana.i-gh.ir' => 'Roshdana PHP'])
    ->setTo(['ghasrfakhri@gmail.com' => 'Iman Gh', 'imangh_ir@yahoo.com'])
    ->setBody('Salam <b>Iman</b>')
    ->setContentType('text/html')
;

$i = $mailer->send($message);
var_dump($i);