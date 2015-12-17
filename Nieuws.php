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
                                    Bericht:<br>
                                    <textarea cols= '40' rows= '3' name= 'nieuws'></textarea><br>
                                    <input type= 'submit' name= 'Toevoegen'>
                                    </form>
                                    ";
                                    }else{

                                    };
                                    ?>
                            </div><!--Closing "central"/Div 3-->
        </div>
    </body>
</html>
