<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Estado del Auto - Lavadero de Autos</title>
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
            border-left: 10px solid #ffeb3b; /* Borde amarillo */
            max-width: 800px;
            width: 100%;
        }
        .form-title {
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
            color: #0277bd; /* Azul profundo */
        }
        .btn-custom {
            background-color: #0288d1;
            color: white;
            font-weight: bold;
        }
        .alert-sign {
            display: block;
            text-align: center;
            font-size: 24px;
            color: #ff5722;
            margin-bottom: 15px;
        }
        .alert-sign i {
            margin-right: 10px;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .status-button {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            font-size: 18px;
            font-weight: bold;
            margin: 10px;
        }
        .preparando {
            background-color: #fbc02d; /* Amarillo */
        }
        .iniciado {
            background-color: #0288d1; /* Azul */
        }
        .finalizado {
            background-color: #4caf50; /* Verde */
        }
        .status-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="back-button">
        <a href="index.html" class="btn btn-custom">Volver al inicio</a>
    </div>

    <div class="form-container">
        <div class="alert-sign">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <h2 class="form-title">Cambio de Estado del Auto</h2>
        <form action="cambio_estado.php" method="post">
            <div class="mb-3">
                <label for="patente" class="form-label">Seleccione la Patente</label>
                <select name="patente" id="patente" class="form-select" required>
                    <!-- Opciones de patentes serán generadas dinámicamente desde la base de datos -->
                    <option value="">Seleccionar...</option>
                    <option value="ABC123">ABC123</option> <!-- Ejemplo -->
                    <option value="XYZ789">XYZ789</option> <!-- Ejemplo -->
                </select>
            </div>

            <div class="status-container">
                <button type="submit" name="estado" value="Preparando el Lavado" class="btn btn-custom status-button preparando">
                    Preparando
                </button>
                <button type="submit" name="estado" value="Lavado Iniciado" class="btn btn-custom status-button iniciado">
                    Iniciado
                </button>
                <button type="submit" name="estado" value="Lavado Finalizado" class="btn btn-custom status-button finalizado">
                    Finalizado
                </button>
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
// Conectar a la base de datos
$conexion = new mysqli("localhost", "usuario", "contraseña", "nombre_base_datos");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener las patentes
$sql = "SELECT patente FROM autos";
$resultado = $conexion->query($sql);
?>

<select name="patente" id="patente" class="form-select" required>
    <option value="">Seleccionar...</option>
    <?php
    // Llenar el select con las patentes obtenidas de la base de datos
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<option value='" . $fila['patente'] . "'>" . $fila['patente'] . "</option>";
        }
    } else {
        echo "<option value=''>No hay autos registrados</option>";
    }
    ?>
</select>

<?php
// Cerrar la conexión
$conexion->close();
?>
