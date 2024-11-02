<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - DANG Aviso</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            padding: 2.5rem;
            max-width: 400px;
            width: 100%;
        }

        .page-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #eee;
            text-align: center;
        }

        .btn-action {
            border-radius: 50px;
            padding: 0.8rem 2rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
            width: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--hover-color));
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--hover-color), var(--primary-color));
            transform: translateY(-2px);
        }

        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1.2rem;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(75, 195, 252, 0.25);
        }

        .form-label {
            font-weight: 500;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="page-title">
            <i class="fas fa-sign-in-alt me-2"></i>
            Iniciar Sesión
        </h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="Usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="Usuario" name="Usuario" required>
            </div>
            <div class="mb-3">
                <label for="Contraseña" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="Contraseña" name="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary btn-action" name="login">
                <i class="fas fa-sign-in-alt me-2"></i>
                Iniciar Sesión
            </button>
        </form>
        <div class="mt-3 text-center">
            <a href="register.php" class="btn btn-link">¿No tienes cuenta? Regístrate</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>