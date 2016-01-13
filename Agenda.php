<!DOCTYPE html>
<?php
    require 'connection.php';
// hieronder het ophalen van de informatie voor de agenda (data) 
$query = $con->prepare("SELECT * FROM evenement");
    $query->execute();
    $agenda = $query->fetchAll();
    $con = NULL;
    ?>
<html>
    <head>
        <!-- stylsheet agenda -->
        <link href="agendaopmaak.css" rel="stylesheet" type="text/css"/>
		<?php include 'head.php'; ?>
    </head>
     <body>
    	<header>
    	   <?php include 'header.php'; ?>
    	   </header>
             <div class="info">
                <!-- hieronder de agenda tabel -->
                   <h2>Bekijk hier de aankomende markten</h2>
                   <table class="agenda">
                <tr>
                    <th>Evenement</th>
                    <th>Datum</th>
                    <th>Locatie</th>
                    <th>Tijd</th>
                    <th>Omschrijving</th>
                </tr>
                <?php
                foreach ($agenda as $punt) {
                    print("\n\t<tr>");
                    print("\n\t\t<td>" . $punt["naam"] . "</td>");
                    print("\n\t\t<td>" . $punt["datum"] . "</td>");
                    print("\n\t\t<td>" . $punt["adres"] . " in " . $punt["plaats"] . "</td>");
                    print("\n\t\t<td>" . "van " . $punt["begintijd"] . " tot " . $punt["eindtijd"] . "</td>");
                    print("\n\t\t<td>" . $punt["omschrijving"] . "</td>");
                    print("\n\t</tr>");
                }
                ?>
            </div>
        </div>
    </body>
</html>
