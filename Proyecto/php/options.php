<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones - Lavadero de Autos</title>
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
        .options-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            border-left: 10px solid #ffeb3b; /* Borde amarillo para la señal de alerta */
            text-align: center;
        }
        .options-title {
            margin-bottom: 30px;
            font-weight: bold;
            text-align: center;
            color: #0277bd; /* Azul profundo para el texto */
        }
        .btn-oval {
            background-color: #0288d1; /* Azul lavado de autos */
            color: white;
            font-weight: bold;
            padding: 20px 40px;
            border-radius: 50px; /* Botón ovalado */
            font-size: 20px;
            margin: 10px 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="options-container">
        <h2 class="options-title">Opciones</h2>
        <button onclick="window.location.href='ingreso.php'" class="btn btn-oval">INGRESAR CLIENTE</button>
        <button onclick="window.location.href='history.php'" class="btn btn-oval">VER CLIENTES</button>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
