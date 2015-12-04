<!DOCTYPE html>
<html>
    <head>
		<?php include 'head.php'; ?>
    </head>
    <body>
    	<header>
    		<?php include 'header.php' ?>
    	</header>

        <div class="info">
            <h2> Contact </h2>
           
            <form method="post" action='contact.php'>
            
            Datum: <br>
            <input type="text" name="datum" placeholder="01-01-0001">
                   </br>
            Naam :<br>
            <input type="text" name="naam" placeholder="naam">
                        <br>
            E-mail :<br>
            <input type="text" name="mail" placeholder="E-mail" >
             
                
                <br>
                <h3> schrijf hier u mail..</h3>
           <textarea rows="10" cols="40" name="comment" form="usrform">
schrijf text here...</textarea>
            
                <p>
                </p>    
            
                

                </br>
          
            <input type="submit" >
            </form>
           <?php
           
           

           echo "u naam is : ".$naam=$_post["naam"].
            "<br/>u maail is :". $mail=$_post["mail"] ;

           


           

           

           


           
          ?>       
        
        </div>
    </body>
</html>
