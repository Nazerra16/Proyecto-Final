<?php
require_once __DIR__ . '/../../models/Lavado.php';
require_once __DIR__ . '/../../models/Vehiculo.php';
require_once __DIR__ . '/../../models/Cliente.php';
require_once __DIR__ . '/../../models/Empleado.php';
require_once __DIR__ . '/../../models/EmailSender.php';

$id_lavado = $_GET['id'] ?? null;
$id_cliente = $_GET['cliente'] ?? null;

if (!$id_lavado || !$id_cliente) {
    header('Location: indexClientes.php');
    exit();
}

$lavado = Lavado::getById($id_lavado);
$cliente = Cliente::getById($id_cliente);

if ($lavado && $cliente) {
    $vehiculo = Vehiculo::getById($lavado->ID_Vehiculo);
    $empleado = Empleado::getById($lavado->ID_Empleado);

    if ($lavado->finalizarLavado()) {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fechaHora = date('Y-m-d H:i:s');
        $subject = "Finalizacion de lavado de su vehiculo";
        $body = "
        <h2>Lavado Finalizado</h2>
        <p>Estimado/a {$cliente->Nombre} {$cliente->Apellido},</p>
        <p>Le informamos que hemos finalizado el lavado de su vehiculo:</p>
        <ul>
            <li><strong>Patente:</strong> {$vehiculo->Patente}</li>
            <li><strong>Fecha y Hora de Finalizacion:</strong> {$fechaHora}</li>
            <li><strong>Empleado a cargo:</strong> {$empleado->Nombre} {$empleado->Apellido}</li>
        </ul>
        <p>Su vehiculo esta listo para ser retirado.</p>
        <p>Cualquier consulta comuniquese al: 3400580754</p>
        <p>Gracias por confiar en nuestros servicios.</p>
        ";

        EmailSender::sendEmail($cliente->Email, $subject, $body);

        header('Location: indexClientes.php');
        exit();
    } else {
        $error = "Error al finalizar el lavado";
        require_once __DIR__ . '/../../views/error.view.php';
    }
} else {
    header('Location: indexClientes.php');
    exit();
}