<?php

require_once __DIR__ . '/../../models/Empleado.php';

$id = $_GET['id']; //conseguimos el id del Empleado a eliminar por get, osea que esta en la URL

$empleado = Empleado::getById($id); //buscamos ese Empleado por id

if ($empleado) { //si se encontro el Empleado, entonces lo eliminamos por el metodo delete
    $empleado->delete();
    header('Location: ../Empleados/indexEmpleados.php');
}