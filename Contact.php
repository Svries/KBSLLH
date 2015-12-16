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
           
            <form name="contactform" method="post" action="">
 
<table width="450px">
 
<tr>
 
 <td valign="top">
 
  <label for="Voornaam">Voornaam *</label>
 
 </td>
 
 <td valign="top">
 
  <input  type="text" name="Voornaam" maxlength="50" size="30">
 
 </td>
 
</tr>
 
<tr>
 
 <td valign="top">
 
  <label for="last_name">Achternaam *</label>
 
 </td>
 
 <td valign="top">
 
  <input  type="text" name="last_name" maxlength="50" size="30">
 
 </td>
 
</tr>
 
<tr>
 
 <td valign="top">
 
  <label for="email">Email Address *</label>
 
 </td>
 
 <td valign="top">
 
  <input  type="text" name="email" maxlength="80" size="30">
 
 </td>
 
</tr>
 
<tr>
 
 
 
 </td>
 
 <td valign="top">
 </td>
 </tr>
 <tr>
 <td valign="top">
 <label for="comments">Bericht *</label>
 </td>
 <td valign="top">
 <textarea  name="comments" maxlength="1000" cols="25" rows="8"></textarea>
 </td>
 </tr>
<tr>
 
 <td colspan="2" style="text-align:center">
 
  <input type="Submit" value="Submit">   
 
 </td>
 
</tr>
 
</table>
 
</form>
            
            
<?php
  
  if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "tomvandenbrand@gmail.com";
 
    $email_subject = "kees";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "De gegevens die ingvuld zijn kloppen niet, ";
 
        echo "de volgende dingen kloppen niet.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Vul het opnieuw in.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['Voornaam']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['comments'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $Voornaam = $_POST['Voornaam']; // required
 
    $last_name = $_POST['last_name']; // required
 
    $email_from = $_POST['email']; // required
    
    $comments = $_POST['comments']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'Je is geen geldig e-mail adress.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$Voornaam)) {
 
    $error_message .= 'Je voornaam is niet geldig.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'je achternaam is niet geldig.<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'Het bericht is niet ingvuld.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Voornaam: ".clean_string($Voornaam)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
     $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
 
 
<?php
 
}
 


       //     // require 'connection.php';
       //     // define('dbhost', 'localhost');
       //     // define('', '');
       //     define('db_name', 'connection.php');
       //     define('DB_USER', 'root');
       //     define('DB_PASSWORD', 'usbw');
       //     define('DB_HOST', 'localhost');

       //     $link = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD)

       //     if (!$link){die(k)}
           
           
           

       //     //  $dbhost = "localhost";
       //     // $dbuser = "root";
       //     // $dbpass = "usbw";
       //     // $db = "lhh";

       //     // $conn = mysql_connect($dbhost.$dbuser.$dbpass);
       //     // mysql_select_db($db)

           
       //     // // MAG NIET LEEG
       //     // NE MAIL MOET @ IN ZITTEN
      
        
       //     if(isset($_POST["Submit"]))
       //     {
       //      $mysql_connect

       //     }

       //     $errors=array();
           
       //     if (empty($_POST["naam"]))
       //     { //deze gaat via de error in begin
       //      echo $errors["naam"] = "Je naam is kan niet leeg zijn" ;
       //       //laat de tekst niet zien?
       //      }

       //    if (empty($_POST["mail"]))
       //     { //deze gaat via de error in begin
       //          echo "<br/>"; 
       //          echo $errors["mail"] = "Je mail kan niet leeg zijn " ;
       //     }

          
          
       //    // $query = $con->prepare("SELECT * FROM gebruiker");
       //    // $query->execute();
       //    // $gebruikers = $query->fetchAll();
       //    // $con = NULL;

       
           

       //    if (count($errors)==0) 
       //  { 
       //      echo "succes";


       //  }

       // // if (isset($_POST["Submit"])) {
       // //     // op toevoegen geklikt, nummer bestaat en nummer is niet leeg
       // //   $query = $con->prepare("INSERT INTO contact(naam) VALUES(?)");
       // //   $query->execute(array($_POST["naam"]));
       // //    }  

       

          


           

           

           


           
          ?>       
        
        </div>
    </body>
</html>


