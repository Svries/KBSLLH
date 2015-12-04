<!DOCTYPE html>

<?php
require 'connection.php';
$melding = "";
$naam = "";
if (isset($_GET["naam"])) {
    $naam = $_GET["naam"];
}

$achternaam = "";
if (isset($_GET["achternaam"])) {
    $woonplaats = $_GET["achternaam"];
}

$achternaam = "";
if (isset($_GET["achternaam"])) {
    $woonplaats = $_GET["achternaam"];
}

$spelersnaam = "";
if (isset($_GET["spelersnaam"])) {
    $woonplaats = $_GET["spelersnaam"];
}

$email = "";
if (isset($_GET["email"])) {
    $woonplaats = $_GET["email"];
}

if (isset($_GET["email"])) {
    $woonplaats = $_GET["email"];
}
if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];
    try {
        if (isset($_GET["opslaan"])) {
            $stmt = $con->prepare("UPDATE gebruiker SET naam=?,  achternaam=?, spelersnaam=?, email=? WHERE id=?");
            $stmt->execute(array($_GET["naam"], $_GET["achternaam"], $_GET["spelersnaam"], $_GET["email"], $_GET["id"]));
            
            $melding = "De gegevens zijn opgeslagen";
        }
        $stmt = $con->prepare("SELECT * FROM gebruiker WHERE id=?");
        $stmt->execute(array($_GET["id"]));
        $gebruiker = $stmt->fetch();

        $naam = $gebruiker["naam"];
        $achternaam = $gebruiker["achternaam"];
        $spelersnaam = $gebruiker["spelersnaam"];
        $email = $gebruiker["email"];

    } catch (PDOException $e) {
        $melding = "Er is iets misgegaan";
    }
    $con = NULL;
} else {
    $melding = "Het id nummer ontbreekt";
}
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
        <form method="get" action="spelerbewerk.php">
            <table class="flat-table">
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Achternaam</th>
                    <th>Spelersnaam</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                <tr>
                    <td><input type="text" name="id" value="<?php print($id); ?>" size="4" disabled=""></td>
                    <td><input type="text" name="naam" value="<?php print($naam); ?>"></td>
                    <td><input type="text" name="achternaam" value="<?php print($achternaam); ?>"></td>
                    <td><input type="text" name="spelersnaam" value="<?php print($spelersnaam); ?>"></td>
                    <td><input type="text" name="email" value="<?php print($email); ?>"></td>
                    <td><input type="submit" name="opslaan" value="Opslaan"></td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php print($id); ?>">
        </form>
        <br>
        <?php print($melding); ?>
        <br><br>
        <a class="flat-table" href="spelersoverzicht.php">Terug naar het overzicht</a>
        </div>
    </body>
</html>