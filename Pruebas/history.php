<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes - Lavadero de Autos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Proyecto/css/history.css">
</head>
<body>
    <div class="back-button">
        <a href="options.php" class="btn btn-custom">Volver al inicio</a>
    </div>
    <div class="history-container">
        <div class="alert-sign">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <h2 class="history-title">Registro de Clientes</h2>
        <table id="clientesTable" class="table table-striped">
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
                    <td>Ana</td>
                    <td>Gómez</td>
                    <td>ana.gomez@ejemplo.com</td>
                    <td>+54 9 2345 6789</td>
                    <td>XYZ789</td>
                    <td>
                        <button class="btn btn-custom btn-sm">Iniciar lavado</button>
                        <button class="btn btn-custom-danger btn-sm">Finalizar lavado</button>
                    </td>
                </tr>
                <tr>
                    <td>Pedro</td>
                    <td>Martínez</td>
                    <td>pedro.martinez@ejemplo.com</td>
                    <td>+54 9 3456 7890</td>
                    <td>MNO456</td>
                    <td>
                        <button class="btn btn-custom btn-sm">Iniciar lavado</button>
                        <button class="btn btn-custom-danger btn-sm">Finalizar lavado</button>
                    </td>
                </tr>
                <!-- Más filas de clientes -->
            </tbody>
        </table>
        <div class="d-flex justify-content-between mt-3">
            <div>
                <button id="prevPage" class="btn btn-secondary">Anterior</button>
                <button id="nextPage" class="btn btn-secondary">Siguiente</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            const table = $('#clientesTable').DataTable({
                "ordering": false,
                "paging": true,
                "lengthChange": false,
                "pageLength": 5, // Cambiar el número de filas por página según lo necesites
                "info": false,
                "searching": true, // Desactiva el buscador de arriba
            });

            $('#filterInput').on('keyup', function() {
                table.search(this.value).draw();
            });

            $('#prevPage').on('click', function() {
                table.page('previous').draw('page');
            });

            $('#nextPage').on('click', function() {
                table.page('next').draw('page');
            });
        });
    </script>
</body>
</html>
