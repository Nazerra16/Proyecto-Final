<?php
require_once __DIR__ . '/../../models/Lavado.php';
require_once __DIR__ . '/../../models/Vehiculo.php';
require_once __DIR__ . '/../../models/Cliente.php';
require_once __DIR__ . '/../../models/Empleado.php';
require_once __DIR__ . '/../../models/EmailSender.php';

if (isset($_GET['id']) && isset($_GET['cliente'])) {
    $id_vehiculo = $_GET['id'];
    $id_cliente = $_GET['cliente'];

    // Obtener un empleado válido
    $empleados = Empleado::all(); // Obtener todos los empleados

    if (empty($empleados)) {
        echo "Error: No hay empleados disponibles para asignar al lavado";
        exit;
    }

    // Usar el primer empleado disponible o implementar tu propia lógica de selección
    $empleado = $empleados[0];

    // Crear una nueva instancia de Lavado
    $lavado = new Lavado();
    $lavado->ID_Vehiculo = $id_vehiculo;
    $lavado->ID_Empleado = $empleado->ID_Empleado; // Usar un ID de empleado válido

    if ($lavado->iniciarLavado()) {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fechaHora = date('Y-m-d H:i:s');
        // Obtener información del vehículo
        $vehiculo = Vehiculo::getById($id_vehiculo);

        // Obtener información del cliente
        $cliente = Cliente::getById($id_cliente);

        // Enviar email de notificación
        if ($cliente && $vehiculo) {
            $to = $cliente->Email;
            $subject = "Lavado iniciado";
            $body = "
        <h2>Lavado Iniciado</h2>
        <p>Estimado/a {$cliente->Nombre} {$cliente->Apellido},</p>
        <p>Le informamos que ha comenzado el lavado de su vehiculo:</p>
        <ul>
            <li><strong>Patente:</strong> {$vehiculo->Patente}</li>
            <li><strong>Fecha y Hora de Inicio:</strong> {$fechaHora}</li>
            <li><strong>Empleado a cargo:</strong> {$empleado->Nombre} {$empleado->Apellido}</li>
        </ul>
        <p>Gracias por confiar en nuestros servicios!</p>";
            EmailSender::sendEmail($to, $subject, $body);
        }

        header('Location: indexClientes.php');
        exit;
    } else {
        echo "Error al iniciar el lavado";
    }
} else {
    echo "Parámetros invalidos";
}
