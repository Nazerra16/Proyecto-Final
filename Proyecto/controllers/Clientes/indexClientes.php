<?php
require_once "../../models/Cliente.php";
$cliente = Cliente::all();

require_once "../../views/Clientes/indexClientes.view.php";