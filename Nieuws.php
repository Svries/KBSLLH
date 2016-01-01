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
                                if (isset($_GET['gb'])){
                                    echo"
                                    <form action = '' method = 'POST'>
                                    Titel:<br>
                                    <input type= 'text' name = 'titel'>
                                    Bericht:<br>
                                    <textarea cols= '40' rows= '3' name= 'nieuws'></textarea><br>
                                    <input type= 'submit' name= 'submitBtn'>
                                    </form>
                                    ";
                                    if(isset($_POST['submitBtn'])){
                                        //varibelen
                                        $titel = $_POST['titel'];
                                        $nieuws = $_POST['nieuws'];
                                        $date = date("Y-m-d");
                                        include("nieuwsdb.php");
                                        //sql
                                        $sql = "INSERT INTO entries(titel, nieuws, date) VALUES ('$titel', '$nieuws', '$date')";
                                        $stmt = $db->query($sql);
                                        $stmt->execute();
                                        echo "Uw nieuwsbericht is geplaatst.";
                                    }
                                    }else{
                                        //database betrekken
                                        include("nieuwsdb.php");
                                        //SQL
                                        $sql = "SELECT * FROM entries ORDER BY id DESC";
                                        $stmt = $db->Query ($sql);
                                        $stmt->Execute();
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        if($stmt->rowCount() > 0){
                                            while($row = $stmt->fetch()){
                                                echo "
                                                <b>Titel: </b>".$row['titel']."<br>
                                                <b>Date: </b>".$row['date']."<br>
                                                <b>Bericht:</b><br>
                                                <p>
                                                ".$row['nieuws']."
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
