<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = "Website Contact";
$message = $_POST['message'];

$mail_body = array($name, $email, $phone, $message);
$mailBody = "Name: " . $mail_body[0] ."\r\n Email: " . $mail_body[1] ."\r\n Phone: " . $mail_body[2] ."\r\n Message: " . $mail_body[3];

require '../../vendor/autoload.php';
    	$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host = "mail.containerworksafrica.co.ke";
		$mail->SMTPAuth = "true";
		$mail->SMTPSecure = "ssl";
		$mail->Port = "465";
		$mail->Username = "admin@containerworksafrica.co.ke";
		$mail->Password = "CWA.admin123#";
		$mail->Subject = $subject;
		$mail->setFrom("admin@containerworksafrica.co.ke");
		$mail->AddReplyTo($email);
		$mail->Body = $mailBody;
		$mail->addAddress("info@containerworksafrica.co.ke");
		// $mail->addBCC("hello@auxilia.io");

if ( $mail->send() ) {
	header('Location: https://containerworksafrica.co.ke/thanks/', true, 303);
	// header('Location: http://vascello:8888/thanks/', true, 303);
    exit;
}
else {
	header('Location: https://containerworksafrica.co.ke/contact/', true, 303);
	// header('Location: http://vascello:8888/contact/', true, 303);
}
$mail->smtpClose();
?>