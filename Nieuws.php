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
                            <div id="central" name= "Nieuws">
                                <a href = "Nieuws.php?gb=true">Nieuw bericht</a>
                                <hr>
                                <?php
                                require_once("connection.php");
                                if (isset($_GET['gb'])){
                                    echo"
                                    <form action = '' method = 'POST'>
                                    Titel:<br>
                                    <input type= 'text' name = 'titel'><br>
                                    Bericht:<br>
                                    <textarea cols= '40' rows= '3' name= 'bericht'></textarea><br>
                                    <input type= 'submit' name= 'submitBtn'>
                                    </form>
                                    ";
                                    if(isset($_POST['submitBtn'])){
                                        //variabelen definieren
                                        $titel = $_POST['titel'];
                                        $bericht = $_POST['bericht'];
                                        
                                        //sql voor plaatsen
                                        $sql = "INSERT INTO nieuws(titel, bericht) VALUES ('$titel', '$bericht')";
                                        $stmt = $con->query($sql);
                                        $stmt->execute();
                                        echo "Uw nieuwsbericht is geplaatst.";
                                    }
                                    }else{
                                        //SQL
                                        $sql = "SELECT * FROM nieuws ORDER BY datum DESC";
                                        $stmt = $con->Query ($sql);
                                        $stmt->Execute();
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        if($stmt->rowCount() > 0){
                                            while($row = $stmt->fetch()){
                                                echo "
                                                <b>Titel: </b>".$row['titel']."<br>
                                                <b>Date: </b>".$row['datum']."<br>
                                                <b>Bericht:</b><br>
                                                <p>
                                                ".$row['bericht']."
                                                </p>
                                                <hr>
                                                ";
                                            }
                                        }
                                    };
                                    ?>
                            </div><!--Closing "central"/Div 3-->
        </div>
    </body>
</html>
