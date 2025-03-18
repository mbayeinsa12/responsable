<?php
$servername = "localhost";
$username = "root"; 
$password = "mbaye2005";
$dbname = "projet_reservation";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}
?>
