<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DANG Aviso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4bc3fc;
            --hover-color: #3ab1e8;
        }

        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--hover-color));
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #e9ecef !important;
        }

        .dashboard-container {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .dashboard-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #eee;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            transition: all 0.3s ease;
            height: 100%;
            background: linear-gradient(145deg, #ffffff, #f8f9fa);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 2rem 1.5rem;
        }

        .card-icon {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            background: -webkit-linear-gradient(45deg, var(--primary-color), var(--hover-color));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: var(--primary-color);
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .card-text {
            color: #6c757d;
            margin-bottom: 1.5rem;
        }

        .btn-action {
            border-radius: 50px;
            padding: 0.8rem 2rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--hover-color));
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--hover-color), var(--primary-color));  
            transform: translateY(-2px);
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745, #20c997);
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #20c997, #28a745);
            transform: translateY(-2px);
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-car-wash me-2"></i>
                DANG Aviso
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user-circle me-1"></i>
                            <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Usuario'; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt me-1"></i>
                            Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="dashboard-container">
            <h2 class="dashboard-title">
                <i class="fas fa-tachometer-alt me-2"></i>
                Panel de Control
            </h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <div class="card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h5 class="card-title">Gestionar Clientes</h5>
                            <p class="card-text">Administra la información de tus clientes.</p>
                            <a href="Clientes/indexClientes.php" class="btn btn-primary btn-action">
                                <i class="fas fa-arrow-right me-2"></i>
                                Ir a Clientes
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <div class="card-icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h5 class="card-title">Gestionar Empleados</h5>
                            <p class="card-text">Administra la información de tu equipo de trabajo</p>
                            <a href="Empleados/indexEmpleados.php" class="btn btn-success btn-action">
                                <i class="fas fa-arrow-right me-2"></i>
                                Ir a Empleados
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html