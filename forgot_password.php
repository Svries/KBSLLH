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
			<form action="change.php" method="POST">
				<input placeholder="Emailadres "type="text" name="email" size="20"><br><br>
				<input type="submit" name="ForgotPassword" value=" Vraag wijziging aan ">
			</form>
        </div>
    </body>
</html>