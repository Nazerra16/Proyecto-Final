<?php
require_once 'Conexion.php';

class Empleado extends Conexion
{
    public $ID_Empleado, $Nombre, $Apellido, $Telefono, $ID_Usuario;

    public function create()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO empleados (Nombre, Apellido, Telefono, ID_Usuario) VALUES (?, ?, ?, ?)");
        $pre->bind_param("sssi", $this->Nombre, $this->Apellido, $this->Telefono, $this->ID_Usuario);
        return $pre->execute();
    }

    public function delete()
    {

        $this->conectar();
        $pre = mysqli_prepare($this->con, "DELETE FROM empleados WHERE ID_Empleado =  ?");
        $pre->bind_param("i", $this->ID_Empleado);
        $pre->execute();
    }

    public function update()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE empleados SET Nombre = ?, Apellido = ?, Telefono = ? WHERE ID_Empleado = ?");
        $pre->bind_param("sssi", $this->Nombre, $this->Apellido, $this->Telefono, $this->ID_Empleado);
        $pre->execute();
    }

    public static function all() // Método para obtener todos los Empleados
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $result = mysqli_prepare($conexion->con, "SELECT * FROM empleados");
        $result->execute();
        $valoresDb = $result->get_result();
        $Empleados = [];
        while ($empleado = $valoresDb->fetch_object(Empleado::class)) { // Obtenemos cada empleado de la base de datos y las hacemos objetos

            $Empleados[] = $empleado; // Los almacenamos en un array

        }
        return $Empleados;
    }

    public static function getById($id)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $result = mysqli_prepare($conexion->con, "SELECT * FROM empleados WHERE ID_Empleado = ?");
        $result->bind_param("i", $id);
        $result->execute();
        $valorDb = $result->get_result();
        $empleado = $valorDb->fetch_object(Empleado::class);
        return $empleado;
    }
}
