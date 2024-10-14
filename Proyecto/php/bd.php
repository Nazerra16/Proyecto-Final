<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "proyectofinal";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn -> connect_error){
    die("Conexión fallida: " . $conn -> connect_error);
}

$query = "SELECT * FROM clientes";
$resultado = $conn->query($query);

$data = array();
while ($row = $resultado->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode(array("data" => $data));

$conn->close();

?>