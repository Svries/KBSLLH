<?php
	require 'connection.php';

$melding = "";
$naam = "";
if (isset($_GET["naam"])) {
    $naam = $_GET["naam"];
}

$achternaam = "";
if (isset($_GET["achternaam"])) {
    $achternaam = $_GET["achternaam"];
}

$spelersnaam = "";
if (isset($_GET["spelersnaam"])) {
    $spelersnaam = $_GET["spelersnaam"];
}

$email = "";
if (isset($_GET["email"])) {
    $email = $_GET["email"];
}
	if (isset($_POST["toevoegen"])) {
	    // op toevoegen geklikt, nummer bestaat en nummer is niet leeg
	    $query = $con->prepare("INSERT INTO gebruiker(naam, achternaam, spelersnaam, email) VALUES(?,?,?,?)");
	    $query->execute(array($_POST["naam"], $_POST["achternaam"], $_POST["spelersnaam"], $_POST["email"]));
	}

	$query = $con->prepare("SELECT * FROM gebruiker");
	$query->execute();
	$gebruikers = $query->fetchAll();
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
        
        <form method="post" action="spelersoverzicht.php">
        <div class="info">
            <table class="flat-table">
                <tr>
                	<th>ID</th>
                    <th>Naam</th>
                    <th>Achternaam</th>
                    <th>Spelersnaam</th>
                    <th>Email</th>
                    <th>Bewerken</th>
                    <th>Verwijderen</th>
                </tr>
                <?php
                foreach ($gebruikers as $gebruiker) {
                    print("\n\t<tr>");      
                    print("\n\t\t<td>" . $gebruiker["id"] . "</td>");
                    print("\n\t\t<td>" . $gebruiker["naam"] . "</td>");
                    print("\n\t\t<td>" . $gebruiker["achternaam"] . "</td>");
                    print("\n\t\t<td>" . $gebruiker["spelersnaam"] . "</td>");
                    print("\n\t\t<td>" . $gebruiker["email"] . "</td>");
                    print("<td><a href=\"spelerbewerk.php?id=" . $gebruiker["id"] . "\">Bewerk</a></td>");
                    print("<td><a href=\"spelerverwijder.php?id=" . $gebruiker["id"] . "\">Verwijder</a></td>");
                    print("\n\t</tr>");
                }
                ?>
                <tr>
                	<td></td>
                    <td><input type="text" name="naam"></td>
                    <td><input type="text" name="achternaam"></td>
                    <td><input type="text" name="spelersnaam"></td>
                    <td><input type="text" name="email"></td>
                    <td class="breed"><input type="submit" name="toevoegen" value="Toevoegen"></td>
                    <td></td>
                </tr>
            </table>
        </form>
        </div>
    </body>
</html>