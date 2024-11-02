<?php
require_once __DIR__ . '/../models/Usuario.php';
session_start();

if (isset($_POST['register'])) {
    $username = $_POST['Usuario'];
    $password = $_POST['Contraseña'];

    // Verificar si el usuario ya existe
    if (Usuario::existeUsuario($username)) {
        $error = "El nombre de usuario ya está en uso";
        require_once __DIR__ . '/../views/register.view.php';
        exit();
    }

    $usuario = new Usuario();
    $usuario->Usuario = $username;
    $usuario->Contraseña = password_hash($password, PASSWORD_DEFAULT);

    $id_usuario = $usuario->create();
    if ($id_usuario) {
        $_SESSION['user_id'] = $id_usuario;
        header('Location: Empleados/createEmpleados.php');
        exit();
    } else {
        $error = "Error al crear el usuario";
    }
}

require_once __DIR__ . '/../views/register.view.php';
