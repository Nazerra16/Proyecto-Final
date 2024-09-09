<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Clientes - Lavadero de Autos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/history.css">
</head>
<body>
    <div class="back-button">
        <a href="options.php" class="btn btn-custom">Volver al inicio</a>
    </div>
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
