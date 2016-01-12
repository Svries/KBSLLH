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
        	<h1 class="center"> Wachtwoord wijzigen</h1>
				<form action="reset.php" method="POST">
				<input placeholder="Emailadres" type="text" name="email" size="20" /><br />
				<input placeholder="Nieuw wachtwoord"type="password" name="password" size="20" /><br />
				<input placeholder="Bevestig wachtwoord" type="password" name="confirmpassword" size="20" /><br />
				<input type="hidden" name="q" value="<?php if (isset($_GET["q"])) {echo $_GET["q"];} ?>">
				<br>
				<input type="submit" name="ResetPasswordForm" value=" Reset Password " />
			</form>
        </div>
        
    </body>
</html>