<?php

/*** Start de sessie ***/
session_start();

/*** Kijkt of er al een sessie bestaat ***/
if(isset( $_SESSION['user_id'] )) {

    $message = 'Gebruiker is al ingelogd!';
}
/*** Checkt of het wachtwoord en gebruikersnaam zijn ingevuld ***/
if(!isset( $_POST['email'], $_POST['password'])) {
	$message = 'Voer een geldige naam of wachtwoord in!';
} 

else {

    /*** Variabelen aanmaken en password hashen ***/
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

    $password = hash('sha1', $salt.$password);
    

    try
    {
        require_once 'connection.php';

        /*** Query ***/
        $stmt = $con->prepare("SELECT * FROM gebruiker 
                    WHERE email = :email AND password = :password");

        $stmt2 = $con->prepare("SELECT * FROM gebruiker 
                    WHERE email = :email AND password = :password");
        /*** Bind de parameters aan elkaar ***/
        $stmt->bindParam('email', $email, PDO::PARAM_STR);
        $stmt->bindParam('password', $password, PDO::PARAM_STR);

        $stmt2->bindParam('email', $email, PDO::PARAM_STR);
        $stmt2->bindParam('password', $password, PDO::PARAM_STR);
        /*** Voert het hierboven gemaakte statement uit ***/
        $stmt->execute();
        $stmt2->execute();

        /*** Kijkt of er een resultaat is ***/
        $user_id = $stmt->fetchColumn();
        $user_type = $stmt2->fetchColumn(1);
        /*** Als er geen resultaat is, foute gegevens ***/
        if($user_id == false)
        {
               header ('location: loginpage.php');
        }
        else
        {
                /*** De sessie in  een variabele zetten ***/
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_type'] = $user_type;

                /*** succes ***/
                header ('location: dashboard.php');
        }


    }
    catch(Exception $e)
    {
        /*** Database fout ***/
        $message = 'Er is iets fout gegaan..."';
    }
    $con = NULL;
}
?>