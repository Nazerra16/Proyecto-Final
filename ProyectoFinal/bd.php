<?php
$host = "localhost";
$user = "root"; // Cambia estos valores si tienes otros datos de usuario
$password = "";
$dbname = "proyectofinal";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
