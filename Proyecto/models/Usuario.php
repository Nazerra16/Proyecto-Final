<?php
require_once 'conexion.php';

class Usuario extends Conexion {
    public $ID_Usuario, $Usuario, $Contraseña;

    public function create() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO usuarios (Usuario, Contraseña) VALUES (?, ?)");
        $pre->bind_param("ss", $this->Usuario, $this->Contraseña);
        $pre->execute();
    }

}

 