<?php

/*** begin the session ***/
session_start();

if(!isset($_SESSION['user_id']))
{
    $message = 'Je moet ingelogd zijn om deze pagina kunnen te bekijken';
}
else
{
    try
    {
        require_once 'connection.php';
        /*** Bereid de query voor ***/
        $stmt = $con->prepare("SELECT spelersnaam FROM gebruiker 
            WHERE id = :id");

        /*** bind de parameters ***/
        $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
        /*** Voert het hiervoor bereide statement uit***/
        $stmt->execute();

        /*** check for a result ***/
        $spelersnaam = $stmt->fetchColumn();
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
    <?php echo $message; ?><br>

    <a href="spelersoverzicht.php">Spelersoverzicht</a> <br>
    <a href="materiaaloverzicht.php">Materiaaloverzicht</a> <br> 
    <a href="materiaalperspeler.php">Materiaal per speler</a>  <br>
    <a href="inschrijf.php">Inschrijven evenementen</a>     
</div>
</body>
</html>