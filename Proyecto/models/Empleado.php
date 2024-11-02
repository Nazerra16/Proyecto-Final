<?php
require_once 'Conexion.php';

class Empleado extends Conexion{
    public $ID_Empleado, $Nombre, $Apellido, $Telefono;

    public function create() // Método para crear un nuevo empleado
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO empleados (Nombre, Apellido, Telefono) VALUES (?, ?, ?)");
        $pre->bind_param("ssi", $this->Nombre, $this->Apellido,  $this->Telefono);

        $pre->execute();
    }

    public function delete(){// Método para eliminar un empleado

        $this->conectar();
        $pre = mysqli_prepare($this->con, "DELETE FROM empleados WHERE ID_Empleado =  ?");
        $pre->bind_param("i", $this->ID_Empleado);
        $pre->execute();

    }

    public function update() // Método para actualizar un empleado
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE empleados SET Nombre = ?, Apellido = ?, Telefono = ? WHERE id = ?");
        $pre->bind_param("ssii", $this->Nombre, $this->Apellido, $this->Telefono, $this->ID_Empleado);
        $pre->execute();
    }

    public static function all() // Método para obtener todos los Empleados
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $result = mysqli_prepare($conexion->con, "SELECT * FROM Empleados");
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