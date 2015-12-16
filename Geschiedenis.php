<!DOCTYPE html>
<html>
    <head>
		<?php include 'head.php'; ?>

    <!--[if IE]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->



    </head>
    <body>
        <header>
        	<?php include 'header.php'; ?>
        </header>
        <div class="info">
            
            <h2>De Hanze-geschiedenis van Harderwijk</h2>
            
            <div class="vakgeschiedenis">
                <div class="tekstvakgeschiedenis">
                    In het begin van de 13e eeuw kwam Harderwijk in het bezit van stadsrechten. 
                    De ligging aan de Zuiderzee maakte de stad een ideaal handelsknooppunt en een interessante stad voor het Hanzeverbond, 
                    dat aan het einde van de 13e eeuw werd opgericht. 
                    Samen met andere steden in de omgeving, zoals Deventer, Zutphen, Arnhem en Nijmegen werd het Gelders Hanzeverbond gevormd, 
                    dat op zich weer deel uitmaakte van de band van Nederlandse Hanzesteden.
                    De invloed van en in het Hanzeverbond, is ook gezien het magere achterland van Harderwijk niet erg groot geweest.
                    
                </div> 
            
                <div class='hardewijk'>
                    <a class="fancybox" rel="group" href="images/1952.jpg"><img src="/images/1952.jpg" width="300,5" height="223"></a>
                </div>
            </div>

            <h2>De jongere geschiedenis</h2>

            <div class="vakgeschiedenis">
                <div class="tekstvakgeschiedenis">
                    In de jongere geschiedenis van Harderwijk zijn met name de periode van het werfdepot tbv de Overzeese gebiedsdelen het noemen waard.
                    In het begin van de 20e eeuw werd Harderwijk een garnizoensstad, nadat het werfdepot was gesloten. Na het afsluiten van de Zuiderzee 
                    verdween ook de visserij goeddeels uit Harderwijk en gingen vissers zich op andere inkomstenbronnen toeleggen.

                    
                </div> 
            
                <div class='hardewijk'>  
                    <a class="fancybox" rel="group" href="images/1952.jpg"><img src="/images/1952.jpg" width="300,5" height="223"></a>
                </div>
            </div>
        </div>




        <!-- Add jQuery library -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <!-- Add fancyBox -->
        <link rel="stylesheet" href="source/jquery.fancybox.css" type="text/css" media="screen" />
        <script type="text/javascript" src="source/jquery.fancybox.pack.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".fancybox").fancybox();
            });
        </script>


    </body>
</html>
