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
<style type="text/css">
   /* This CSS is for the small text at the top. */
   .infospeelpagina {
      width: 100%;
      border-bottom: 1px solid black;
      margin-bottom: 25px;
      box-shadow: 0px 2px;
}

   a.contactlink {
    text-decoration: none;
    color:red;
   }

   /* This CSS is just for presentational purposes. */
   
   .left {
      padding:10px;
      margin-left: 100px;
      width: 150px;
      height: 200px;
      background: url("FOTO/vlagharderwijk2.jpg") no-repeat center center;
      float: left;
      border: 3px solid darkblue;
      border-radius:5px 5px 35px 35px;
  }

   .center {
      padding:10px;
      width: 150px;
      height: 200px;
      margin: 0 auto;
      background: url("FOTO/vlagharderwijk2.jpg") no-repeat center center;
      border: 3px solid darkblue;
      border-radius:5px 5px 35px 35px;
      display: inline-block;
  }

   .right {
      margin-right: 100px;
      padding:10px;
      width: 150px;
      height: 200px;
      background: url("FOTO/vlagharderwijk2.jpg") no-repeat center center;
      border: 3px solid darkblue;
      border-radius:5px 5px 35px 35px;
      float: right; 

  }

   /* This CSS is used for the Show/Hide functionality. */
   .more {
      display: none; 
      background: url("FOTO/oldparchment.jpg");
      margin-left: -150px;
      margin-right: -150px;
      margin-top:-10px;
      padding: 10px;
      z-index: 100;
      border: 2px solid black;
      box-shadow: 1px 1px;
      border-radius: 5px 5px 15px 15px;
      text-align: left;
    }
    .more p {
        width: 100%;
        padding-bottom: 10px;
        word-wrap: break-word;
        font-size: 12px;        
    }
    .moreright p {
        width: 100%;
        padding-bottom: 10px;
        word-wrap: break-word;
        font-size: 12px;        
    }
   a.showLink, a.hideLink {
      text-decoration: none;
      color: black;
      text-align: none;
      }
   a.hideLink {
      background: transparent url(up.gif) no-repeat left; }
</style>
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
          <div class="infospeelpagina">
            <p>
            <form>
              <input type="submit" value="Speler aanpassen">
            </form>
          </p>
          </div>
<!--- REGEL1 -->          
          <div class="persoregel">
            <div class="left">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example-show" class="showLink" onclick="showHide('example');return false;">"naam"</a></h3>
                            <a href="#" id="example-hide" class="hideLink" onclick="showHide('example');return false;">
                                <div id="example" class="more">
                                    <h3 style=>"naam"</h3>
                                        <p>"verhaaltje"</p>
         
                                </div>
                            </a>
            </div>

            <div class="center">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example2-show" class="showLink" onclick="showHide('example2');return false;">"naam"</a></h3>
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

<!--- REGEL2 -->

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

<!--- REGEL3 -->

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

<!--- REGEL4 -->

          <div class="persoregel">
            <div class="left">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example10-show" class="showLink" onclick="showHide('example10');return false;">"naam"</a></h3>
                            <a href="#" id="example10-hide" class="hideLink" onclick="showHide('example10');return false;">
                                <div id="example10" class="more">
                                    <h3 style=>"naam"</h3>
                                        <p>"verhaaltje"</p>
         
                                </div>
                            </a>
            </div>

            <div class="center">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example11-show" class="showLink" onclick="showHide('example11');return false;">"naam"</a></h3>
                            <a href="#" id="example11-hide" class="hideLink" onclick="showHide('example11');return false;">
                                <div id="example11" class="more">
                                    <h3>"naam"</h3>
                                        <p>"verhaaltje"</p>
         
                                </div>
                            </a>
            </div>

            <div class="right">
                <img class="personagefoto" src="http://shackmanlab.org/wp-content/uploads/2013/07/person-placeholder.jpg">
                    <h3><a href="#" id="example12-show" class="showLink" onclick="showHide('example12');return false;">"naam"</a></h3>
                            <a href="#" id="example12-hide" class="hideLink" onclick="showHide('example12');return false;">
                                <div id="example12" class="more">
                                    <h3>"naam"</h3>
                                        <p>"verhaaltje"</p>
         
                                </div>
                            
                            </a>
            </div>
          </div>


        </div>
    </body>
</html>
