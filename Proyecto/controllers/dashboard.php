<?php
session_start();
require_once __DIR__ . '/../models/Usuario.php';

// Verifica si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Obtén la información del usuario
$usuario = Usuario::getById($_SESSION['user_id']);

if ($usuario) {
    $_SESSION['username'] = $usuario->Usuario; // Guarda el nombre de usuario en la sesión
} else {
    // Si no se encuentra el usuario, redirige al login
    session_destroy();
    header('Location: login.php');
    exit();
}

require_once __DIR__ . '/../views/dashboard.view.php';
