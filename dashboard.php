<?php

// begin de sessie
session_start();
// kijkt of er een sessie is, zoniet word je teruggestuurd naar de loginpagina
if(!isset($_SESSION['user_id']))
{
    header ('location: loginpage.php');
}
else
{
    try
    {
        require_once 'connection.php';
        /*** Bereid de query voor ***/
        $stmt = $con->prepare("SELECT * FROM gebruiker 
            WHERE id = :id");

        /*** bind de parameters ***/
        $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
        /*** Voert het hiervoor bereide statement uit***/
        $stmt->execute();

        /*** check for a result ***/
        $spelersnaam = $stmt->fetchColumn(8);
        /*** Als er nee uitkomt is er iets fout gegaan ***/
        if($spelersnaam == false)
        {
            $message = 'Access Error';
        }
        else
        {
            $message = 'Welkom '.$spelersnaam;
        }

    }
    catch (Exception $e)
    {
        /*** als je hier komt is eriets fout in de database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>

<html>
<head>
    <?php include 'head.php'; ?>
</head>
<body>
<header>
    <?php include 'header.php';?>  
</header>
<div class="info">
    <?php 
    echo $message . "<br>";  

    if(isset($_SESSION['user_id'])){ 
        if($_SESSION['user_type'] = "admin") {
                echo "<a href=\"spelersoverzicht.php\">Spelersoverzicht</a><br>";
                echo "<a href=\"materiaaloverzicht.php\">Materiaaloverzicht</a><br>";
                echo "<a href=\"materiaalperspeler.php\">Materiaal per speler</a><br>";
        }
                echo "<a href=\"Inschrijf.php\">Inschrijven markt</a><br>";
                echo "<a href=\"Nieuws.php\">Nieuws</a><br>";
                echo "<a href=\"reset_password.php\">Wachtwoord wijzigen</a><br>";
    }
    ?>
</body>
</html>