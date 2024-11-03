<?php
class Lavado extends Conexion
{
    public $ID_Limpieza, $ID_Vehiculo, $ID_Empleado, $Inicio, $Fin;

    public function iniciarLavado()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO lavados (ID_Vehiculo, ID_Empleado, Inicio) VALUES (?, ?, NOW())");
        $pre->bind_param("ii", $this->ID_Vehiculo, $this->ID_Empleado);
        return $pre->execute();
    }

    public function finalizarLavado()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE lavados SET Fin = NOW() WHERE ID_Limpieza = ?");
        $pre->bind_param("i", $this->ID_Limpieza);
        return $pre->execute();
    }

    public static function getLavadoActivo($id_vehiculo)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $stmt = mysqli_prepare($conexion->con, "SELECT * FROM lavados WHERE ID_Vehiculo = ? AND Fin IS NULL");
        $stmt->bind_param("i", $id_vehiculo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_object(Lavado::class);
    }

    public static function getById($id_lavado)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $stmt = mysqli_prepare($conexion->con, "SELECT * FROM lavados WHERE ID_Limpieza = ?");
        $stmt->bind_param("i", $id_lavado);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_object(Lavado::class);
    }
}