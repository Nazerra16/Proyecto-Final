<?php
require_once "../../models/Cliente.php";
require_once "../../models/Vehiculo.php";

$clientes = Cliente::all();
$clientesConPatentes = [];

foreach ($clientes as $cliente) {
    $patentes = Vehiculo::getByClienteId($cliente->ID_Clientes);
    $cliente->patentes = $patentes;
    $clientesConPatentes[] = $cliente;
}

require_once "../../views/Clientes/indexClientes.view.php";