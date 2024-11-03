<?php
require_once __DIR__ . '/../../models/Vehiculo.php';

$id_vehiculo = $_GET['id'] ?? null;
$id_cliente = $_GET['cliente'] ?? null;

if (!$id_vehiculo || !$id_cliente) {
    header('Location: indexClientes.php');
    exit();
}

$vehiculo = Vehiculo::getById($id_vehiculo);

if ($vehiculo && $vehiculo->ID_Clientes == $id_cliente) { {
        $vehiculo->delete();
        header('Location: indexClientes.php');
        exit();
    }
}
