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
                <div class="d-flex gap-2">
                    <a href="../dashboard.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver al Dashboard
                    </a>
                    <a href="createClientes.php" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Nuevo Cliente
                    </a>
                </div>
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
                    <?php if (!empty($clientesConPatentes)): ?>
                        <?php foreach ($clientesConPatentes as $cliente): ?>
                            <?php if ($cliente !== null): ?>
                                <tr>
                                    <td><?= $cliente->ID_Clientes ?></td>
                                    <td><?= $cliente->Nombre ?></td>
                                    <td><?= $cliente->Apellido ?></td>
                                    <td><?= $cliente->Email ?></td>
                                    <td><?= $cliente->Telefono ?></td>
                                    <td>
                                        <a href="updateClientes.php?id=<?= $cliente->ID_Clientes ?>" class="btn btn-warning btn-sm btn-action">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="deleteClientes.php?id=<?= $cliente->ID_Clientes ?>" class="btn btn-danger btn-sm btn-action" onclick="return confirm('¿Está seguro de eliminar este cliente?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#patentesModal<?= $cliente->ID_Clientes ?>">
                                            Ver Patentes
                                        </button>
                                        <a href="asignarPatente.php?id=<?= $cliente->ID_Clientes ?>" class="btn btn-success btn-sm btn-action">
                                            Asignar Patente
                                        </a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No hay clientes para mostrar.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modals para mostrar patentes -->
    <?php foreach ($clientesConPatentes as $cliente): ?>
        <div class="modal fade" id="patentesModal<?= $cliente->ID_Clientes ?>" tabindex="-1" aria-labelledby="patentesModalLabel<?= $cliente->ID_Clientes ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="patentesModalLabel<?= $cliente->ID_Clientes ?>">Patentes de <?= $cliente->Nombre ?> <?= $cliente->Apellido ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php if (!empty($cliente->patentes)): ?>
                            <ul>
                                <?php foreach ($cliente->patentes as $patente): ?>
                                    <li><?= $patente->Patente ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>Este cliente no tiene patentes asignadas.</p>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Bootstrap JS y Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>