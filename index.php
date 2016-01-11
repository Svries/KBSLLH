<!DOCTYPE html>
<html>
    <head>
    	<?php include 'head.php'; ?>
    </head>
    <body>
		<header>
			<?php include 'header.php'; ?>
		</header>
        <div class="info">
        <?php 
        require_once 'connection.php';
            // haalt het artikel op
            $query = $con->prepare("SELECT id, titel, bericht FROM text where titel = 'home'");
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
        </div>
        
    </body>
</html>
