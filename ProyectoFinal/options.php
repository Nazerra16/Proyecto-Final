<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Opciones</title>
</head>
<body>
    <h2>Opciones</h2>
    <button onclick="window.location.href='ingreso.php'">Ingresar Cliente</button>
    <button onclick="window.location.href='history.php'">Ver Cliente</button>
</body>
</html>

