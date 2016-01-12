
<?php
session_start();
$melding = "";
require_once 'connection.php';
if(!isset($_SESSION['user_id']))
{
    header('location: loginpage.php');

} 

if($_SESSION['user_type'] !== 'admin') 
{
    header('location: index.php');

} else {
    if (isset($_GET["id"]) && $_GET["id"] != "") {
        $id = $_GET["id"];
        if($id > 2) {
            header ('location: index.php');
        }
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
            <script language="javascript" type="text/javascript" src="tinymce\js\tinymce\tinymce.min.js"></script>
            <script language="javascript" type="text/javascript">
            tinyMCE.init({
                
                mode : "textareas",
                  plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste imagetools"
                    ]
            });
            </script>
                <tr>

                </tr>
                <tr>
                    <textarea name="bericht" rows="25">
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