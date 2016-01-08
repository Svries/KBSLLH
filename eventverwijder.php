<!DOCTYPE html>
<html>
    <head>
            <?php include 'head.php';?>
    </head>

    <body>
        <header>
            <?php include 'header.php'; ?>
        </header>
        <div class="info">
        <?php
        //verbinding met database
        require 'connection.php';

        //kijkt of het id wel mee is gekomen met de link
        if (isset($_GET["id"]) && $_GET["id"] != "") {
            $id = $_GET["id"];
        //De query welke het evenement uit de database verwijderd
            if (isset($_GET['bevestiging'])) {
                try {
                    $stmt = $con->prepare("DELETE FROM evenement WHERE id=?");
                    $stmt->execute(array($id));
                    if ($stmt->rowCount() == 1) {
                        print("Item" . $id . " is verwijderd");
                    } else {
                        print("Er is iets misgegaan");
                    }
                } catch (PDOException $e) {
                    $melding = "Er is iets misgegaan";
                }
                $con = NULL;
            } 
        //vraagt gebruiker of hij zeker wil dat hij het item wil verwijderen
            else {
                print("Weet je zeker dat je Item " . $id . " wilt verwijderen?<br><br>");
                print("<form method=\"get\" action=\"eventverwijder.php\" >");
                print("<input type=\"submit\" name=\"bevestiging\" value=\"Verwijder\">");
                print("<input type=\"hidden\" name=\"id\" value=\"" . $id . "\">");
                print("</form>");
            }
        } else {
            print("Het nummer ontbreekt");
        }
        ?>
        <br><br>
        <a class="flat-table" href = "eventmaken.php">Terug naar het overzicht</a>
        </div>
    </body>
</html>