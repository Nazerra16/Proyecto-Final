<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #4bc3fc;
            padding: 20px;
        }
        .form-container {
            background-color: #f3fbff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-left: 10px solid #ffeb3b;
            max-width: 600px;
            margin: 40px auto;
        }
        .btn-primary {
            background-color: #0288d1;
            border: none;
        }
        .btn-primary:hover {
            background-color: #4bc3fc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Actualizar Cliente</h2>
            <form action="updateClientes.php?id=<?= $cliente->ID_Clientes ?>" method="POST">
                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?= $cliente->Nombre ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="Apellido" name="Apellido" value="<?= $cliente->Apellido ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="Email" name="Email" value="<?= $cliente->Email ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="Telefono" name="Telefono" value="<?= $cliente->Telefono ?>" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" name="actualizarDatos">Actualizar Cliente</button>
                    <a href="indexClientes.php" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>