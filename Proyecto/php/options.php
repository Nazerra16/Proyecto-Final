

<?php
session_start();

if(!$_SESSION['usuario']){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Opciones - Lavadero de Autos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/options.css">
</head>
<body>
    <div class="opciones-cont">
        <h2 class="options-title">Opciones</h2>

        <button onclick="location.href='ingreso.php'" class="btn btn-oval">INGRESAR CLIENTE</button>
        <button onclick="location.href='history.php'" class="btn btn-oval">VER CLIENTES</button>
        <a href='logout.php' class="btn btn-oval">LOGOUT</a>

    </div>
</body>
</html>