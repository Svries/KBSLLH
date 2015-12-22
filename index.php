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
            $query = $con->prepare("SELECT id, titel, bericht FROM text where id = 1");
            $query->execute();
            $artikel = $query->fetchAll();
            $con = NULL;

            foreach($artikel as $item) {
                print $item['titel'];
                print $item['bericht'];
            }
            if(isset( $_SESSION['user_id'] ))
                    {
                     print("<td><a href=\"artiekelbewerk.php?id=" . $item["id"] . "\">Bewerken</a></td>");
                    }
    
        ?>
        </div>
        
    </body>
</html>
