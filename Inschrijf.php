<!DOCTYPE html>
<?php
require 'connection.php';
//kijkt of alles wel is ingevuld voordat het naar de database wordt gestuurd
    if( (isset($_POST["inschrijven"]))
    and (!empty($_POST["eindtijd"]))
    and (!empty($_POST["Naam"]))
    and (!empty($_POST["begintijd"]))
    and (!empty($_POST["evenement_id"]))) {
	    $query = $con->prepare("INSERT INTO inschrijvenevenement(evenement_id,Naam,begintijd,eindtijd) VALUES(?,?,?,?)");
	    $query->execute(array($_POST["evenement_id"], $_POST["Naam"], $_POST["begintijd"], $_POST["eindtijd"]));
	}
//eerste connectie database voor ophalen inschrijvingen
    $query = $con->prepare("SELECT I.id, I.Naam, I.begintijd, I.eindtijd, E.naam, E.plaats from inschrijvenevenement I join evenement E on E.id=I.evenement_id");
    $query->execute();
    $inschrijvingen = $query->fetchAll();
    $con = NULL;

//tweede connectie database voor ophalen open evenementen 
$con2 = new PDO("mysql:host=localhost; dbname=lhh; port=3307", "root", "usbw");
$con2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query2 = $con2->prepare("SELECT * FROM evenement");
    $query2->execute();
    $evenement = $query2->fetchAll();
    $con2 = NULL;

//behoud van ingevulde data na ontbreken van deel ervan
    if (!empty($_POST["Naam"])){
        $naam2 = $_POST["Naam"];}
        else{$plaats ="";}
    if (!empty($_POST["eindtijd"])){
        $eindtijd = $_POST["eindtijd"];}
        else{$eindtijd ="";}
    if (!empty($_POST["begintijd"])){
        $begintijd = $_POST["begintijd"];}
        else{$begintijd ="";}

//derde connectie database voor ophalen van naam van speler voor formulier
    session_start();

if(!isset($_SESSION['user_id']))
{
    $message = 'Je moet ingelogd zijn om deze pagina kunnen te bekijken';
}
else
{
    try
    {
        $con3 = new PDO("mysql:host=localhost; dbname=lhh; port=3307", "root", "usbw");
        $con3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*** Bereid de query voor ***/
        $stmt = $con3->prepare("SELECT spelersnaam FROM gebruiker 
            WHERE id = :id");

        /*** bind de parameters ***/
        $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
        /*** Voert het hiervoor bereide statement uit***/
        $stmt->execute();

        /*** check for a result ***/
        $spelersnaam = $stmt->fetchColumn();
        /*** Als er nee uitkomt is er iets fout gegaan ***/
        if($spelersnaam == false)
        {
            $message = 'Access Error';
        }
    }
    catch (Exception $e)
    {
        /*** als je hier komt is eriets fout in de database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>
<html>
    <head>
     <?php include 'head.php'; ?>
    </head>
    
    <body> 
        <header>
            <?php include 'header.php'; ?>
        </header>
        <div class="info">

            <!-- Zichtbare formulier voor gebruiker -->
        	<form method="post" action="inschrijf.php">
        		<h3> Inschrijven </h3>
        		<p> 
                    <!-- Automatisch naam van ingelogde speler ingevuld.
                    Speler kan altijd kiezen een andere naam in te voeren -->
            Naam Speler 
            <br> 
                <input type="text" name="Naam" value="<?php echo $spelersnaam; ?>">
                <!-- controleren of de naam is ingevuld --> 
                <?php if ((isset($_POST["inschrijven"])) 
                        and (empty($_POST["Naam"])) ) 
                        {echo "U moet een 'naam' opgeven";
                    } ?>
            <br><br>    
            voor welk evenement wil u zich graag inscrijven?
            <br>

             <!-- Drop down menu voor kiezen van evenement -->
                    <select name="evenement_id">
                        <option value="">Kies...</option>
                        <?php foreach ($evenement as $naam) { ?>

                        <!-- Speler kiest een evenement en het id daarvan wordt met de inschrijving meegestuurd -->
                        <option value=<?php echo $naam["id"]; ?>><?php echo $naam["naam"] . " in " . $naam["plaats"]; ?></option>
                        <?php } ?>
                    </select> 

                    <!-- controleren of er wel een evenement is gekozen -->
                    <?php if ((isset($_POST["inschrijven"])) 
                        and (empty($_POST["evenement_id"])) ) 
                        {echo "U moet een evenement kiezen";
                    } ?>
            <br><br>
                    Ik zal aanwezig zijn van
            <br>
        		 <input type="text" name="begintijd" placeholder="00:00" value="<?php echo $begintijd;?>">
                Tot <input type="text" name="eindtijd" placeholder="00:00" value="<?php echo $eindtijd;?>">

                <!-- controleren of er wel een tijd is ingevuld -->
                <?php if ((isset($_POST["inschrijven"])) 
                            and ((empty($_POST["begintijd"])) or (empty($_POST["eindtijd"])) )) 
                            {echo "U moet de tijd opgeven";
                    } ?>
        <br><br>
        		  <input type="submit" name="inschrijven" value="inschrijven">
        <br><br>

            <!-- Tabel waarop te zien is wie waarvoor al is ingeschreven -->
        		<table class="flat-table">
        			<tr>
        				<th style="width: 200px;">Naam</th>
        				<th style="width: 200px;">Begin Tijd</th>
        				<th style="width: 200px;">Eind Tijd</th>
                        <th style="width: 200px;">evenement</th>

                    <!-- dit gedeelte achter admin panel -->
                        <th style="width: 200px;">Bewerk</th>
                        <th style="width: 200px;">Verwijder</th>
                    <!-- dit gedeelte achter admin panel -->

        			</tr>
        		<?php
                foreach ($inschrijvingen as $namen) {
                    print("\n\t<tr>");      
                    print("\n\t\t<td>" . $namen["Naam"] . "</td>");
                    print("\n\t\t<td>" . $namen["begintijd"] . "</td>");
                    print("\n\t\t<td>" . $namen["eindtijd"] . "</td>");
                    print("\n\t\t<td>" . $namen["naam"] . " in " . $namen["plaats"] . "</td>");

                //dit gedeelte achter admin panel
                    print("<td><a href=\"inschrijvingbewerk.php?id=" . $namen["id"] . "\">Bewerk</a></td>");
                    print("<td><a href=\"inschrijvingverwijder.php?id=" . $namen["id"] . "\">Verwijder</a></td>");
                //dit gedeelte achter admin panel

                    print("\n\t</tr>");
                }
                ?>
        		</table>
        </div>
    </body>
</html>