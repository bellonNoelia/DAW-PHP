<?php

namespace Clases;

use PDO;
use PDOException;

class Stock extends Conexion
{
    private $producto;
    private $tienda;


    public function __construct()
    {
        parent::__construct();
    }
    function setProducto($producto)
     {
          $this->producto = $producto;
     }
     function setTienda($tienda)
     {
          $this->tienda = $tienda;
     }
     function getproducto()
     {
          return  $this->producto;
     }
     function getTienda()
     {
        return  $this->tienda;
     }


    function stock()
    {
        $consulta = "SELECT unidades FROM stock WHERE producto=:p AND tienda=:t";
        $stmt = $this->conexion->prepare($consulta);
        try {
            $stmt->execute([':p' => $this->producto,
                            ':t' => $this->tienda]);
        } catch (PDOException $ex) {
            die("Error al recuperar el producto: " . $ex->getMessage());
        }
        $stmt->fetchAll(PDO::FETCH_OBJ); //Devolvemos con All sólo es una fila
        while ($filas = $stmt->fetch(PDO::FETCH_OBJ)) {
           //-----
        }
       
    }
}
