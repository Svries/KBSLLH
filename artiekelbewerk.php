
<?php
$melding = "";
require_once 'connection.php';

if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];
    try {
        if (isset($_GET["opslaan"])) {
            $stmt = $con->prepare("UPDATE text SET bericht=? WHERE id=?");
            $stmt->execute(array($_GET["bericht"], $_GET["id"]));
            
            $melding = "De gegevens zijn opgeslagen";
        }

        $stmt = $con->prepare("SELECT * FROM text WHERE id=?");
        $stmt->execute(array($_GET["id"]));
        $text = $stmt->fetch();

        $bericht = $text["bericht"];

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
        <form method="get" action="artiekelbewerk.php">
          <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
          <script>tinymce.init({ selector:'textarea' });</script>
                <tr>

                </tr>
                <tr>
                    <textarea name="bericht">
                        <?php print($bericht); ?>
                    </textarea><br>
                    <input type="submit" name="opslaan" value="Opslaan"></td><br>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php print($id); ?>">
        </form>
        <br>
        <?php print($melding); ?>
        <br><br>
        <a href="index.php">Terug naar het overzicht</a>
        </div>
    </body>
</html>