<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/formulario.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Formulario de Información del Cliente</h1>
        <form action="clientes.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>
            
            <label for="email">Correo:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
            
            <label for="patente">Patente del Vehículo:</label>
            <input type="text" id="patente" name="patente" required>
            
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>

<?php

include_once('bd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $patente = $_POST['patente'];

    // Preparar y ejecutar la consulta SQL
    $sql = "INSERT INTO clientes (nombre, apellido, email, telefono, patente)
            VALUES ('$nombre', '$apellido', '$email', '$telefono', '$patente')";

    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>