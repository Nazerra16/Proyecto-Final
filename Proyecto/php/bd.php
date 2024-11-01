
<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "proyectofinal";

$conn = new mysqli(hostname: $host, username: $user, password: $password, database: $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
