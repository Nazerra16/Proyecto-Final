<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #4bc3fc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .dashboard-container {
            background-color: #f3fbff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-left: 10px solid #ffeb3b;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .nav-link {
            color: #333;
        }

        .nav-link:hover {
            color: #4bc3fc;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">DANG Aviso</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="dashboard-container">
            <p>Bienvenido, <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Usuario'; ?></p>
            <p class="text-center">Selecciona una opción del menú para gestionar los datos.</p>
            <div class="d-flex justify-content-center mt-4">
                <a href="Clientes/indexClientes.php" class="btn btn-primary me-2">Gestionar Clientes</a>
                <a href="Empleados/indexEmpleados.php" class="btn btn-success">Gestionar Empleados</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>