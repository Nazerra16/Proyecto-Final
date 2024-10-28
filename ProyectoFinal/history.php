<?php
include 'bd.php';
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

// Consulta los datos de la tabla "clientes"
$query = "SELECT id, nombre, apellido, email, telefono, patente FROM clientes";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Clientes</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <h2>Historial de Clientes</h2>

    <!-- Tabla de clientes -->
    <table id="clientesTable" class="display">
        <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Patente</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><input type="checkbox" class="select-client" data-nombre="<?php echo $row['nombre']; ?>" data-apellido="<?php echo $row['apellido']; ?>" data-email="<?php echo $row['email']; ?>" data-telefono="<?php echo $row['telefono']; ?>" data-patente="<?php echo $row['patente']; ?>"></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['apellido']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php echo $row['patente']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Contenedor para mostrar los detalles del cliente -->
    <div id="clienteDetalles" style="display:none; margin-top:20px;">
        <h3>Detalles del Cliente</h3>
        <p><strong>Nombre:</strong> <span id="detalleNombre"></span></p>
        <p><strong>Apellido:</strong> <span id="detalleApellido"></span></p>
        <p><strong>Email:</strong> <span id="detalleEmail"></span></p>
        <p><strong>Teléfono:</strong> <span id="detalleTelefono"></span></p>
        <p><strong>Patente:</strong> <span id="detallePatente"></span></p>
        
        <!-- Botones para iniciar y finalizar lavado -->
        <button onclick="iniciarLavado()">Iniciar Lavado</button>
        <button onclick="finalizarLavado()">Finalizar Lavado</button>
    </div>

    <script>
        $(document).ready(function() {
            // Inicializa DataTables
            $('#clientesTable').DataTable({
                "pageLength": 6,
                "lengthChange": false,
                "language": {
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoFiltered": "(filtrado de _MAX_ registros en total)"
                }
            });

            // Evento de cambio en los checkboxes
            $('.select-client').on('change', function() {
                // Desmarca otras casillas y marca solo la actual
                $('.select-client').not(this).prop('checked', false);
                
                if ($(this).is(':checked')) {
                    // Extrae los datos del cliente y muestra en el contenedor de detalles
                    $('#detalleNombre').text($(this).data('nombre'));
                    $('#detalleApellido').text($(this).data('apellido'));
                    $('#detalleEmail').text($(this).data('email'));
                    $('#detalleTelefono').text($(this).data('telefono'));
                    $('#detallePatente').text($(this).data('patente'));

                    // Muestra el contenedor de detalles
                    $('#clienteDetalles').show();
                } else {
                    // Oculta el contenedor si ninguna casilla está marcada
                    $('#clienteDetalles').hide();
                }
            });
        });

        function iniciarLavado() {
            alert("Lavado iniciado para el cliente seleccionado.");
            // Aquí puedes agregar el código para actualizar el estado en la base de datos
            
        }

        function finalizarLavado() {
            alert("Lavado finalizado para el cliente seleccionado.");
            // Aquí puedes agregar el código para actualizar el estado en la base de datos
        }
    </script>
</body>
</html>
