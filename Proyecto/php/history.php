<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Clientes - Lavadero de Autos</title>
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
        .history-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            width: 100%;
            border-left: 10px solid #ffeb3b; /* Borde amarillo para la señal de alerta */
        }
        .history-title {
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
            color: #0277bd; /* Azul profundo para el texto */
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-custom {
            background-color: #0288d1; /* Azul lavado de autos */
            color: white;
            font-weight: bold;
        }
        .btn-custom-danger {
            background-color: #ff5722; /* Naranja para el botón de finalizar lavado */
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
    <div class="history-container">
        <div class="alert-sign">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <h2 class="history-title">Historial de Clientes</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Patente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Juan</td>
                    <td>Pérez</td>
                    <td>juan.perez@ejemplo.com</td>
                    <td>+54 9 1234 5678</td>
                    <td>ABC123</td>
                    <td>
                        <button class="btn btn-custom btn-sm">Iniciar lavado</button>
                        <button class="btn btn-custom-danger btn-sm">Finalizar lavado</button>
                    </td>
                </tr>
                <tr>
                    <td>Juan</td>
                    <td>Pérez</td>
                    <td>juan.perez@ejemplo.com</td>
                    <td>+54 9 1234 5678</td>
                    <td>ABC123</td>
                    <td>
                        <button class="btn btn-custom btn-sm">Iniciar lavado</button>
                        <button class="btn btn-custom-danger btn-sm">Finalizar lavado</button>
                    </td>
                </tr>
                <tr>
                    <td>Juan</td>
                    <td>Pérez</td>
                    <td>juan.perez@example.com</td>
                    <td>+54 9 1234 5678</td>
                    <td>ABC123</td>
                    <td>
                        <button class="btn btn-custom btn-sm">Iniciar lavado</button>
                        <button class="btn btn-custom-danger btn-sm">Finalizar lavado</button>
                    </td>
                </tr>
                <!-- Más filas de clientes -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
