<?php
	require 'connection.php';

$melding = "";
// $naamspeler = "";
// if (isset($_GET["naam"])) {
//     $naam = $_GET["naam"];
// }
// $naamitem = "";
// if (isset($_GET["naam"])) {
//     $naam = $_GET["naam"];
// }
// $uitleendatum = "";
// if (isset($_GET["uitleendatum"])) {
//     $naam = $_GET["uitleendatum"];
// }

	if (isset($_POST["toevoegen"])) {
	    // op toevoegen geklikt, nummer bestaat en nummer is niet leeg
	    $query = $con->prepare("INSERT INTO materiaal(naam) VALUES(?)");
	    $query->execute(array($_POST["naam"]));
	}

	$query = $con->prepare("SELECT uitleen_datum, g.naam , achternaam , m.naam as 's.naam'
from materiaal_uitgeleend u
join gebruiker g
on g.id = gebruiker_id
join materiaal m
on m.id = materiaal_id");
	$query->execute();
	$materiaalperspeler = $query->fetchAll();
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
            <table class="flat-table">
                <tr>
                    <th>Speler</th>
                    <th>Item</th>
                    <th>uitleendatum</th>
                </tr>
                <?php
                foreach ($materiaalperspeler as $punt) {
                    print("\n\t<tr>");
                    print("\n\t\t<td>" . $punt["naam"] . "</td>");
                    print("\n\t\t<td>" . $punt["s.naam"] . "</td>");
                    print("\n\t\t<td>" . $punt["uitleen_datum"] . "</td>");
                    print("\n\t</tr>");
                }
                ?>
            </table>
        </div>
    </body>
</html>