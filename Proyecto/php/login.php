<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Lavadero</title>
</head>
<body>
    <h1>DANG Alert</h1>
    <div>
        <form action="login.php" method="post" id="lavadoForm">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>
            <input type="submit" value="Ingresar">
        </form>
    </div>
</body>
</html>

<?php

include('bd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['usuario'];
    $password = $_POST['contraseña'];


    $sql = "SELECT * FROM empleados WHERE usuario='$user' AND contraseña='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        header("Location: homeempleados.php");
    } else {
        echo "<p>Usuario o contraseña incorrectos</p>";
    }
}

?>