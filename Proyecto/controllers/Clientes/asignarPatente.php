<?php
require_once __DIR__ . '/../../models/Cliente.php';
require_once __DIR__ . '/../../models/Vehiculo.php';

$id_cliente = $_GET['id'] ?? null;
$es_nuevo = $_GET['nuevo'] ?? false;

if (!$id_cliente) {
    header('Location: indexClientes.php');
    exit();
}

$cliente = Cliente::getById($id_cliente);

if (!$cliente) {
    header('Location: indexClientes.php');
    exit();
}

if (isset($_POST['asignarPatente'])) {
    $patente = $_POST['patente'];

    $vehiculo = new Vehiculo();
    $vehiculo->Patente = $patente;
    $vehiculo->ID_Clientes = $id_cliente;

    if ($vehiculo->create()) {
        header('Location: indexClientes.php');
        exit();
    } else {
        $error = "Error al asignar la patente";
    }
}

require_once __DIR__ . '/../../views/Clientes/asignarPatente.view.php';