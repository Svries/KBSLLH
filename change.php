<!DOCTYPE html>
<html>
    <head>
    	<?php include 'head.php'; ?>
    </head>
    <body>
		<header>
			<?php include 'header.php'; ?>
		</header>
        <div class="info">
        <h1 class="center">Wachtwoord vergeten</h1>
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
						$mailbody = "Geachte gebruiker,\n\nAls deze mail niet van toepassing is op u negeer hem dan, dank u. Het lijkt erop dat u een wachtwoordwijziging heeft aangevraagd voor de site www.levendehistorieharewijk.nl\n\n Klik op de volgnede link om u wachtwoord te resetten.  Lukt het niet om op de link te klikken, kopieer hem dan in u brwoser's URL balk.\n\n" . $pwrurl . "\n\nDank u wel,\nHet LHH Team";
						mail($userExists["email"], "www.levendehistoriehardewijk.nl- Password Reset", $mailbody, "From: cees@lhh.nl");
						echo "<h3 class=\"center\">Er is een wachtwoord resetcode naar ". $userExists["email"] . " gestuurd.</h3>";
						
					}
					else
						echo "<h3 class=\"center\">Het emailadres is niet bekend bij ons.</h3>";
				}
			?>
        </div>
    </body>
</html>