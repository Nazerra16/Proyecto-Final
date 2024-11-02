<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Patente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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
            <h2 class="text-center mb-4">Asignar Patente a <?= $cliente->Nombre ?> <?= $cliente->Apellido ?></h2>
            <?php if (isset($mensaje)): ?>
                <div class="alert alert-warning">
                    <?= $mensaje ?>
                    <form method="POST">
                        <input type="hidden" name="patente" value="<?= htmlspecialchars($patente) ?>">
                        <button type="submit" name="confirmarReasignacion" class="btn btn-warning mt-2">Sí, reasignar</button>
                        <a href="indexClientes.php" class="btn btn-secondary mt-2">No, cancelar</a>
                    </form>
                </div>
            <?php else: ?>
                <form action="asignarPatente.php?id=<?= $id_cliente ?>" method="POST">
                    <div class="mb-3">
                        <label for="patente" class="form-label">Patente</label>
                        <input type="text" class="form-control" id="patente" name="patente" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" name="asignarPatente">Asignar Patente</button>
                        <a href="indexClientes.php" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>