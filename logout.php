<?php
<<<<<<< HEAD
// start de sessie
session_start();

//  Ontzet alle variabeles
session_unset();

// Vernietigt de sessie
session_destroy();

// Stuurt de gebruiker terug naar de login pagina
header ('location: loginpage.php');
?>
=======
// Begin the session
session_start();

// Unset all of the session variables.
session_unset();

// Destroy the session.
session_destroy();

header ('location: loginpage.php');
?>
>>>>>>> origin/master
