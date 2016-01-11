<?php
include 'connection.php';
// Was the form submitted?
if (isset($_POST["ForgotPassword"])) {
	
	// Harvest submitted e-mail address
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST["email"];
		
	}else{
		echo "email is not valid";
		exit;
	}

	// Check to see if a user exists with this e-mail
	$query = $con->prepare('SELECT email FROM gebruiker WHERE email = :email');
	$query->bindParam(':email', $email);
	$query->execute();
	$userExists = $query->fetch(PDO::FETCH_ASSOC);
	$con = null;
	
	if ($userExists["email"])
	{
		// Create a unique salt. This will never leave PHP unencrypted.
		$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

		// Create the unique user password reset key
		$passwordkey = hash('sha1', $salt.$userExists["email"]);

		// Create a url which we will direct them to reset their password
		$pwrurl = "localhost/kbsllh/reset_password.php?q=".$passwordkey;
		
		// Mail them their key
		$mailbody = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website www.yoursitehere.com\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administration";
		mail($userExists["email"], "www.yoursitehere.com - Password Reset", $mailbody, "From: frank@frank.com");
		echo "Your password recovery key has been sent to your e-mail address.";
		
	}
	else
		echo "No user with that e-mail address exists.";
}
?>