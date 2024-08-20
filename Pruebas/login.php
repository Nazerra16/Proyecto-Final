<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Formulario de Ingreso</h2>
    <form action="login.php" method="post">
        <label for="user">Usuario:</label>
        <input type="text" id="user" name="user" required><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>

<?php

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $password = $_POST['password']; // Cifrar la contraseña


    $sql = "SELECT * FROM usuarios WHERE user='$user' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        header("Location: welcome.php");
    } else {
        echo "<p>Usuario o contraseña incorrectos</p>";
    }
}

?>