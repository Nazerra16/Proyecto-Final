<?php
include 'bd.php';


//Se obtienen los datos de la tabla Clientes, para luego mostrarlos

$query = "SELECT id, nombre, apellido, email, telefono, v.patente FROM clientes c JOIN vehiculos v ON v.id_vehiculo = c.id";
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
    <button onclick="location.href='options.php'" class="btn btn-secondary back-button">Volver a Opciones</button>

    <h2>Historial de Clientes</h2>

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
                    <td><input type="checkbox" class="select-client" data-nombre="<?php echo $row['nombre']; ?>"
                            data-apellido="<?php echo $row['apellido']; ?>" data-email="<?php echo $row['email']; ?>"
                            data-telefono="<?php echo $row['telefono']; ?>" data-patente="<?php echo $row['patente']; ?>">
                    </td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['apellido']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php echo $row['patente']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>


    <!-- Acá se muestran los datos cuando se selecciona un cliente -->

    <div id="clienteDetalles" style="display:none; margin-top:20px;">
        <h3>Detalles del Cliente</h3>
        <p><strong>Nombre:</strong> <span id="detalleNombre"></span></p>
        <p><strong>Apellido:</strong> <span id="detalleApellido"></span></p>
        <p><strong>Email:</strong> <span id="detalleEmail"></span></p>
        <p><strong>Teléfono:</strong> <span id="detalleTelefono"></span></p>
        <p><strong>Patente:</strong> <span id="detallePatente"></span></p>

        <!-- Botones para el envío de Mails (pendiente) -->
        <button onclick="iniciarLavado()">Iniciar Lavado</button>
        <button onclick="finalizarLavado()">Finalizar Lavado</button>
    </div>

    <script>                                    //Script para inicializar el DataTable
        $(document).ready(function () {
            $('#clientesTable').DataTable({
                "pageLength": 10,
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

            // Evento para el cambio en los checkboxes        //Con jquery se escucha el evento change      

        });

        $('.select-client').on('change', function () {    //en las cajas con la clase "select-client"
            // Desmarca otras casillas y marca la actual
            $('.select-client').not(this).prop('checked', false);

            if ($(this).is(':checked')) {
                // Extrae los datos del cliente y los muestra en el contenedor de detalles
                $('#detalleNombre').text($(this).data('nombre'));
                $('#detalleApellido').text($(this).data('apellido'));
                $('#detalleEmail').text($(this).data('email'));
                $('#detalleTelefono').text($(this).data('telefono'));
                $('#detallePatente').text($(this).data('patente'));

                // Muestra el contenedor con los datos
                $('#clienteDetalles').show();
            } else {
                // Oculta el contenedor si no hay nada seleccionado
                $('#clienteDetalles').hide();
            }
        });

    </script>
</body>

</html>