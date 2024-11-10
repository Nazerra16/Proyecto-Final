<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Empleados - DANG Aviso</title>
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

        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background: linear-gradient(135deg, var(--primary-color), var(--hover-color));
            color: white;
        }

        .table th {
            font-weight: 500;
            padding: 1rem;
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
        }

        .btn-sm {
            border-radius: 20px;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="main-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="page-title">
                    <i class="fas fa-user-tie me-2"></i>
                    Gestión de Empleados
                </h2>
                <div class="d-flex gap-2">
                    <a href="../dashboard.php" class="btn btn-secondary btn-action">
                        <i class="fas fa-arrow-left me-2"></i>
                        Volver a Inicio
                    </a>
                    <a href="createEmpleados.php" class="btn btn-primary btn-action">
                        <i class="fas fa-plus me-2"></i>
                        Nuevo Empleado
                    </a>
                </div>
            </div>

            <div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($empleados)): ?>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?= $empleado->ID_Empleado ?></td>
                        <td><?= $empleado->Nombre ?></td>
                        <td><?= $empleado->Apellido ?></td>
                        <td><?= $empleado->Telefono ?></td>
                        <td>
                            <a href="updateEmpleados.php?id=<?= $empleado->ID_Empleado ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="deleteEmpleados.php?id=<?= $empleado->ID_Empleado ?>" class="btn btn-danger btn-sm" 
                               onclick="return confirm('¿Está seguro de eliminar este empleado?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No hay empleados registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>