<?php
require_once __DIR__ . '/../../models/Lavado.php';
require_once __DIR__ . '/../../models/Vehiculo.php';
require_once __DIR__ . '/../../models/Cliente.php';
require_once __DIR__ . '/../../models/Empleado.php';
require_once __DIR__ . '/../../models/EmailSender.php';

session_start();

$id_vehiculo = $_GET['id'] ?? null;
$id_cliente = $_GET['cliente'] ?? null;

if (!$id_vehiculo || !$id_cliente) {
    header('Location: indexClientes.php');
    exit();
}

$vehiculo = Vehiculo::getById($id_vehiculo);
$cliente = Cliente::getById($id_cliente);
$empleado = Empleado::getById($_SESSION['user_id']);

if ($vehiculo && $cliente && $empleado) {
    $lavado = new Lavado();
    $lavado->ID_Vehiculo = $id_vehiculo;
    $lavado->ID_Empleado = $empleado->ID_Empleado;

    if ($lavado->iniciarLavado()) {
        $fechaHora = date('Y-m-d H:i:s');
        $subject = "Inicio de lavado de su vehículo";
        $body = "
        <h2>Inicio de Lavado</h2>
        <p>Estimado/a {$cliente->Nombre} {$cliente->Apellido},</p>
        <p>Le informamos que hemos comenzado el lavado de su vehículo:</p>
        <ul>
            <li><strong>Patente:</strong> {$vehiculo->Patente}</li>
            <li><strong>Fecha y Hora de Inicio:</strong> {$fechaHora}</li>
            <li><strong>Empleado a cargo:</strong> {$empleado->Nombre} {$empleado->Apellido}</li>
        </ul>
        <p>Le notificaremos cuando el lavado haya finalizado.</p>
        <p>Gracias por confiar en nuestros servicios.</p>
        ";

        EmailSender::sendEmail($cliente->Email, $subject, $body);

        header('Location: indexClientes.php');
        exit();
    } else {
        $error = "Error al iniciar el lavado";
        require_once __DIR__ . '/../../views/error.view.php';
    }
} else {
    header('Location: indexClientes.php');
    exit();
}