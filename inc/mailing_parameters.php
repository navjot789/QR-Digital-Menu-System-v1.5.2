<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';


$sql="SELECT * from mailing";
$dquery=$conn->query($sql);
$toogle =$dquery->fetch_array();
					
if($toogle)
{
	$mails = new PHPMailer;
	$mails->isSMTP();
	$mails->SMTPDebug = 0;//https://github.com/PHPMailer/PHPMailer/wiki/SMTP-Debugging
	$mails->Host = $toogle['host'];
	$mails->Port = 587;
	$mails->SMTPAuth = true;
	$mails->SMTPSecure = 'tls';
	$mails->SMTPOptions = array(
								'ssl' => array(
								'verify_peer' => false,
								'verify_peer_name' => false,
								'allow_self_signed' => true
								));
	$mails->Username = $toogle['user_name'];
	$mails->Password = $toogle['pass_word'];

	$mails->setFrom($toogle['setFrom']);
	$mails->addReplyTo($toogle['setFrom']);
	$mails->addAddress($toogle['addAddress']);
}



?>