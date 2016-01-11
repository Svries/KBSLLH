<!DOCTYPE html>
<html>
    <head>
    <?php include 'head.php'; ?>

    <!--[if IE]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>  <!-- ................ HOVER CODE 1/2 -->
    <script src="http://static.tumblr.com/iuw14ew/VSQma1786/jquery.style-my-tooltips.js"></script>
    <script>
    (function($){
    $(document).ready(function(){
    $("a[title]").style_my_tooltips({
    tip_follows_cursor:true,
    tip_delay_time:90,
    tip_fade_speed:300,
    attribute:"title"
    });
    });
    })(jQuery);
    </script>     <!-- source: http://sammywinchester.org/post/71642614913/hi-marcie-i-was-wondering-is-there-anything -->

     
    </head>
    <body>

    </head>
    <body>
        <header>
            <?php include 'header.php'; ?>
        </header>
        <div class="info">

        <div class="container">
            <section>
                <div class="gallery">
                    <ul>
                        <?php
                        try {
                        // pakt elk evenement uit de database met alle bijbehorende data
                        $con = new PDO("mysql:host=localhost; dbname=lhh; port=3307", "root", "usbw");
                         $stmt = $con->prepare("SELECT * from evenement");
                            $stmt->execute();
                            $albums = $stmt->fetchAll();
                            foreach($albums as $album) { //voor elk evenement geneert hij een album pagina die de naam uit de database overneemt, doorlinkt naar de bijbehorende pagina en de goede coverafbeelding toewijst.
                                print('<li><a title="'.$album["naam"].'" href="Fotoboek.php?page='.$album["id"].'"> <img src="'.$album["eventcover"].'" width="200" height="200" alt="dal"> </a></li>');
                            }
                            
                        }
                        catch( Exception $e) {
                        }
                        ?>
                        <!-- <li><a title="EVENEMENT NAAM" href="Fotoboek.php?page=1"> <img src="images/tn/img8.jpg" width="200" height="200" alt="dal"> </a></li> -->
                    </ul>
                </div>
            </section>

        </div>


        </div>
        


        <style type="text/css">
        #s-m-t-tooltip { /* ........................................................................ HOVER CODE 2/2 */
        max-width:300px;
        opacity:1;
        padding:3px 4px 5px 4px;
        margin:-35px 0px -10px 30px;
        background-color:#fff; /* change the background color */
        border:0.5px solid #5D7B93; /* change the border color */
        font-family:'cambria'; /* change the font */
        font-size:9px; /* change the font size */
         letter-spacing:2px; /* change the letter spacing */
        text-transform:uppercase; /* can be uppercase, lowercase, none*/
        color:#5D7B93; /* change the text color */
        z-index:1000;
        }

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