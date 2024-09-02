<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Cliente - Lavadero de Autos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e0f7fa; /* Azul claro como el agua */
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            border-left: 10px solid #ffeb3b; /* Borde amarillo para la señal de alerta */
            max-width: 800px;
            width: 100%;
        }
        .form-title {
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
            color: #0277bd; /* Azul profundo para el texto */
        }
        .btn-custom {
            background-color: #0288d1; /* Azul lavado de autos */
            color: white;
            font-weight: bold;
        }
        .alert-sign {
            display: block;
            text-align: center;
            font-size: 24px;
            color: #ff5722; /* Naranja de señal de alerta */
            margin-bottom: 15px;
        }
        .alert-sign i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="alert-sign">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <h2 class="form-title">Datos del Cliente</h2>
        <form action="ingreso.php" method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese su nombre" required>
                </div>
                <div class="col">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Ingrese su apellido" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Ingrese su correo" required>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" name="telefono" class="form-control" id="telefono" placeholder="Ingrese su teléfono" required>
                </div>
                <div class="col">
                    <label for="patente" class="form-label">Patente</label>
                    <input type="text" name="patente" class="form-control" id="patente" placeholder="Ingrese la patente" required>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom" required>Enviar</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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