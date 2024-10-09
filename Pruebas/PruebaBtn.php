<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Estado del Auto - Lavadero de Autos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e0f7fa; /* Azul claro */
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            border-left: 10px solid #ffeb3b;
            max-width: 800px;
            width: 100%;
        }
        .form-title {
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
            color: #0277bd;
        }
        .btn-custom {
            background-color: #0288d1;
            color: white;
            font-weight: bold;
        }
        .alert-sign {
            display: block;
            text-align: center;
            font-size: 24px;
            color: #ff5722;
            margin-bottom: 15px;
        }
        .alert-sign i {
            margin-right: 10px;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .status-button {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            font-size: 18px;
            font-weight: bold;
            margin: 10px;
            border: 3px solid transparent;
            transition: border-color 0.3s ease;
        }
        .preparando {
            background-color: #fbc02d;
        }
        .iniciado {
            background-color: #0288d1;
        }
        .finalizado {
            background-color: #4caf50;
        }
        .selected {
            border-color: #ff5722; /* Naranja de selección */
        }
        .status-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        #confirm-btn {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="back-button">
        <a href="index.html" class="btn btn-custom">Volver al inicio</a>
    </div>

    <div class="form-container">
        <div class="alert-sign">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <h2 class="form-title">Cambio de Estado del Auto</h2>
        <form action="cambio_estado.php" method="post">
            <div class="mb-3">
                <label for="patente" class="form-label">Seleccione la Patente</label>
                <select name="patente" id="patente" class="form-select" required>
                    <!-- Opciones de patentes se generan desde la base de datos -->
                    <option value="">Seleccionar...</option>
                    <option value="ABC123">ABC123</option>
                    <option value="XYZ789">XYZ789</option>
                </select>
            </div>

            <div class="status-container">
                <button type="button" class="btn btn-custom status-button preparando" id="preparando-btn">
                    Preparando
                </button>
                <button type="button" class="btn btn-custom status-button iniciado" id="iniciado-btn">
                    Iniciado
                </button>
                <button type="button" class="btn btn-custom status-button finalizado" id="finalizado-btn">
                    Finalizado
                </button>
            </div>

            <!-- Botón de confirmación -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom" id="confirm-btn">Confirmar</button>
            </div>

            <!-- Input oculto para almacenar el estado seleccionado -->
            <input type="hidden" name="estado" id="estado-seleccionado">
        </form>
    </div>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript para manejar la selección y confirmación -->
    <script>
        const preparButton = document.getElementById('preparando-btn');
        const iniciadoButton = document.getElementById('iniciado-btn');
        const finalizadoButton = document.getElementById('finalizado-btn');
        const confirmBtn = document.getElementById('confirm-btn');
        const estadoInput = document.getElementById('estado-seleccionado');
        
        // Función para manejar la selección de un estado
        function seleccionarEstado(boton, estado) {
            // Limpiar selección previa
            preparButton.classList.remove('selected');
            iniciadoButton.classList.remove('selected');
            finalizadoButton.classList.remove('selected');
            
            // Añadir la selección actual
            boton.classList.add('selected');
            
            // Guardar el estado seleccionado en el input oculto
            estadoInput.value = estado;
            
            // Mostrar el botón de confirmar
            confirmBtn.style.display = 'block';
        }
        
        // Asignar eventos de click a los botones de estado
        preparButton.addEventListener('click', () => seleccionarEstado(preparButton, 'Preparando el Lavado'));
        iniciadoButton.addEventListener('click', () => seleccionarEstado(iniciadoButton, 'Lavado Iniciado'));
        finalizadoButton.addEventListener('click', () => seleccionarEstado(finalizadoButton, 'Lavado Finalizado'));
    </script>
</body>
</html>
