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
                <div class="banner">
                    <img class="hetlogo" src="FOTO/bannerfoto.jpg" alt="Logo"/>

                

                <div id="slider-container1">
                 <div class="wn_images"><ul>
                    <li><a href="#"><img class="sliderfoto" src="FOTO/Groepsfoto_2012.JPG" alt="Nature"/></a></li>
                    <li><a href="#"><img class="sliderfoto" src="FOTO/image-17.jpg" alt="Explore"/></a></li>
                    <li><a href="#"><img class="sliderfoto" src="FOTO/image-49.jpg" alt="Church"/></a></li>
                </ul>
                </div>
           </div>
          
        </div>
            
        <div class="nav">
                <div class="navmenu">
                    <ul>
                        <li><a href="index.php">Hoofdpagina</a></li>
                    </ul>

                    <ul>
                        <li><a href="info.php">Geschiedenis</a></li>                                
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
                    {
                            echo "<ul><li><a href=\"dashboard.php\">Administrator</a></li></ul>";
                    }
                    ?>
                </div>    
                
                    <?php
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