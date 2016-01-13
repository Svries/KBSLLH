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
        <?php 
        require_once 'connection.php';
            // haalt het artikel op
            $query = $con->prepare("SELECT id, titel, bericht FROM text where titel = 'geschiedenis'");
            $query->execute();
            $artikel = $query->fetchAll();
            $con = NULL;

            foreach($artikel as $item) {
                print $item['bericht'];
            }
            if(isset( $_SESSION['user_id'] ))
                // kijkt of de user is ingelogd
                    {
                        if($_SESSION['user_type'] == 'admin')
                        // kijkt of de user een administrator is, zoja dan laat hij de knop bewerken zien
                        {
                            print("<td><a href=\"artiekelbewerk.php?id=" . $item["id"] . "\">Bewerken</a></td>");
                        }
                    }
    
        ?>

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
