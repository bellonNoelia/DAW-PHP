<?php

use Clases\Conexion;
use PDO;
use PDOException;

class Jugador  extends Conexion
{

    private $nombre;
    private $apellidos;
    private $posicion;
    private $numeroDorsal;
    private $codigoBarras;

    function __construct($nombre, $apellidos, $posicion, $numeroDorsal, $codigoBarras)
    {
        parent::__construct();
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;
    }
    public function setDorsal($numeroDorsal)
    {
        $this->numeroDorsal = $numeroDorsal;
    }
    public function setCodigo($codigoBarras)
    {
        $this->codigoBarras = $codigoBarras;
    }

    //Función para crear jugadores:
    function create()
    {
        $insert = "INSERT INTO practicaUnidad5(nombre,apellidos,dorsal,posicion,barcode)
        VALUES (:n,:a,:d,:p,:b)";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':a' => $this->apellidos,
                ':d' => $this->numeroDorsal,
                ':p' => $this->posicion,
                ':b' => $this->codigoBarras
            ]);
        } catch (PDOException $ex) {
            die("Ocurrio un error al insertar el jugador: " . $ex->getMessage());
        }
    }
    //Función para leer los datos de un jugador:
    function read()
    {
        $consulta = "SELECT * FROM practicaUnidad5 WHERE id=:i";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $this->id]);
        } catch (PDOException $ex) {
            die("Error al recuperar el jugador: " . $ex->getMessage());
        }
        return $stmt->fetchAll(PDO::FETCH_OBJ); //Devolvemos con All sólo es una fila
    }
}
?>
