<!DOCTYPE html>
<?php
    require 'connection.php';

$query = $con->prepare("SELECT * FROM evenement");
    $query->execute();
    $agenda = $query->fetchAll();
    $con = NULL;
    ?>
<html>
    <head>
        <link href="agendaopmaak.css" rel="stylesheet" type="text/css"/>
		<?php include 'head.php'; ?>
    </head>
     <body>
    	<header>
    	   <?php include 'header.php'; ?>
    	   </header>
             <div class="info">
                <!--  <div class="agenda">
                     <iframe src="https://calendar.google.com/calendar/embed?mode=AGENDA&amp;height=600&amp;wkst=1&amp;bgcolor=grey&amp;src=j3ft4po2nu6490gg7q8g67dmjk%40group.calendar.google.com&amp;color=%2323164E&amp;ctz=Europe%2FAmsterdam" style="border-width:0" width="600" height="600" frameborder="0" scrolling="no"></iframe>
                   -->
                   <h2>Bekijk hier de aankomende markten</h2>
                   <table class="agenda">
                <tr>
                    <th>evenement</th>
                    <th>Datum</th>
                    <th>Locatie</th>
                    <th>tijd</th>
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
