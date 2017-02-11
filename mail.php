<?php
	$_email = "Welcome.To@rehlander.com";
	$to = 'srehlander@highresbio.com';
	$subject = 'Welcome to Rehlander.com!';
	$message = 'Thank you for joining Rehlander.com!';
	$email = $_email;
	$headers = 'From: ' . $email . "\r\n" .
				'Reply-To: ' . $email . "\r\n" .
			  'X-Mailer: PHP/' . phpversion();
	 
	mail ($to, $subject, $message, $headers);
	header("Location: index.php");
?>