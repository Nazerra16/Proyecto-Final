<?php
require_once __DIR__ . '/../../models/Cliente.php';
require_once __DIR__ . '/../../models/Vehiculo.php';

// Usar el operador de fusión de null (??) para establecer un valor predeterminado
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
    $patente = $_POST['Patente'];

    if (empty($patente)) {
        $error = "La patente no puede estar vacía";
    } else {
        $vehiculo = new Vehiculo();
        $vehiculo->Patente = strtoupper($patente);
        $vehiculo->ID_Clientes = $id_cliente;

        if ($vehiculo->create()) {
            // Si es un cliente nuevo, redirigir al índice
            if ($es_nuevo) {
                header('Location: indexClientes.php');
                exit();
            } else {
                // Si no es nuevo, permitir agregar más patentes
                $success = "Patente asignada correctamente";
            }
        } else {
            $error = "Error al asignar la patente";
        }
    }
}

require_once __DIR__ . '/../../views/Clientes/asignarPatente.view.php';
