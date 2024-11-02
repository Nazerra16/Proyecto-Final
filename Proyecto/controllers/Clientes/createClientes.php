<?php
require_once __DIR__ . '/../../models/Cliente.php';

if (isset($_POST['crearCliente'])) {
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $email = $_POST['Email'];
    $telefono = $_POST['Telefono'];

    $cliente = new Cliente();
    $cliente->Nombre = $nombre;
    $cliente->Apellido = $apellido;
    $cliente->Email = $email;
    $cliente->Telefono = $telefono;
    $id_cliente = $cliente->create();

    if ($id_cliente) {
        // Redirigir a la página de asignación de patente
        header('Location: asignarPatente.php?id=' . $id_cliente . '&nuevo=1');
        exit();
    } else {
        echo "Error al crear el cliente";
    }
}

require_once __DIR__ . '/../../views/Clientes/createClientes.view.php';
