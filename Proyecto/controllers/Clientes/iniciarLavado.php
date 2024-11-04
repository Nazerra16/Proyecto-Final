<?php
require_once '../../models/Lavado.php';
require_once '../../models/Vehiculo.php';
require_once '../../models/Cliente.php';
require_once '../../models/Empleado.php';
require_once '../../models/EmailSender.php';

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
        // Obtener información del vehículo
        $vehiculo = Vehiculo::getById($id_vehiculo);

        // Obtener información del cliente
        $cliente = Cliente::getById($id_cliente);

        // Enviar email de notificación
        if ($cliente && $vehiculo) {
            $to = $cliente->Email;
            $subject = "Lavado iniciado";
            $body = "El lavado de su vehículo con patente {$vehiculo->Patente} ha sido iniciado.";
            EmailSender::sendEmail($to, $subject, $body);
        }

        header('Location: indexClientes.php');
        exit;
    } else {
        echo "Error al iniciar el lavado";
    }
} else {
    echo "Parámetros inválidos";
}
