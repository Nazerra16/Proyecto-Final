<?php
include 'bd.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {    //Se toman los valores del formulario y se los guarda
    $nombre = $_POST['nombre'];                 //en variables para la consulta
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $patente = $_POST['patente'];

    


                    // Inserta los datos en la tabla clientes de la BD

    $query = "INSERT INTO clientes (nombre, apellido, email, telefono) VALUES ('$nombre', '$apellido', '$email', '$telefono')";


    
    if ($conn->query($query) === TRUE) {    //Si la consulta se ejecuta bien lo dice, de lo contrario tira el error
        echo "Cliente ingresado correctamente";
    } else {
        echo "Error al ingresar cliente: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/ingreso.css">
</head>
<body>

    <button onclick="location.href='options.php'" class="btn btn-custom back-button">Volver a Opciones</button>

    <div class="form-container">

        <h2 class="form-title">Ingreso de Cliente</h2>
        
        <form method="POST" action="ingreso.php">
        <div class="row mb-3">
                <div class="col">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese su nombre" required>
                </div>
                <div class="col">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Ingrese su apellido" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Ingrese su correo" required>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" name="telefono" class="form-control" id="telefono" placeholder="Ingrese su teléfono" required>
                </div>
                <div class="col">
                    <label for="patente" class="form-label">Patente</label>
                    <input type="text" name="patente" class="form-control" id="patente" placeholder="Ingrese la patente" required>
                </div>
            </div>

            <button type="submit" class="btn btn-custom w-100">Ingresar Cliente</button>

        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
