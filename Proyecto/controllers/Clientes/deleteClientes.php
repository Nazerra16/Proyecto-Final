<?php
require_once __DIR__ . '/../../models/Cliente.php';

$id = $_GET['id']; //conseguimos el id del cliente a eliminar por get, osea que esta en la URL

$cliente = Cliente::getById($id); //buscamos ese cliente por id

if ($cliente) { //si se encontro el cliente, entonces lo eliminamos por el metodo delete
    $cliente->delete();
    header('Location: ../Clientes/indexClientes.php');
}