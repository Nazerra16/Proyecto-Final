<?php
require_once __DIR__ . "/../../models/Empleado.php";

$empleados = Empleado::all(); // Asegúrate de que esta variable se llame 'empleados'
require_once "../../views/Empleados/indexEmpleados.view.php";