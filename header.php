<?php 

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
        <head>
            <link href="slideshow.css" rel="stylesheet" type="text/css"/>
         </head>
            <body>
 <!-- achtergrond muziek -->
                <audio id="myAudio" loop> <!-- autoplay = "autoplay" -->
                <source src="FOTO/Rick_Astley.MP3" type='audio/mp3'>
                <source src="http://media.w3.org/2010/07/bunny/04-Death_Becomes_Fur.oga" type='audio/ogg; codecs=vorbis'>
                    Your user agent does not support the HTML5 Audio element.
                </audio>
                <button type="button" onclick="aud_play_pause()">Play/Pause</button>
                     <script>
                       function aud_play_pause() {
                         var myAudio = document.getElementById("myAudio");
                          if (myAudio.paused) {
                       myAudio.play();
                         } else {
                         myAudio.pause();
                         }
                      }
                    </script>
        <!-- achtergrond muziek -->
                <div class="banner">
                    <a href="index.php"><img class="hetlogo" src="FOTO/bannerfoto.png" alt="Logo"/></a>

                

                <div id="slider-container1">
                 <div class="wn_images"><ul>
                    <li><a href="index.php"><img class="sliderfoto" src="FOTO/Groepsfoto_2012.JPG" alt="Nature"/></a></li>
                    <li><a href="index.php"><img class="sliderfoto" src="FOTO/image-17.jpg" alt="Explore"/></a></li>
                    <li><a href="index.php"><img class="sliderfoto" src="FOTO/image-49.jpg" alt="Church"/></a></li>
                </ul>
                </div>
           </div>
          
        </div>
            
        <div class="nav">
            <img class="navafbeelding" src="FOTO/Navigatie.png">
                <div class="navmenu">
                    <ul>
                        <li><a href="index.php">Hoofdpagina</a></li>
                    </ul>

                    <ul>
                        <li><a href="Geschiedenis.php">Geschiedenis</a></li>                                
                            <ul>
                                <li><a href="">Evenement 1</a></li>
                                <li><a href="">Evenement 2</a></li>
                                <li><a href="">Evenement 3</a></li>
                                <li><a href="">Evenement 4</a></li>
                                <li><a href="">Evenement 5</a></li>
                            </ul>
                    </ul>
                    
                    <ul>
                        <li><a href="Agenda.php">Agenda</a></li>
                    </ul>
                    
                    <ul>
                        <li><a href="Personages.php">Spelerspagina</a></li>
                    </ul>
                      
                    <ul>
                        <li><a href="FotoboekMenu.php">Fotoboek</a></li>                                
                            <ul>
                                <li><a href="">Evenement 1</a></li>
                                <li><a href="">Evenement 2</a></li>
                                <li><a href="">Evenement 3</a></li>
                                <li><a href="">Evenement 4</a></li>
                                <li><a href="">Evenement 5</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li><a href="Contact.php">Contact</a></li>
                    </ul>

                    <?php

                    if(isset( $_SESSION['user_id'] ))
                        // kijkt of de gebruiker is ingelogd, zoja dan laat hij de dashboard knop zien
                    {
                            echo "<ul><li><a href=\"dashboard.php\">Dashboard</a></li></ul>";
                    }
                    ?>
                </div>    
                
                    <?php
                    // kijkt of de gebruiker is ingelogd, zoja dan laat hij de uitlog knop zien
                    if(!isset( $_SESSION['user_id'] ))
                    {
                        echo "<p class=\"menu2\"><a href=\"loginpage.php\">Inloggen</a></p>";
                    } else {
                        echo "<p class=\"menu2\"><a href=\"logout.php\">Uitloggen</a></p>";
                    }
                    ?>

        </div>
        </body>
    </html>