<?php

require '../vendor/autoload.php';

$name    = $_POST['fullname'];
$email   = $_POST['email'];
$message = $_POST['message'];

$subject = "Contact Message from outsidervc.com - $name";

$to      = "info@outsidervc.com";


$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('cory@outsidervc.com')
  ->setPassword('Coryray12');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance()
  ->setSubject($subject)
  ->setFrom(array($email => $name))
  ->setSender($email)
  ->setTo(array($to))
  ->setBody($message);

$mailer->send($message);

?>