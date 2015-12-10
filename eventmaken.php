<!DOCTYPE html>
<?php
    require 'connection.php';
$melding = "";
$datum = "";
if (isset($_GET["datum"])) {
    $datum = $_GET["datum"];
}

$begintijd = "";
if (isset($_GET["begintijd"])) {
    $begintijd = $_GET["begintijd"];
}

$plaats = "";
if (isset($_GET["plaats"])) {
    $plaats = $_GET["plaats"];
}

$adres = "";
if (isset($_GET["adres"])) {
    $adres = $_GET["adres"];
}

$naam = "";
if (isset($_GET["naam"])) {
    $naam = $_GET["naam"];
}

$omschrijving = "";
if (isset($_GET["omschrijving"])) {
    $omschrijving = $_GET["omschrijving"];
}

$eindtijd = "";
if (isset($_GET["eindtijd"])) {
    $eindtijd = $_GET["eindtijd"];
}
    if (isset($_POST["Event_aanmaken"])) {
        // op toevoegen geklikt, nummer bestaat en nummer is niet leeg
        $query = $con->prepare("INSERT INTO evenement(Datum, begintijd, plaats, adres, naam, omschrijving, eindtijd) VALUES(?,?,?,?,?,?,?)");
        $query->execute(array($_POST["datum"], $_POST["begintijd"], $_POST["plaats"], $_POST["adres"], $_POST["naam"], $_POST["omschrijving"], $_POST["eindtijd"]));
    }
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
                <!-- google agenda iframe -->
                <!--  <div class="agenda">
                     <iframe src="https://calendar.google.com/calendar/embed?mode=AGENDA&amp;height=600&amp;wkst=1&amp;bgcolor=grey&amp;src=j3ft4po2nu6490gg7q8g67dmjk%40group.calendar.google.com&amp;color=%2323164E&amp;ctz=Europe%2FAmsterdam" style="border-width:0" width="600" height="600" frameborder="0" scrolling="no"></iframe>
                   -->
                   <h2>Maak hieronder een nieuw event aan</h2>
                    <br>
                   <form method="post" action="eventmaken.php">
                    naam evenement<br>
                    <input type="text" name="naam" placeholder="naam">
                    <br>
                    datum<br> 
                    <input type="text" name="datum" placeholder="1999-12-31"><br><br>
                    locatie: <input type="text" name="adres" placeholder="adres"> in <input type="text" name="plaats" placeholder="plaats">&nbsp; <br><br>
                    &nbsp;tijd:&nbsp; <input type="text" name="begintijd" placeholder="00:00"> tot <input type="text" name="eindtijd" placeholder="00:00"><br><br>
                    omschrijving<br> 
                    <textarea rows="5" cols="40" name="omschrijving">
                    </textarea><br>
                    <input type="submit" name="Event aanmaken" value="Event aanmaken">
                   <form>
                    <?php 
           //          if(isset($_POST["submit"]))
           // {

           // }

           // $errors=array();
           
           // if (empty($_POST["naam"]))
           // { //deze gaat via de error in begin
           //  echo $errors["naam"] = "naam kan niet leeg zijn" ;
           //   //laat de tekst niet zien?
           //  }

           //  if (empty($_POST["mail"]))
           // { //deze gaat via de error in begin
           //      echo "<br/>"; 
           //      echo $errors["naam"] = "Je mail kan niet leeg zijn " ;
           // }
           ?>
                   <h3>Zie hieronder de aankomende markten</h3>
                   <table class="agenda">
                <tr>
                    <th>evenement</th>
                    <th>Datum</th>
                    <th>Locatie</th>
                    <th>tijd</th>
                    <th>Omschrijving</th>
                    <th>Bewerken</th>
                    <th>Verwijderen</th>
                </tr>
                <?php
                foreach ($agenda as $punt) {
                    print("\n\t<tr>");
                    print("\n\t\t<td>" . $punt["naam"] . "</td>");
                    print("\n\t\t<td>" . $punt["datum"] . "</td>");
                    print("\n\t\t<td>" . $punt["adres"] . " in " . $punt["plaats"] . "</td>");
                    print("\n\t\t<td>" . "van " . $punt["begintijd"] . " tot " . $punt["eindtijd"] . "</td>");
                    print("\n\t\t<td>" . $punt["omschrijving"] . "</td>");
                    print("<td><a href=\"eventbewerk.php?id=" . $punt["id"] . "\">Bewerk</a></td>");
                    print("<td><a href=\"eventverwijder.php?id=" . $punt["id"] . "\">Verwijder</a></td>");
                    print("\n\t</tr>");
                }
                ?>
            </div>
        </div>
    </body>
</html>
