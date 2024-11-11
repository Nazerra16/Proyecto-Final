<?php

require_once __DIR__ . '/../../models/Empleado.php';

$id = $_GET['id']; //obtenemos id por url

if (isset($_POST['actualizarEmpleado'])) { //si se aprieta el boton  de actualizar
    //escribimos los nuevos datos
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $telefono = $_POST['Telefono'];

    //buscamos por el metodo estatico al Cliente a editar
    $empleado = Empleado::getById($id);
    $empleado->Nombre = $nombre;
    $empleado->Apellido = $apellido;
    $empleado->Telefono = $telefono;
    $empleado->update(); //lo actualizamos con los datos escritos en las variables de arriba

    header('Location: indexEmpleados.php');
} else { //si el boton no se apreto, entonces agarra al  Cliente a editar

    $empleado = Empleado::getById($id);
    if ($empleado) { //si se encuentra te muestra el formulario
        require_once __DIR__ . '/../../views/Empleados/updateEmpleados.view.php';
    }
}