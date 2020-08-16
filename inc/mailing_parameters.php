<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';


$mails = new PHPMailer;
$mails->isSMTP();
$mail->SMTPDebug = 0;//https://github.com/PHPMailer/PHPMailer/wiki/SMTP-Debugging
$mails->Host = 'denieuwehoreca.nl';
$mails->Port = 587;
$mails->SMTPAuth = true;
$mails->SMTPSecure = 'tls';
$mails->SMTPOptions = array(
							'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
							));
$mails->Username = 'billy@denieuwehoreca.nl';
$mails->Password = 'cSnn5#54';

$mails->setFrom('billy@denieuwehoreca.nl');
$mails->addReplyTo('billy@denieuwehoreca.nl');
$mails->addAddress('web.dev.nav@gmail.com');

?>