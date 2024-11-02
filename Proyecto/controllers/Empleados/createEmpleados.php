<?php
require_once __DIR__ . '/../../models/Empleado.php'; //incluimos archivos  de modelos para utilizar la clase Empleado


if (isset($_POST['crearEmpleado'])) { //si se aprieta  el boton de crear Empleado que esta en el indexview 
    //guarda  los datos del formulario en variables

    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $telefono=$_POST['Telefono'];

    $empleado = new Empleado(); //se crea una nueva instancia
    $empleado->Nombre = $nombre; //se asignan los valores agarrados en las variables de arriba
    $empleado->Apellido = $apellido;
    $empleado->Telefono=$telefono;
    $empleado->create(); //se crea el objeto y se guarda en la base de datos

    header('location: indexEmpleados.php'); //te redirije al index
}
require_once __DIR__ . '/../../views/Empleados/createEmpleados.view.php';