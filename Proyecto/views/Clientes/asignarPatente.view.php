<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Asignar Patente - DANG Aviso</title>
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
            padding-top: 20px;
        }

        .main-container {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            margin-bottom: 2rem;
            max-width: 800px;
            margin: 20px auto;
        }

        .page-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #eee;
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

        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1.2rem;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(75, 195, 252, 0.25);
        }

        .form-label {
            font-weight: 500;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .client-info {
            background-color: #f8f9fa;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .client-info h3 {
            color: #2c3e50;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .client-info p {
            margin-bottom: 0.5rem;
            color: #6c757d;
        }

        .current-plates {
            margin-top: 2rem;
        }

        .plate-badge {
            background: linear-gradient(135deg, var(--primary-color), var(--hover-color));
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            margin: 0.25rem;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="page-title">
                    <i class="fas fa-car me-2"></i>
                    Asignar Patente
                </h2>
            </div>

            <!-- Información del Cliente -->
            <div class="client-info">
                <h3><i class="fas fa-user me-2"></i>Información del Cliente</h3>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nombre:</strong> <?= $cliente->Nombre ?></p>
                        <p><strong>Apellido:</strong> <?= $cliente->Apellido ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Email:</strong> <?= $cliente->Email ?></p>
                        <p><strong>Teléfono:</strong> <?= $cliente->Telefono ?></p>
                    </div>
                </div>
            </div>

            <form action="asignarPatente.php?id=<?= $cliente->ID_Clientes ?>" method="POST">
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="Patente" class="form-label">Nueva Patente</label>
                            <input type="text" class="form-control" id="Patente" name="Patente" required
                                placeholder="Ingrese la patente del vehículo">
                            <small class="text-muted">Formato: ABC123 o AB123CD</small>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 justify-content-end mt-4">
                    <a href="indexClientes.php" class="btn btn-secondary btn-action">
                        <i class="fas fa-arrow-left me-2"></i>
                        Volver
                    </a>
                    <button type="submit" class="btn btn-primary btn-action" name="asignarPatente">
                        <i class="fas fa-plus me-2"></i>
                        Asignar Patente
                    </button>
                </div>
            </form>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger mt-3">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <?php if (isset($success)): ?>
                <div class="alert alert-success mt-3">
                    <?= $success ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>