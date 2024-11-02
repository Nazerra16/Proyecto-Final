<?php
require_once __DIR__ . '/../../models/Empleado.php';
require_once __DIR__ . '/../../models/Usuario.php'; // Agregar esta línea
session_start();

if (isset($_POST['crearEmpleado'])) {
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $telefono = $_POST['Telefono'];

    // Verifica si el ID_Usuario está en la sesión
    if (!isset($_SESSION['user_id'])) {
        die("Error: No se ha encontrado el ID de usuario en la sesión.");
    }

    $id_usuario = $_SESSION['user_id'];

    $empleado = new Empleado();
    $empleado->Nombre = $nombre;
    $empleado->Apellido = $apellido;
    $empleado->Telefono = $telefono;
    $empleado->ID_Usuario = $id_usuario;

    if ($empleado->create()) {
        // Marcar al usuario como no nuevo
        $usuario = Usuario::getById($_SESSION['user_id']);
        if ($usuario) {
            $usuario->marcarComoExistente();
        }
        header('location: indexEmpleados.php');
    } else {
        echo "Error al crear el empleado";
    }
}

require_once __DIR__ . '/../../views/Empleados/createEmpleados.view.php';
