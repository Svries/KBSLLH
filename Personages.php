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

<!--- REGEL1 -->          
<!--
          <div class="persoregel">
            <div class="left">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <?php
                    foreach ($gebruikers as $gebruiker) {  
                    ?>
                    <h3><a href='#' id='example-show' class='showLink' onclick='showHide("example");return false;'><?php echo $gebruiker["naam"]?></a></h3>
                    
                    <?php  
                   // print ("<h3><a href='#' id='example-show' class='showLink' onclick='showHide(\'example\');return false;'>" . ($gebruiker["naam"]) . "</a></h3>");
                  }
                    ?>
                            <a href="#" id="example-hide" class="hideLink" onclick="showHide('example');return false;">
                                <div id="example" class="more">
                                    <h3 style=>"naam"</h3>
                                        <p>"verhaaltje"</p>
         
                                </div>
                            </a>
            </div>

            <div class="center">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
               
                    <h3><a href='#' id='example2-show' class='showLink' onclick='showHide("example2");return false;'><?php echo $gebruikers["naam"]?></a></h3>

                            <a href="#" id="example2-hide" class="hideLink" onclick="showHide('example2');return false;">
                                <div id="example2" class="more">
                                    <h3>"naam"</h3>
                                        <p>"verhaaltje"</p>
         
                                </div>
                            </a>
            </div>

            <div class="right">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example3-show" class="showLink" onclick="showHide('example3');return false;">"naam"</a></h3>
                            <a href="#" id="example3-hide" class="hideLink" onclick="showHide('example3');return false;">
                                <div id="example3" class="more">
                                    <h3>"naam"</h3>
                                        <p>"verhaaltje"</p>
         
                                </div>
                            
                            </a>
            </div>
          </div>



          <div class="persoregel">
            <div class="left">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example4-show" class="showLink" onclick="showHide('example4');return false;">"naam"</a></h3>
                            <a href="#" id="example4-hide" class="hideLink" onclick="showHide('example4');return false;">
                                <div id="example4" class="more">
                                    <h3 style=>"naam"</h3>
                                        <p>"verhaaltje"</p>
         
                                </div>
                            </a>
            </div>

            <div class="center">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example5-show" class="showLink" onclick="showHide('example5');return false;">"naam"</a></h3>
                            <a href="#" id="example5-hide" class="hideLink" onclick="showHide('example5');return false;">
                                <div id="example5" class="more">
                                    <h3>"naam"</h3>
                                        <p>"verhaaltje"</p>
         
                                </div>
                            </a>
            </div>

            <div class="right">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example6-show" class="showLink" onclick="showHide('example6');return false;">"naam"</a></h3>
                            <a href="#" id="example6-hide" class="hideLink" onclick="showHide('example6');return false;">
                                <div id="example6" class="more">
                                    <h3>"naam"</h3>
                                        <p>"verhaaltje"</p>
         
                                </div>
                            
                            </a>
            </div>
          </div>



          <div class="persoregel">
            <div class="left">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example7-show" class="showLink" onclick="showHide('example7');return false;">"naam"</a></h3>
                            <a href="#" id="example7-hide" class="hideLink" onclick="showHide('example7');return false;">
                                <div id="example7" class="more">
                                    <h3 style=>"naam"</h3>
                                        <p>"verhaaltje"</p>
         
                                </div>
                            </a>
            </div>

            <div class="center">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example8-show" class="showLink" onclick="showHide('example8');return false;">"naam"</a></h3>
                            <a href="#" id="example8-hide" class="hideLink" onclick="showHide('example8');return false;">
                                <div id="example8" class="more">
                                    <h3>"naam"</h3>
                                        <p>"verhaaltje"</p>
         
                                </div>
                            </a>
            </div>

            <div class="right">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example9-show" class="showLink" onclick="showHide('example9');return false;">"naam"</a></h3>
                            <a href="#" id="example9-hide" class="hideLink" onclick="showHide('example9');return false;">
                                <div id="example9" class="more">
                                    <h3>"naam"</h3>
                                        <p>"verhaaltje"</p>
         
                                </div>
                            
                            </a>
            </div>
          </div>
---->
<!--- REGEL4 -->

