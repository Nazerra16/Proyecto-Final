<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Patente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Asignar Patente a <?= $cliente->Nombre ?> <?= $cliente->Apellido ?></h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form action="asignarPatente.php?id=<?= $id_cliente ?>" method="POST">
            <div class="mb-3">
                <label for="patente" class="form-label">Número de Patente</label>
                <input type="text" class="form-control" id="patente" name="patente" required>
            </div>
            <button type="submit" class="btn btn-primary" name="asignarPatente">Guardar</button>
            <?php if (!$es_nuevo): ?>
                <a href="indexClientes.php" class="btn btn-secondary">Volver</a>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>