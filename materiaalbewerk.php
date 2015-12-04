<!DOCTYPE html>

<?php
require 'connection.php';
$melding = "";
$naam = "";
if (isset($_GET["naam"])) {
    $naam = $_GET["naam"];
}

if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];
    try {
        if (isset($_GET["opslaan"])) {
            $stmt = $con->prepare("UPDATE materiaal SET naam=? WHERE id=?");
            $stmt->execute(array($_GET["naam"], $_GET["id"]));
            
            $melding = "De gegevens zijn opgeslagen";
        }
        $stmt = $con->prepare("SELECT * FROM materiaal WHERE id=?");
        $stmt->execute(array($_GET["id"]));
        $item = $stmt->fetch();

        $naam = $item["naam"];

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
        <form method="get" action="materiaalbewerk.php">
            <table class="flat-table">
                <tr>
                    <th>ID</th>
                    <th>Item</th>
                    <th></th>
                </tr>
                <tr>
                    <td><input type="text" name="id" value="<?php print($id); ?>" size="4" disabled=""></td>
                    <td><input type="text" name="naam" value="<?php print($naam); ?>"></td>
                    <td><input type="submit" name="opslaan" value="Opslaan"></td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php print($id); ?>">
        </form>
        <br>
        <?php print($melding); ?>
        <br><br>
        <a class="flat-table" href="materiaaloverzicht.php">Terug naar het overzicht</a>
        </div>
    </body>
</html>