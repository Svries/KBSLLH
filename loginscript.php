<?php

/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['user_id'] )) {

    $message = 'Users is already logged in';
}
/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['email'], $_POST['password'])) {
	$message = 'Voer een geldig naam of wachtwoord in!';
} 

elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4) {
    $message = 'Incorrect Length for Password';
}

else {

    /*** if we are here the data is valid and we can insert it into database ***/
    $email = $_POST['email'];
    $password = $_POST['password'];

    try
    {
        require_once 'connection.php';

        /*** prepare the select statement ***/
        $stmt = $con->prepare("SELECT id, email, password FROM gebruiker 
                    WHERE email = email AND password = password");

        /*** bind the parameters ***/
        $stmt->bindParam('email', $email, PDO::PARAM_STR);
        $stmt->bindParam('password', $password, PDO::PARAM_STR);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $user_id = $stmt->fetchColumn();

        /*** if we have no result then fail boat ***/
        if($user_id == false)
        {
                $message = 'Login Failed';
        }
        /*** if we do have a result, all is well ***/
        else
        {
                /*** set the session user_id variable ***/
                $_SESSION['user_id'] = $user_id;

                /*** tell the user we are logged in ***/
                $message = 'You are now logged in';
        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>

<html>
<head>
<title>PHPRO Login</title>
</head>
<body>
<p><?php echo $message; ?>
</body>
</html>