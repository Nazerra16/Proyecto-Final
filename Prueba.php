<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANG Alert - Lavadero de Autos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e0f7fa; /* Color azul claro, recuerda el agua */
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            border-left: 10px solid #ffeb3b; /* Borde amarillo para simular la señal de alerta */
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
        <h2 class="form-title">DANG Alert - Lavadero</h2>
        <form>
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" placeholder="Ingrese su usuario">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom">Ingresar</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
