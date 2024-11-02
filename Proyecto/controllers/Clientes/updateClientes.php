<?php
require_once __DIR__ . '/../../models/Cliente.php';

$id = $_GET['id']; //obtenemos id por url

if (isset($_POST['actualizarDatos'])) { //si se aprieta el boton  de actualizar
    //escribimos los nuevos datos
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $email = $_POST['Email'];
    $telefono=$_POST['Telefono'];

    //buscamos por el metodo estatico al Cliente a editar
    $cliente = Cliente::getById($id);
    $cliente->Nombre = $nombre;
    $cliente->Apellido = $apellido;
    $cliente->Email = $email;
    $cliente->Telefono=$telefono;
    $cliente->update(); //lo actualizamos con los datos escritos en las variables de arriba

    header('Location: indexClientes.php');
} else { //si el boton no se apreto, entonces agarra al  Cliente a editar

    $cliente = Cliente::getById($id);
    if ($cliente) { //si se encuentra te muestra el formulario
        require_once __DIR__ . '/../../views/Clientes/updateClientes.view.php';
    }
}