<?php
	require 'connection.php';

$melding = "";
$naam = "";
if (isset($_GET["naam"])) {
    $naam = $_GET["naam"];
}

	if (isset($_POST["toevoegen"])) {
	    // op toevoegen geklikt, nummer bestaat en nummer is niet leeg
	    $query = $con->prepare("INSERT INTO materiaal(naam) VALUES(?)");
	    $query->execute(array($_POST["naam"]));
	}

	$query = $con->prepare("SELECT * FROM materiaal");
	$query->execute();
	$materiaalen = $query->fetchAll();
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
        <form method="post" action="materiaaloverzicht.php">
        <div class="info">
            <table class="flat-table">
                <tr>
                    <th>ID</th>
                    <th>Item</th>
                    <th>Bewerken</th>
                    <th>Verwijderen</th>
                </tr>
                <?php
                foreach ($materiaalen as $item) {
                    print("\n\t<tr>");
                    print("\n\t\t<td>" . $item["id"] . "</td>");
                    print("\n\t\t<td>" . $item["naam"] . "</td>");
                    print("<td><a href=\"materiaalbewerk.php?id=" . $item["id"] . "\">Bewerk</a></td>");
                    print("<td><a href=\"materiaalverwijder.php?id=" . $item["id"] . "\">Verwijder</a></td>");
                    print("\n\t</tr>");
                }
                ?>
                <tr>
                    <td></td>
                    <td><input type="text" name="naam"></td>
                    <td class="breed"><input type="submit" name="toevoegen" value="Toevoegen"></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <a href="materiaalperspeler.php">materiaal per speler</a>
        </div>
    </body>
</html>