<?php
require_once("connection.php");
require_once("Nieuws.php");
$sql = "DELETE FROM nieuws(titel, bericht, datum) WHERE datum = name ";
$stmt = $con->prepare($sql);
$stmt->execute();
echo "Uw nieuwsbericht is verwijderd.";

//$datum = $_POST['datum'];
            
           // $sql = "DELETE employee ". "WHERE emp_id = $emp_id" ;