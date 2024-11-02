<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Clientes - Lavadero</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #4bc3fc;
            padding: 20px;
        }

        .table-container {
            background-color: #f3fbff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-left: 10px solid #ffeb3b;
            margin: 40px auto;
        }

        .table {
            margin-bottom: 0;
        }

        .btn-action {
            margin: 0 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Clientes Registrados</h2>
                <a href="createClientes.php" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Nuevo Cliente
                </a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cliente as $clientes): ?>
                        <tr>
                            <td><?= $clientes->ID_Clientes ?></td>
                            <td><?= $clientes->Nombre ?></td>
                            <td><?= $clientes->Apellido ?></td>
                            <td><?= $clientes->Email ?></td>
                            <td><?= $clientes->Telefono ?></td>
                            <td>
                                <a href="updateClientes.php?id=<?= $clientes->ID_Clientes ?>" class="btn btn-warning btn-sm btn-action">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="deleteClientes.php?id=<?= $clientes->ID_Clientes ?>" class="btn btn-danger btn-sm btn-action" onclick="return confirm('¿Está seguro de eliminar este cliente?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="asignarPatente.php?id=<?= $clientes->ID_Clientes ?>" class="btn btn-info btn-sm btn-action">
                                    <i class="bi bi-car-front"></i> Asignar Patente
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>