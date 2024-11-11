<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar Empleado - DANG Aviso</title>
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
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
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
    </style>
</head>

<body>
    <div class="container">
        <div class="main-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="page-title">
                    <i class="fas fa-user-edit me-2"></i>
                    Actualizar Empleado
                </h2>
            </div>

            <form action="updateEmpleados.php?id=<?= $empleado->ID_Empleado ?>" method="POST">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $empleado->Nombre ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="Apellido" name="Apellido" value="<?= $empleado->Apellido ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="Telefono" name="Telefono" value="<?= $empleado->Telefono ?>" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 justify-content-end mt-4">
                    <a href="indexEmpleados.php" class="btn btn-secondary btn-action">
                        <i class="fas fa-arrow-left me-2"></i>
                        Volver
                    </a>
                    <button type="submit" class="btn btn-primary btn-action" name="actualizarEmpleado">
                        <i class="fas fa-save me-2"></i>
                        Actualizar Empleado
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>