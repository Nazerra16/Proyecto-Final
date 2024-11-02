<?php
require_once __DIR__ . '/../../models/Cliente.php'; //incluimos archivos  de modelos para utilizar la clase Cliente


if (isset($_POST['crearCliente'])) { //si se aprieta  el boton de crear Cliente que esta en el indexview 
    //guarda  los datos del formulario en variables

    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $email = $_POST['Email'];
    $telefono=$_POST['Telefono'];

    $cliente = new Cliente(); //se crea una nueva instancia
    $cliente->Nombre = $nombre; //se asignan los valores agarrados en las variables de arriba
    $cliente->Apellido = $apellido;
    $cliente->Email = $email;
    $cliente->Telefono=$telefono;
    $cliente->create(); //se crea el objeto y se guarda en la base de datos

    header('location: indexClientes.php'); //te redirije al index
}
require_once __DIR__ . '/../../views/Clientes/createClientes.view.php';