<!DOCTYPE html>
<?php
	require 'connection.php';

$Naam = "";
if (isset($_GET["Naam"])) {
    $Naam = $_GET["Naam"];
}

$Aanwezig = "";
if (isset($_GET["Aanwezig"])) {
    $Aanwezig = $_GET["Aanwezig"];
}

$Tijd = "";
if (isset($_GET["Tijd"])) {
    $Tijd = $_GET["Tijd"];
}

	if (isset($_POST["inschrijven"])) {
	    $query = $con->prepare("INSERT INTO inschrijvenevenement(Naam, Aanwezig, Tijd) VALUES(?,?,?)");
	    $query->execute(array($_POST["Naam"], $_POST["Aanwezig"], $_POST["Tijd"]));
	}

	$query = $con->prepare("SELECT * FROM inschrijvenevenement");
	$query->execute();
	$inschrijvenevenement = $query->fetchAll();
	$con = NULL;
?>
<html>
    <head>
     <?php include 'head.php';?>
    </head>
    
    <body> 
        <header>
            <?php include 'header.php'; ?>
        </header>
        <div class="info">
        	<form method="post" action="inschrijf.php">
        		<h3> Inschrijven </h3>
        		<p> Bij het inschrijven vragen we wanneer je aanwezig bent en of je aanwezig bent. Gelieve dit op de voorbeeld manier invullen.</p>
        		Aanwezig: <input type="checkbox" name="Aanwezig"> </br>
        		Tijd: <input type="text" name="tijd" value="10:00-17:00">
        		<input type="submit" name="inschrijven" value="Inschrijven">
</br></br>

        		<table class="flat-table">
        			<tr>
        				<th style="width: 200px;">Naam</th>
        				<th style="width: 200px;">Aanwezig</th>
        				<th style="width: 200px;">Tijd</th>
        			</tr>
        			<?php
                foreach ($inschrijvenevenement as $namen) {
                    print("\n\t<tr>");      
                    print("\n\t\t<td>" . $namen["Naam"] . "</td>");
                    print("\n\t\t<td>" . $namen["Aanwezig"] . "</td>");
                    print("\n\t\t<td>" . $namen["Tijd"] . "</td>");
                    print("\n\t</tr>");
                }
                ?>
        		</table>
        </div>
    </body>
</html>
