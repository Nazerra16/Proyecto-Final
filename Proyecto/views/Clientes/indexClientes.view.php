<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Clientes - DANG Aviso</title>
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

        .btn-group .btn {
            margin: 0 2px;
        }

        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 1.25rem;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }

        .modal-content {
            border-radius: 15px;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--hover-color));
            color: white;
            border-radius: 15px 15px 0 0;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="page-title">
                    <i class="fas fa-users me-2"></i>
                    Gestión de Clientes
                </h2>
                <div class="d-flex gap-2">
                    <a href="../dashboard.php" class="btn btn-secondary btn-action">
                        <i class="fas fa-arrow-left me-2"></i>
                        Volver al Dashboard
                    </a>
                    <a href="createClientes.php" class="btn btn-primary btn-action">
                        <i class="fas fa-plus me-2"></i>
                        Nuevo Cliente
                    </a>
                </div>
            </div>

            <!-- Input de Búsqueda -->
            <div class="mb-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar por nombre, apellido o patente...">
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php if (!empty($clientesConPatentes)): ?>
                            <?php foreach ($clientesConPatentes as $cliente): ?>
                                <?php if ($cliente !== null): ?>
                                    <tr data-patentes="<?= strtolower(implode(',', array_map(fn($p) => $p->Patente, $cliente->patentes))) ?>">
                                        <td><?= $cliente->ID_Clientes ?></td>
                                        <td><?= $cliente->Nombre ?></td>
                                        <td><?= $cliente->Apellido ?></td>
                                        <td><?= $cliente->Email ?></td>
                                        <td><?= $cliente->Telefono ?></td>
                                        <td>
                                            <a href="updateClientes.php?id=<?= $cliente->ID_Clientes ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="deleteClientes.php?id=<?= $cliente->ID_Clientes ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este cliente?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#patentesModal<?= $cliente->ID_Clientes ?>">
                                                <i class="fas fa-car me-1"></i> Ver Patentes
                                            </button>
                                            <a href="asignarPatente.php?id=<?= $cliente->ID_Clientes ?>" class="btn btn-success btn-sm">
                                                <i class="fas fa-plus me-1"></i> Asignar Patente
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No hay clientes registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal para ver patentes -->
            <?php foreach ($clientesConPatentes as $cliente): ?>
                <div class="modal fade" id="patentesModal<?= $cliente->ID_Clientes ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <i class="fas fa-car me-2"></i>
                                    Patentes de <?= $cliente->Nombre ?> <?= $cliente->Apellido ?>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php if (!empty($cliente->patentes)): ?>
                                    <ul class="list-group list-group-flush">
                                        <?php foreach ($cliente->patentes as $patente): ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?= $patente->Patente ?>
                                                <div class="btn-group">
                                                    <?php $lavadoActivo = Lavado::getLavadoActivo($patente->ID_Vehiculo); ?>
                                                    <?php if ($lavadoActivo): ?>
                                                        <a href="finalizarLavado.php?id=<?= $lavadoActivo->ID_Limpieza ?>&cliente=<?= $cliente->ID_Clientes ?>" class="btn btn-warning btn-sm">
                                                            Finalizar Lavado
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="iniciarLavado.php?id=<?= $patente->ID_Vehiculo ?>&cliente=<?= $cliente->ID_Clientes ?>" class="btn btn-primary btn-sm">
                                                            Iniciar Lavado
                                                        </a>
                                                    <?php endif; ?>
                                                    <a href="deletePatente.php?id=<?= $patente->ID_Vehiculo ?>&cliente=<?= $cliente->ID_Clientes ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta patente?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <p>No hay patentes asignadas a este cliente.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                document.getElementById('searchInput').addEventListener('input', function() {
                    const searchValue = this.value.toLowerCase();
                    const tableRows = document.querySelectorAll('#tableBody tr');

                    tableRows.forEach(row => {
                        const rowText = row.textContent.toLowerCase();
                        const patentes = row.getAttribute('data-patentes') || '';

                        // Filtra si el texto de búsqueda coincide con el contenido visible o con el atributo data-patentes
                        row.style.display = rowText.includes(searchValue) || patentes.includes(searchValue) ? '' : 'none';
                    });
                });
            </script>
        </div>
    </div>
</body>
</html>
