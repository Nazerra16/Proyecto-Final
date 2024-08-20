<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/formulario.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Formulario de Información del Cliente</h1>
        <form>
            <label for="Nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="tel">Teléfono:</label>
            <input type="tel" id="tel" name="tel" required>
            
            <label for="patente">Patente del Vehículo:</label>
            <input type="text" id="patente" name="patente" required>
            
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
