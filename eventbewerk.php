<!DOCTYPE html>

<?php
require 'connection.php';

$melding = "";
$datum = "";
if (isset($_GET["datum"])) {
    $datum = $_GET["datum"];
}

$begintijd = "";
if (isset($_GET["begintijd"])) {
    $begintijd = $_GET["begintijd"];
}

$plaats = "";
if (isset($_GET["plaats"])) {
    $plaats = $_GET["plaats"];
}

$adres = "";
if (isset($_GET["adres"])) {
    $adres = $_GET["adres"];
}

$naam = "";
if (isset($_GET["naam"])) {
    $naam = $_GET["naam"];
}

$omschrijving = "";
if (isset($_GET["omschrijving"])) {
    $omschrijving = $_GET["omschrijving"];
}

$eindtijd = "";
if (isset($_GET["eindtijd"])) {
    $eindtijd = $_GET["eindtijd"];
}
// terug sturen van aangepaste data naar database
if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];
    try {
        if (isset($_GET["opslaan"])) {
            $stmt = $con->prepare("UPDATE evenement SET naam=?, datum=?, plaats=?, adres=?, omschrijving=?, eindtijd=?, begintijd=? WHERE id=?");
            $stmt->execute(array($_GET["naam"], $_GET["datum"], $_GET["plaats"], $_GET["adres"], $_GET["omschrijving"], $_GET["eindtijd"], $_GET["begintijd"], $_GET["id"]));
            
            $melding = "De gegevens zijn opgeslagen";
        }
        //op halen van gegevens van aan te passen evenement
        $stmt = $con->prepare("SELECT * FROM evenement WHERE id=?");
        $stmt->execute(array($_GET["id"]));
        $event = $stmt->fetch();

        $naam = $event["naam"];
        $datum = $event["datum"];
        $plaats = $event["plaats"];
        $adres = $event["adres"];
        $omschrijving = $event["omschrijving"];
        $eindtijd = $event["eindtijd"];
        $begintijd = $event["begintijd"];

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
    <!-- hieronder tabel waar admin de gegevens kan aanpassen -->
        <div class="info">
        <form method="get" action="eventbewerk.php">
            <table class="flat-table">
                <tr>
                    <th>ID</th>
                    <th>Evenement</th>
                    <th>Datum</th>
                    <th>Locatie</th>
                    <th>Tijd</th>
                    <th>Omschrijving</th>
                    <th></th>
                </tr>
                <tr>
                    <td><td class="centertext"><input type="hidden" name="id" value="<?php print($id); ?>">
                    <input type="text" name="naam" value="<?php print($naam); ?>"></td>
                    <td><input type="text" name="datum" value="<?php print($datum); ?>"></td>
                    <td><input type="text" name="adres" value="<?php print($adres); ?>"> in <input type="text" name="plaats" value="<?php print($plaats); ?>"></td>
                    <td><input type="text" name="begintijd" value="<?php print($begintijd); ?>"> tot <input type="text" name="eindtijd" value="<?php print($eindtijd); ?>"></td>
                    <td><textarea rows="5" cols="40" name="omschrijving" value="<?php print($omschrijving); ?>"></textarea></td>
                    <td><input type="submit" name="opslaan" value="Opslaan"></td>
                </tr>
            </table>
        </form>
        <br>
        <?php print($melding); ?>
        <br><br>
        <a class="flat-table" href="eventmaken.php">Terug naar het overzicht</a>
        </div>
    </body>
</html>