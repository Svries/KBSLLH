<?php
// start de sessie
session_start();

//  Ontzet alle variabeles
session_unset();

// Vernietigt de sessie
session_destroy();

// Stuurt de gebruiker terug naar de login pagina
header ('location: loginpage.php');
?>
