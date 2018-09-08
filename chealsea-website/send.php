<?php

$firstname = 	$_POST['firstname'];
$lastname = 	$_POST['lastname'];
$email = 		$_POST['email'];
$message = 		$_POST['message'];

$to      = 'chelseaglenn30@gmail.com';
$subject = 'DO NOT REPLY -- '.$firstname.' '.$lastname.' - New Website Inquiry';
$headers = 'From: webmaster@chelseaglenn.com' . "\r\n" .
    'Reply-To: webmaster@chelseaglenn.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
$body = $message."\r\n\r\n".$firstname." ".$lastname."\r\n".$email."\r\n";

mail($to, $subject, $body, $headers);
?>