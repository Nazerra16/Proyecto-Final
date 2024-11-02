<?php
include 'bd.php';


//Se obtienen los datos de la tabla Clientes, para luego mostrarlos

$queryClientes = "SELECT id, nombre, apellido, email FROM clientes";
$result = $conn->query($queryClientes);
// $queryAutos =
// $result = $conn->query($queryAutos);



if (isset($_POST['enviarCliente'])) {
    echo $_POST['cliente'];

    foreach ($_POST['autos'] as $auto) {
        echo $auto;
    }
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>

    <form action="" method="post">
        <select class="select2_cliente" name="cliente">

            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"> <?= $row['nombre'] ?>, <?= $row['apellido'] ?> (<?= $row['email'] ?>)
                </option>
            <?php endwhile; ?>

        </select>

        <select class="select2_auto" name="autos[]" multiple="multiple">
            <option value="idAuto">Alabama</option>
            <option value="idAuto">Wyoming</option>
        </select>

        <button name="enviarCliente" type="submit">ENVIAR</button>
    </form>

    <script>

        $(document).ready(function () {
            $('.select2_cliente').select2();
            $('.select2_auto').select2();
        });
    </script>

</body>

</html>