<?php
require_once 'Conexion.php';
require_once 'Vehiculo.php';
class Cliente extends Conexion
{
    public $ID_Clientes, $Nombre, $Apellido, $Email, $Telefono, $ID_Usuario;

    public function create()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO clientes (Nombre, Apellido, Email, Telefono) VALUES (?, ?, ?, ?)");
        $pre->bind_param("ssss", $this->Nombre, $this->Apellido, $this->Email, $this->Telefono);
        if ($pre->execute()) {
            return $this->con->insert_id;
        }
        return false;
    }

    public function delete()
    {
        $this->conectar();
        
        // Primero obtenemos todos los vehículos del cliente
        $vehiculos = Vehiculo::getByClienteId($this->ID_Clientes);
        
        // Para cada vehículo
        foreach ($vehiculos as $vehiculo) {
            // Primero eliminamos los lavados asociados al vehículo
            $pre = mysqli_prepare($this->con, "DELETE FROM lavados WHERE ID_Vehiculo = ?");
            $pre->bind_param("i", $vehiculo->ID_Vehiculo);
            $pre->execute();
        }
        
        // Luego eliminamos todos los vehículos del cliente
        $pre = mysqli_prepare($this->con, "DELETE FROM vehiculos WHERE ID_Clientes = ?");
        $pre->bind_param("i", $this->ID_Clientes);
        $pre->execute();
        
        // Finalmente eliminamos al cliente
        $pre = mysqli_prepare($this->con, "DELETE FROM clientes WHERE ID_Clientes = ?");
        $pre->bind_param("i", $this->ID_Clientes);
        $pre->execute();
    }

    public function update()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE clientes SET Nombre = ?, Apellido = ?, Email = ?, Telefono = ? WHERE ID_Clientes = ?");
        $pre->bind_param("ssssi", $this->Nombre, $this->Apellido, $this->Email, $this->Telefono, $this->ID_Clientes);
        $pre->execute();
    }

    public static function all()
{
    $conexion = new Conexion();
    $conexion->conectar();
    $result = mysqli_prepare($conexion->con, "SELECT * FROM clientes");
    $result->execute();
    $valoresDb = $result->get_result();
    $Clientes = [];
    while ($cliente = $valoresDb->fetch_object(Cliente::class)) {
        $Clientes[] = $cliente;
    }
    return $Clientes;
}

    public static function getById($id)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $result = mysqli_prepare($conexion->con, "SELECT * FROM clientes WHERE ID_Clientes = ?");
        $result->bind_param("i", $id);
        $result->execute();
        $valorDb = $result->get_result();
        $cliente = $valorDb->fetch_object(Cliente::class);
        return $cliente;
    }
}
