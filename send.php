<?php
	include_once 're.php';
	require_once('recaptchalib.php');
	$privatekey = "6LeQW-4SAAAAADY-v-NfaEdCk_edRZ--sOmJxn99 ";
	$resp = recaptcha_check_answer ($privatekey,
			$_SERVER["REMOTE_ADDR"],
			$_POST["recaptcha_challenge_field"],
			$_POST["recaptcha_response_field"]);
	if (!$resp->is_valid) {
		// What happens when the CAPTCHA was entered incorrectly
		die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
				"(reCAPTCHA said: " . $resp->error . ")");
	} else {
		// Your code here to handle a successful verification
		$to      = 'pawel.woloszyn1308@gmail.com';
		$subject = 'Portfolio - Kontakt';
		$message = $_POST['message'];
		$headers = 'From: ' . $_POST['mail'] . "\r\n" .
		    'Reply-To: ' . $_POST['mail'] . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		
		mail($to, $subject, $message, $headers);
	}
	header('Location: index.php#contact')
?>
