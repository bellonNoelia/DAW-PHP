<?php

use Clases\Conexion;
use PDO;
use PDOException;

class Jugador  extends Conexion
{

    private $nombre;
    private $apellidos;
    private $posicion;
    private $dorsal;
    private $barcode;

    function __construct(){
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
    public function setDorsal($dorsal)
    {
        $this->dorsal = $dorsal;
    }
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }

    //Función para crear jugadores:
    function create()
    {
        $insert = "INSERT INTO jugadores(nombre,apellidos,dorsal,posicion,barcode)
        VALUES (:n,:a,:d,:p,:b)";
        $stmt = $this->conexion->prepare($insert);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':a' => $this->apellidos,
                ':d' => $this->dorsal,
                ':p' => $this->posicion,
                ':b' => $this->barcode
            ]);
        } catch (PDOException $ex) {
            die("Ocurrió un error al insertar el jugador: " . $ex->getMessage());
        }
    }
    //Función para leer los datos de un jugador:
    function read()
    {
        $consulta = "SELECT * FROM jugadores WHERE id=:i";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $this->id]);
        } catch (PDOException $ex) {
            die("Error al recuperar el jugador: " . $ex->getMessage());
        }
        return $stmt->fetchAll(PDO::FETCH_OBJ); //Devolvemos con All sólo es una fila
    }

    //Función para actualizar datos:
    function update(){
        $update="UPDATE jugadores SET nombre=:n,apellidos=:a,dorsal:d,posicion:p,barcode:b WHERE id=:i";
        $stmt = $this->conexion->prepare($update);
        try {
            $stmt->execute([
                ':i'=>$this->id,
                ':n' => $this->nombre,
                ':a' => $this->apellidos,
                ':d' => $this->dorsal,
                ':p' => $this->posicion,
                ':b' => $this->barcode
            ]);
        } catch (PDOException $ex) {
            die("Ocurrió un error al actualizar el jugador: " . $ex->getMessage());
        }
    }

    //Función para borrar un jugador:
    function delete(){
        $delete="DELETE FROM jugadores WHERE id=:id";
        $stmt = $this->conexion->prepare($delete);
        try {
            $stmt->execute([':i' => $this->id]);
        } catch (PDOException $ex) {
            die("Error al borrar el jugador: " . $ex->getMessage());
        }
    }

    //Función para obtener todos los jugadores:
    function listadoJugadores(){
        $consulta="SELECT * FROM jugadores ORDER BY nombre";
        $stmt = $this->conexion->prepare($consulta);
        try{
            $stmt->execute();
        }catch(PDOException $ex){
            die("Error al recuperar jugadores: " . $ex->getMessage());
        }
        return $stmt;
    }

    //Función para comprobar que el barcode ya existe
    function barcodeExiste($barc){
        //Para crear:
        if($this->id==null){
            $consulta="SELECT * FROM jugadores WHERE barcode:b";
        }else{
            //Para modificar:
                $consulta="SELECT * FROM jugadores WHERE barcode:b AND id!=:i";
        }
        $stmt=$this->conexion->prepare($consulta);
        try{
            //Para crear:
            if($this->id==null){
                $stmt->execute([':b'=>$barc]);
            }else{
                //Para modificar:
                $stmt->execute([':b'=>$barc,':i'=>$this->id]);
            }
        }catch(PDOException $ex){
            die("Error al comprobar barcode: " . $ex->getMessage());
        }

        if($stmt->rowCount()==0){
            return false; //No existe
        }else{
            return true; //Existe
        }
    }

    //Función para comprobar que el dorsal ya existe
    function dorsalExiste($dors){
        //Para crear:
        if($this->id==null){
            $consulta="SELECT * FROM jugadores WHERE dorsal:d";
        }else{
            //Para modificar:
                $consulta="SELECT * FROM jugadores WHERE dorsal:d AND id!=:i";
        }
        $stmt=$this->conexion->prepare($consulta);
        try{
            //Para crear:
            if($this->id==null){
                $stmt->execute([':b'=>$dors]);
            }else{
                //Para modificar:
                $stmt->execute([':b'=>$dors,':i'=>$this->id]);
            }
        }catch(PDOException $ex){
            die("Error al comprobar dorsal: " . $ex->getMessage());
        }

        if($stmt->rowCount()==0){
            return false; //No existe
        }else{
            return true; //Existe
        }
    }
}
