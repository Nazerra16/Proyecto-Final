<?php
require_once 'Conexion.php';

class Vehiculo extends Conexion
{
    public $ID_Vehiculo, $Patente, $ID_Clientes;

    public function create()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO vehiculos (Patente, ID_Clientes) VALUES (?, ?)");
        $pre->bind_param("si", $this->Patente, $this->ID_Clientes);
        return $pre->execute();
    }

    public static function getByClienteId($clienteId)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $stmt = mysqli_prepare($conexion->con, "SELECT * FROM vehiculos WHERE ID_Clientes = ?");
        $stmt->bind_param("i", $clienteId);
        $stmt->execute();
        $result = $stmt->get_result();
        $vehiculos = [];
        while ($vehiculo = $result->fetch_object(Vehiculo::class)) {
            $vehiculos[] = $vehiculo;
        }
        return $vehiculos;
    }

    public static function getById($id)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $result = mysqli_prepare($conexion->con, "SELECT * FROM vehiculos WHERE ID_Vehiculo = ?");
        $result->bind_param("i", $id);
        $result->execute();
        $valorDb = $result->get_result();
        $vehiculo = $valorDb->fetch_object(Vehiculo::class);
        return $vehiculo;
    }

    public function delete()
{
    $this->conectar();
    // Primero eliminamos los lavados asociados al vehículo si existen
    $pre = mysqli_prepare($this->con, "DELETE FROM limpiezas WHERE ID_Vehiculo = ?");
    $pre->bind_param("i", $this->ID_Vehiculo);
    $pre->execute();
    
    // Luego eliminamos el vehículo
    $pre = mysqli_prepare($this->con, "DELETE FROM vehiculos WHERE ID_Vehiculo = ?");
    $pre->bind_param("i", $this->ID_Vehiculo);
    return $pre->execute();
}
}
