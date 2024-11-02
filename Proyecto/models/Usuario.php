<?php
require_once 'conexion.php';

class Usuario extends Conexion
{
    public $ID_Usuario, $Usuario, $Contraseña, $es_nuevo;

    public function create()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO usuarios (Usuario, Contraseña, es_nuevo) VALUES (?, ?, TRUE)");
        $pre->bind_param("ss", $this->Usuario, $this->Contraseña);
        $pre->execute();
        return $this->con->insert_id;
    }

    public static function authenticate($username, $password)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $stmt = mysqli_prepare($conexion->con, "SELECT * FROM usuarios WHERE Usuario = ? LIMIT 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_object(Usuario::class);

        if ($user && password_verify($password, $user->Contraseña)) {
            return $user; // Devuelve el objeto Usuario completo
        }
        return null;
    }

    public static function existeUsuario($username)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $stmt = mysqli_prepare($conexion->con, "SELECT COUNT(*) as count FROM usuarios WHERE Usuario = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }

    public static function getById($id)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $stmt = mysqli_prepare($conexion->con, "SELECT * FROM usuarios WHERE ID_Usuario = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_object(Usuario::class);
    }
    public function marcarComoExistente()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE usuarios SET es_nuevo = FALSE WHERE ID_Usuario = ?");
        $pre->bind_param("i", $this->ID_Usuario);
        $pre->execute();
    }
}
