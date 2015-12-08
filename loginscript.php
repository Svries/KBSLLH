<?php

/*** Start de sessie ***/
session_start();

/*** Kijkt of er al een sessie bestaat ***/
if(isset( $_SESSION['user_id'] )) {

    $message = 'Gebruiker is al ingelogd!';
}
/*** Checkt of het wachtwoord en gebruikersnaam zijn ingevuld ***/
if(!isset( $_POST['email'], $_POST['password'])) {
	$message = 'Voer een geldig naam of wachtwoord in!';
} 

else {

    /*** Variabelen aanmaken en password hashen ***/
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = sha1($password);
    try
    {
        require_once 'connection.php';

        /*** Query ***/
        $stmt = $con->prepare("SELECT id, email, password FROM gebruiker 
                    WHERE email = :email AND password = :password");

        /*** Bind de parameters aan elkaar ***/
        $stmt->bindParam('email', $email, PDO::PARAM_STR);
        $stmt->bindParam('password', $password, PDO::PARAM_STR);

        /*** Voert het hierboven gemaakte statement uit ***/
        $stmt->execute();

        /*** Kijkt of er een resultaat is ***/
        $user_id = $stmt->fetchColumn();

        /*** Als er geen resultaat is, foute gegevens ***/
        if($user_id == false)
        {
               header ('location: loginpage.php');
        }
        else
        {
                /*** De sessie in  een variabele zetten ***/
                $_SESSION['user_id'] = $user_id;

                /*** Succesvol ingelogd ***/

                header ('location: dashboard.php');
        }


    }
    catch(Exception $e)
    {
        /*** Database fout ***/
        $message = 'Er is iets fout gegaan..."';
    }
}
?>

<html>
<head>
<title>PHPRO Login</title>
</head>
<body>
<?php echo $message; ?>
</body>
</html>