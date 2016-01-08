<!DOCTYPE html>
<?php
    require 'connection.php';
  if ( (isset($_POST["Event_aanmaken"])) 
    and (!empty($_POST["naam"])) 
    and (!empty($_POST["plaats"])) 
    and (!empty($_POST["eindtijd"]))
    and (!empty($_POST["adres"]))
    and (!empty($_POST["begintijd"]))
    and (!empty($_POST["datum"]))) {
        // het stuk hier boven kijkt of alles wel is ingevuld voordat het aan de database wordt toegevoegd
        $query = $con->prepare("INSERT INTO evenement(Datum, begintijd, plaats, adres, naam, omschrijving, eindtijd) VALUES(?,?,?,?,?,?,?)");
        $query->execute(array($_POST["datum"], $_POST["begintijd"], $_POST["plaats"], $_POST["adres"], $_POST["naam"], $_POST["omschrijving"], $_POST["eindtijd"]));
    }

    //haalt alle aangemaakt evenementen op uit de database
    $query = $con->prepare("SELECT * FROM evenement");
    $query->execute();
    $agenda = $query->fetchAll();
    $con = NULL;

//Vult de al ingevulde data weer in als de gebruiker vergeet iets in te vullen
    if (!empty($_POST["naam"])){
        $naam = $_POST["naam"];}
        else{$naam ="";}
    if (!empty($_POST["datum"])){ 
        $datum = $_POST["datum"];}
        else{$datum ="";}
    if (!empty($_POST["plaats"])){
        $plaats = $_POST["plaats"];}
        else{$plaats ="";}
    if (!empty($_POST["eindtijd"])){
        $eindtijd = $_POST["eindtijd"];}
        else{$eindtijd ="";}
    if (!empty($_POST["adres"])){
        $adres = $_POST["adres"];}
        else{$adres ="";}
    if (!empty($_POST["begintijd"])){
        $begintijd = $_POST["begintijd"];}
        else{$begintijd ="";}
    if (!empty($_POST["omschrijving"])){
        $omschrijving = $_POST["omschrijving"];}
        else{$omschrijving ="";}
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

                <!-- hieronder het in te vullen formulier voor de gebruiker-->
                   <h2>Maak hieronder een nieuw event aan</h2>
                    <br>
                   <form method="post" action="eventmaken.php">
                    naam evenement
                    <br>
                        <input type="text" name="naam" placeholder="naam" value="<?php echo $naam;?>">
                        <!-- geeft een error bericht -->
                        <?php if ((isset($_POST["Event_aanmaken"])) 
                        and (empty($_POST["naam"])) ) 
                        {echo "U moet een naam opgeven";
                    } ?>
                    <br>
                    datum
                    <br> 
                        <input type="text" name="datum" placeholder="1999-12-31" value="<?php echo $datum;?>" >
                        <!-- geeft een error bericht -->
                        <?php if ((isset($_POST["Event_aanmaken"])) 
                            and (empty($_POST["datum"])) ) 
                            {echo "U moet een datum opgeven";
                    } ?>
                    <br>
                    <br>
                    locatie: 
                        <input type="text" name="adres" placeholder="adres" value="<?php echo $adres;?>"> 
                        in 
                        <input type="text" name="plaats" placeholder="plaats" value="<?php echo $plaats;?>">
                        <!-- geeft een error bericht -->
                        <?php if ((isset($_POST["Event_aanmaken"])) 
                            and ((empty($_POST["adres"])) or (empty($_POST["plaats"])) ))
                            {echo "U moet een locatie opgeven";
                    } ?>
                    &nbsp; 
                    <br>
                    <br>
                        &nbsp;tijd:&nbsp; <input type="text" name="begintijd" placeholder="00:00" value="<?php echo $begintijd;?>"> 
                        tot 
                        <input type="text" name="eindtijd" placeholder="00:00" value="<?php echo $eindtijd;?>">
                        <!-- geeft een error bericht -->
                        <?php if ((isset($_POST["Event_aanmaken"])) 
                            and ((empty($_POST["begintijd"])) or (empty($_POST["eindtijd"])) )) 
                            {echo "U moet de tijd opgeven";
                    } ?>
                    <br>
                    <br>
                    omschrijving
                        <br> 
                        <textarea rows="5" cols="40" name="omschrijving" value="<?php echo $omschrijving;?>">
                        </textarea>
                        <br>
                        <input type="submit" name="Event aanmaken" value="Event aanmaken">
                <form>
                    <!-- hier staat de tabel met de markten welke al ingeplant zijn -->
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
