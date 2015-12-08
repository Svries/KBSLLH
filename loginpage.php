<!DOCTYPE html>
<html>
     <?php include 'head.php';?>
    </head>
    
    <body> 
        <header>
            <?php include 'header.php'; ?>
        </header>
        <div class="info">
			<h2>Inloggen</h2>
			<form action="loginscript.php" method="post">
				<fieldset>
					<p>
						<label for="email">Username</label>
						<input type="text" id="email" name="email"/>
					</p>
					<p>
						<label for="password">Password</label>
						<input type="password" id="password" name="password" />
					</p>
					<p>
						<input type="submit" value="→ Login" />
					</p>
				</fieldset>
			</form>
        </div>
    </body>
</html>
