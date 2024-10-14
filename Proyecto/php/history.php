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
        <h2 class="history-title">Registro de Clientes</h2>
        <table id="clientesTabla" class="table table-striped">
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
            <!-- <tbody>
                    <td>
                        <button class="btn btn-custom btn-sm">Iniciar lavado</button>
                        <button class="btn btn-custom-danger btn-sm">Finalizar lavado</button>
                    </td>
                </tr>
            </tbody> -->
        </table>
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
            const table = $('#clientesTabla').DataTable({
                "ajax": "bd.php",  // El archivo PHP que devuelve los datos
            "columns": [
            { "data": "nombre" },
            { "data": "apellido" },
            { "data": "email" },
            { "data": "telefono" },
            { "data": "patente" }
        ],
                "ordering": false,
                "paging": true,
                "lengthChange": false,
                "pageLength": 5, // Cambiar el número de filas por página según lo necesites
                "info": false,
                "searching": true, // Desactiva el buscador de arriba
                "language": {
                    "search": "Filtrar",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"}
                    }
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
