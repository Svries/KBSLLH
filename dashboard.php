<?php

/*** begin the session ***/
session_start();

if(!isset($_SESSION['user_id']))
{
    $message = 'You must be logged in to access this page';
}
else
{
    try
    {
        require_once 'connection.php';
        /*** prepare the insert ***/
        $stmt = $con->prepare("SELECT email FROM gebruiker 
        WHERE id = :id");

        /*** bind the parameters ***/
        $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $email = $stmt->fetchColumn();

        /*** if we have no something is wrong ***/
        if($email == false)
        {
            $message = 'Access Error';
        }
        else
        {
            $message = 'Welcome '.$email;
        }
    }
    catch (Exception $e)
    {
        /*** if we are here, something is wrong in the database ***/
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
    <?php echo $message; ?>
</div>
</body>
</html>