<!DOCTYPE html>
<html>
    <head>
     <?php include 'head.php';?>
     <script language="javascript" type="text/javascript">
function showHide(shID) {
   if (document.getElementById(shID)) {
      if (document.getElementById(shID+'-show').style.display != 'none') {
         document.getElementById(shID+'-show').style.display = 'none';
         document.getElementById(shID).style.display = 'block';
      }
      else {
         document.getElementById(shID+'-show').style.display = 'inherit';
         document.getElementById(shID).style.display = 'none';
      }
   }
}
</script>
<?php
require 'connection.php';

  $query = $con->prepare("SELECT * FROM gebruiker");
  $query->execute();
  $gebruikers = $query->fetchAll();
  $con = NULL;

?>

    </head>
    
    <body> 
        <header>
            <?php include 'header.php'; ?>
        </header>

        <div class="info">
 
<!--- Bovenste gedeelte tekst -->          

          <div class="infospeelpagina">
            <h3>Spelerspagina</h3>
              <p>LHH is altijd op zoek naar spelers, die
                <ul>
                  <li>een middeleeuwse figuur kunnen uitbeelden</li> 
                  <li>muziek kunnen maken op een instrument dat in de Middeleeuwen werd gebruikt</li> 
                  <li>een middeleeuws beroep kunnen uitbeelden</li> 
                  <li>kunnen jongleren, acteren of op andere manieren actief het publiek kunnen vermaken</li> 
                </ul>
                    LHH helpt je bij het samenstellen van je kledingstukken, je wordt bekendgemaakt met de historie in de Middeleeuwen en je krijgt instructies 
                    in het spelen met elkaar en met het publiek. Na een eerste kennismaking, loop je mee met een mentor en na een bepaalde periode bezien we samen 
                    of we de goed keuzes gemaakt hebben. </br></br>

                    We verwelkomen iedereen: Oud en vooral ook jong. Neem contact met ons op via het telefoonnummer 06 405 78 385 of mail: <a class="contactlink" href="http://localhost:8080/KBSLLH/Contact.php">levendehistorie@hotmail.com</a>
              </p>
          </div>

<!--- Onderste gedeelte, plaatsen van spelers vanuit de database -->

            <?php
            foreach ($gebruikers as $gebruiker){
              if ($gebruiker["id"] >= 50 && $gebruiker ["id"] < 60){
              print ("<div class='persoregel'>");
              print ("<div class='left'>");
              print ("<img class='personagefoto' src='" . $gebruiker["foto"] . "'>");
              print ("<h3>" . $gebruiker["spelersnaam"] . "</h3>");
              print ("</div>");
              print ("<div class='persoregel2'>");
              print ("<p>" . $gebruiker["spelersverhaal"] . "</p>");
              print ("</div>");
              print ("</div>");
              }
            }
              ?>


          </div>
        </div>
    </body>
</html>



