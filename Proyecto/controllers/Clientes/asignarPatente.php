<?php
require_once __DIR__ . '/../../models/Cliente.php';
require_once __DIR__ . '/../../models/Vehiculo.php';

$id_cliente = $_GET['id'];
$cliente = Cliente::getById($id_cliente);

if (isset($_POST['asignarPatente'])) {
    $patente = $_POST['patente'];
    
    // Verificar si la patente ya existe
    $vehiculo_existente = Vehiculo::getByPatente($patente);
    
    if ($vehiculo_existente) {
        $cliente_existente = Cliente::getById($vehiculo_existente->ID_Cliente);
        $mensaje = "La patente ya está asignada al cliente {$cliente_existente->Nombre} {$cliente_existente->Apellido}. ";
        $mensaje .= "¿Desea reasignar esta patente al cliente actual?";
        
        if (isset($_POST['confirmarReasignacion'])) {
            $vehiculo_existente->ID_Cliente = $id_cliente;
            $vehiculo_existente->update();
            header('Location: indexClientes.php');
            exit();
        }
    } else {
        $nuevo_vehiculo = new Vehiculo();
        $nuevo_vehiculo->Patente = $patente;
        $nuevo_vehiculo->ID_Clientes = $id_cliente;
        $nuevo_vehiculo->create();
        header('Location: indexClientes.php');
        exit();
    }
}

require_once __DIR__ . '/../../views/Clientes/asignarPatente.view.php';