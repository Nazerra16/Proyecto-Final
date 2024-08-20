<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "trabajofinal";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error){
    die("conexion fallida: " . $conn->connect_error);
}

?>