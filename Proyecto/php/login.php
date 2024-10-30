<?php
include 'bd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    

    //Consulta SQL para verificar las credenciales con las de la BD
    
    $query = "SELECT * FROM empleados WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
    $result = $conn->query($query);
    
    if ($result->num_rows == 1) {           //Acá se crea la sesión del usuario y se lo redirige
        $_SESSION['usuario'] = $usuario;
        header("Location: options.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<div class="form-container">
        <div class="alert-sign">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
    <h2 class="form-title">DANG Aviso - Lavadero</h2>



                                        <!--Si "$error" existe muestra un mensaje de error-->
    <?php if (isset($error)) { ?>
        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
    <?php } ?>



    <form method="POST" action="login.php">
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" required>
        </div>

        <div class="mb-3">
            <label for="contraseña" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contraseña" name="contraseña" required>
        </div>

        <button type="submit" class="btn btn-custom w-100">Ingresar</button>

    </form>
</div>

            <!-- Ícono de Alerta -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

            <!-- Elementos dinámicos para las interfaces -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
