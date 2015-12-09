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
            
           
            Naam :<br>
            <input type="text" name="naam" placeholder="naam">
            <p><?php
            if (isset($errors["naam"])) echo $errors["naam"]; 
            ?>
            </p>
            E-mail :<br>
            <input type="text" name="email" placeholder="E-mail" >
             
                
                <br>
                <h3> schrijf hier u mail..</h3>
           <textarea rows="10" cols="40" name="comment" form="usrform">
schrijf text here...</textarea>
            
                <p>
                </p>    
            
                

                </br>
          
           <input type="Submit" value="Submit">
            </form>
           <?php

           require 'connection.php';

           //  $dbhost = "localhost";
           // $dbuser = "root";
           // $dbpass = "";
           // $db = "lhh";

           // $conn = mysql_connect($dbhost.$dbuser.$dbpass);
           // mysql_select_db($db)

           // $query = "select * FROM contact";
           // $result = mysql_query($query);

           // // // MAG NIET LEEG
           // // NE MAIL MOET @ IN ZITTEN
      



           if(isset($_POST["Submit"]))
           {

           }

           $errors=array();
           
           if (empty($_POST["naam"]))
           { //deze gaat via de error in begin
            echo $errors["naam"] = "Je naam is kan niet leeg zijn" ;
             //laat de tekst niet zien?
            }

            if (empty($_POST["mail"]))
           { //deze gaat via de error in begin
                echo "<br/>"; 
                echo $errors["naam"] = "Je mail kan niet leeg zijn " ;
           }

          
          if (isset($_POST["Submit"])) {
           // op toevoegen geklikt, nummer bestaat en nummer is niet leeg
         $query = $con->prepare("INSERT INTO contact(naam) VALUES(?)");
         $query->execute(array($_POST["naam"]));
          }  

          // $query = $con->prepare("SELECT * FROM gebruiker");
          // $query->execute();
          // $gebruikers = $query->fetchAll();
          // $con = NULL;

       
           

        if (count($errors)==0) 
        { 
            echo "succes";


        }

       // // tijd
       

           


           

           

           


           
          ?>       
        
        </div>
    </body>
</html>


