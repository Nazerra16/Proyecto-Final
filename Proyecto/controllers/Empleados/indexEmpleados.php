<?php

require_once __DIR__ . "/../../models/Empleado.php";

$empleado = Empleado::all();
//lista de todos los Empleados
require_once "../../views/Empleados/indexEmpleados.view.php";
