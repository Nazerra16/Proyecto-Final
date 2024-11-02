<?php
require_once 'Conexion.php';

class Vehiculo extends Conexion
{
    public $ID_Clientes, $ID_Vehiculo, $Patente;

    public function create() // Método para crear un nuevo patente
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO vehiculos (Patente) VALUES (?)");
        $pre->bind_param("s", $this->Patente);

        $pre->execute();
    }

    public function delete()
    { // Método para eliminar un patente

        $this->conectar();
        $pre = mysqli_prepare($this->con, "DELETE FROM vehiculos WHERE ID_Vehiculo =  ?");
        $pre->bind_param("i", $this->ID_Vehiculo);
        $pre->execute();
    }

    public function update()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE vehiculos SET ID_Cliente = ? WHERE ID_Vehiculo = ?");
        $pre->bind_param("ii", $this->ID_Clientes, $this->ID_Vehiculo);
        $pre->execute();
    }
    
    public static function getByPatente($patente)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $result = mysqli_prepare($conexion->con, "SELECT * FROM vehiculos WHERE Patente = ?");
        $result->bind_param("s", $patente);
        $result->execute();
        $valorDb = $result->get_result();
        $vehiculo = $valorDb->fetch_object(Vehiculo::class);
        return $vehiculo;
    }
}
