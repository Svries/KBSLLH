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
        require 'connection.php';
        if (isset($_GET["id"]) && $_GET["id"] != "") {
            $id = $_GET["id"];

            if (isset($_GET['bevestiging'])) {
                try {
                    $stmt = $con->prepare("DELETE FROM gebruiker WHERE id=?");
                    $stmt->execute(array($id));
                    if ($stmt->rowCount() == 1) {
                        print("Gebruiker " . $id . " is verwijderd");
                    } else {
                        print("Er is iets misgegaan");
                    }
                } catch (PDOException $e) {
                    $melding = "Er is iets misgegaan";
                }
                $con = NULL;
            } else {
                print("Weet je zeker dat je gebruiker " . $id . " wilt verwijderen?<br><br>");
                print("<form method=\"get\" action=\"spelerverwijder.php\" >");
                print("<input type=\"submit\" name=\"bevestiging\" value=\"Verwijder\">");
                print("<input type=\"hidden\" name=\"id\" value=\"" . $id . "\">");
                print("</form>");
            }
        } else {
            print("Het nummer ontbreekt");
        }
        ?>
        <br><br>
        <a class="flat-table" href = "spelersoverzicht.php">Terug naar het overzicht</a>
        </div>
    </body>
</html>