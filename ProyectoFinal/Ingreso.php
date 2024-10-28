<?php
include 'bd.php';
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $patente = $_POST['patente'];

    // Inserta los datos en la tabla "clientes"
    $query = "INSERT INTO clientes (nombre, apellido, email, telefono, patente) VALUES ('$nombre', '$apellido', '$email', '$telefono', '$patente')";
    
    if ($conn->query($query) === TRUE) {
        echo "Cliente ingresado correctamente";
    } else {
        echo "Error al ingresar cliente: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingreso de Cliente</title>
</head>
<body>
    <h2>Ingreso de Cliente</h2>
    <form method="POST" action="Ingreso.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
        <br>
        <label for="patente">Patente:</label>
        <input type="text" id="patente" name="patente" required>
        <br>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
