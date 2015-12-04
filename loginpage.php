<html>
    <head>
    	<?php include 'head.php'; ?>
    </head>
    <body>
		<header>
			<?php include 'header.php'; ?>
		</header>	
		<div class="info">
			<form method="post"action="login.php">
				<input type="text" name="email" placeholder="gebruikersnaam"><br>
				<input type="password" name="wachtwoord"><br>
				<input type="submit" name="inloggen" value="Inloggen">
			</form>
			<a href="spelersoverzicht.php"> Spelersoverzicht </a>
		</div>
</body>
</html>