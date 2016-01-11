<!DOCTYPE html>

<?php
require 'connection.php';

$melding = "";
// $datum = "";
// if (isset($_GET["datum"])) {
//     $datum = $_GET["datum"];
// }

// $begintijd = "";
// if (isset($_GET["begintijd"])) {
//     $begintijd = $_GET["begintijd"];
// }

// $plaats = "";
// if (isset($_GET["plaats"])) {
//     $plaats = $_GET["plaats"];
// }

// $adres = "";
// if (isset($_GET["adres"])) {
//     $adres = $_GET["adres"];
// }

// $naam = "";
// if (isset($_GET["naam"])) {
//     $naam = $_GET["naam"];
// }

// $omschrijving = "";
// if (isset($_GET["omschrijving"])) {
//     $omschrijving = $_GET["omschrijving"];
// }

// $eindtijd = "";
// if (isset($_GET["eindtijd"])) {
//     $eindtijd = $_GET["eindtijd"];
// }

if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];
    try {
        if (isset($_GET["opslaan"])) {
            $stmt = $con->prepare("UPDATE inschrijvenevenement SET Naam=?, begintijd=?, eindtijd=? WHERE id=?");
            $stmt->execute(array($_GET["Naam"], $_GET["begintijd"], $_GET["eindtijd"], $_GET["id"]));
            
            $melding = "De gegevens zijn opgeslagen";
        }
        $stmt = $con->prepare("SELECT * FROM inschrijvenevenement WHERE id=?");
        $stmt->execute(array($_GET["id"]));
        $inschrijfing = $stmt->fetch();

        $naam = $inschrijfing["Naam"];
        $begintijd = $inschrijfing["begintijd"];
        $eindtijd = $inschrijfing["eindtijd"];

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
        <form method="get" action="inschrijvingbewerk.php">
            <table class="flat-table">
                <tr>
                    <th>ID</th>
                    <th>naam</th>
                    <th>Begintijd</th>
                    <th>Eindtijd</th>
                    <th></th>
                </tr>
                <tr>
                    <td><td class="centertext"><input type="hidden" name="id" value="<?php print($id); ?>">
                    <input type="text" name="Naam" value="<?php print($naam); ?>"></td>
                    <td><input type="text" name="begintijd" value="<?php print($begintijd); ?>"></td>
                    <td><input type="text" name="eindtijd" value="<?php print($eindtijd); ?>">
                    <td><input type="submit" name="opslaan" value="Opslaan"></td>
                </tr>
            </table>
        </form>
        <br>
        <?php print($melding); ?>
        <br><br>
        <a class="flat-table" href="inschrijf.php">Terug naar het overzicht</a>
        </div>
    </body>
</html>