<?php

namespace Clases;

use PDO;
use PDOException;

class Producto extends Conexion
{
    private $id;
    private $pvp;


    public function __construct()
    {
        parent::__construct();
    }
    function setId($id)
     {
          $this->id = $id;
     }
     function setPrecio($pvp)
     {
          $this->pvp = $pvp;
     }
     function getId()
     {
          return  $this->id;
     }
     function getPrecio()
     {
        return  $this->pvp;
     }


    function pvpProducto()
    {
        $consulta = "SELECT pvp FROM productos WHERE id=:i";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $this->id]);
        } catch (PDOException $ex) {
            die("Error al recuperar el producto: " . $ex->getMessage());
        }
        $stmt->fetchAll(PDO::FETCH_OBJ); //Devolvemos con All sólo es una fila
        while ($filas = $stmt->fetch(PDO::FETCH_OBJ)) {
            //-----
        }
    }

    function familiaProducto($familia)
    {
        $consulta = "SELECT id FROM productos WHERE familia=:f";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':f' => $familia]);
        } catch (PDOException $ex) {
            die("Error al recuperar el producto: " . $ex->getMessage());
        }
        $stmt->fetchAll(PDO::FETCH_OBJ); //Devolvemos con All sólo es una fila
        while ($filas = $stmt->fetch(PDO::FETCH_OBJ)) {
            //-----
        }
    }
}
