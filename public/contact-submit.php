<?php

require '../vendor/autoload.php';

$name    = $_POST['fullname'];
$email   = $_POST['email'];
$message = $_POST['message'];

$subject = "Contact Message from outsidervc.com - $name";

$to      = "info@outsidervc.com";


$transport = Swift_SmtpTransport::newInstance('smtp.mailgun.org', 465, "ssl")
  ->setUsername('admin@outsidervc.com')
  ->setPassword('G2xyr9#');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance()
  ->setSubject($subject)
  ->setFrom(array($email => $name))
  ->setSender($email)
  ->setTo(array($to))
  ->setBody($message);

$mailer->send($message);

?>