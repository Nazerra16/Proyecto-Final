<?php
require_once __DIR__ . '/../models/Usuario.php';
session_start();

if (isset($_POST['login'])) {
    // Verifica que los campos existan en el formulario
    if (isset($_POST['Usuario']) && isset($_POST['Contraseña'])) {
        $username = $_POST['Usuario'];
        $password = $_POST['Contraseña'];

        $usuario = Usuario::authenticate($username, $password);

        if ($usuario) {
            $_SESSION['user_id'] = $usuario->ID_Usuario;

            if ($usuario->es_nuevo) {
                // Si es un usuario nuevo, redirigir a crear empleado
                header('Location: Empleados/createEmpleados.php');
                exit();
            } else {
                // Si es un usuario existente, redirigir al dashboard
                header('Location: dashboard.php');
                exit();
            }
        } else {
            $error = "Usuario o contraseña incorrectos";
        }
    } else {
        $error = "Por favor, complete todos los campos";
    }
}

require_once __DIR__ . '/../views/login.view.php';
