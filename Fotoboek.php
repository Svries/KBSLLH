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
        <?php if (isset ( $_GET ['page'] )) {
        $page = $_GET ['page'];
    } else {
        $page = "Fotoboekmenu.php";
    }
    ?>

        <div class="container">
            <section>

                <!-- Haalt de evenement naam en omschrijving uit de database en print deze per album om de pagina -->
                <?php $con = new PDO("mysql:host=localhost; dbname=lhh; port=3307", "root", "usbw");
                         $stmt = $con->prepare("SELECT * from evenement where id='".$page."'");
                            $stmt->execute();
                            $omschrijving = $stmt->fetchAll();
                foreach($omschrijving as $omsc) {
                print("<h2>".$omsc["naam"]."</h2>");
                print("<p>".$omsc["omschrijving"]."</p>");
            }
                ?>
                <div class="gallery">
                    <ul>
                        <?php
                        try {
                        //Voert 2 queries uit waarvan eentje bepaalt hoeveel albums er zijn en welke fotos hij moet laden uit de database
                        $con = new PDO("mysql:host=localhost; dbname=lhh; port=3307", "root", "usbw"); //Connect met de database
                        $stmt = $con->prepare("SELECT count(id) FROM evenement"); //Telt de hoeveelheid evenementen
                        $stmt->execute(); //voert de query uit
                        $paginas = $stmt->fetchAll(); // haalt de rows op
                         $stmt = $con->prepare("SELECT * from fotoboek where eventnr='".$page."'"); //haalt alles op waar de pagina gelijk is aan het evenementnr
                            $stmt->execute(); // voert de query uit
                            $fotos = $stmt->fetchAll(); //Slaat resultaten op in een array
                        foreach($paginas as $pagina) {     // voert deze code uit voor elk evenement
                            foreach ($fotos as $foto) { //voert deze code uit voor elke foto in de fotoboek tabel waar het pagina nr gelijk is aan de evenementID
                                print('<li><a class="fancybox" rel="group" href="'.$foto["url"].'" title="dal"><img src="'.$foto["url"].'" width="100" height="100" alt="afb"></a></li>');
                                }
                            }
                        }
                        catch( Exception $e) { //Print errors

                        }
                        ?>
                    </ul>
                </div>
            </section>

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

        <style type="text/css">
        article, aside, figure, footer, header, hgroup, menu, nav, section {
            display: block;
        }

        body {
            font-family:arial;
        }

        .container {
            width:1000px;
            margin:60px auto 0;
            text-align:center;
        }

        .gallery {
            margin:auto;
            text-align:center;
        	width:100%;
        	margin:auto;
            text-align: center
        }

        #content {
            background:grey;            
            overflow:hidden;
        }

        .gallery ul {
            list-style:none;
        }

        .gallery li {
            margin:10px;
        	display: inline-block;
        	margin:10px;
        }
        
        .gallery img {
            display:block;
            padding:5px;
            background:#42517f;
            border:1px solid #99adeb;
            box-shadow:1px 1px 2px #000;
        }

        .gallery img:hover {
            border:1px solid #fff;
        }




        </style>
    </body>
</html>