<!DOCTYPE html>
<html>
    <head>
    <?php include 'head.php'; ?>

    <!--[if IE]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- tip: een map op de pc met de fotos, de link naar die map in de database zetten -->

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
                <h2>Evenement</h2>
                <p>tekst enzo</p>
                <div class="gallery">
                    <ul>
                        <?php
                        try {
                        
                        $con = new PDO("mysql:host=localhost; dbname=lhh; port=3307", "root", "usbw");
                         $stmt = $con->prepare("SELECT * from fotoboek where eventnr='".$page."'");
                            $stmt->execute();
                            $fotos = $stmt->fetchAll();
                            if($page=="1") {
                            foreach ($fotos as $foto) {
                                print('<li><a class="fancybox" rel="group" href="'.$foto["url"].'" title="dal"><img src="'.$foto["url"].'" width="100" height="100" alt="dal"></a></li>');
                                }
                            }
                            elseif($page=="2")
                            foreach ($fotos as $foto) {
                                print('<li><a class="fancybox" rel="group" href="'.$foto["url"].'" title="dal"><img src="'.$foto["url"].'" width="100" height="100" alt="dal"></a></li>');
                                }
                            
                            
                        }
                        catch( Exception $e) {

                        }
                        ?>
                       <!--  <li><a class="fancybox" rel="group" href="" width="100" height="100"></a>
                        </li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>

                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>

                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>

                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li>
                        <li><a class="fancybox" rel="group" href="images/large/Evenement1/img7.jpg" title="dal"><img src="images/tn/Evenement1/img7.jpg" width="100" height="100" alt="dal"></a></li> -->
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