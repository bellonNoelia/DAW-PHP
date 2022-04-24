<?php

namespace Clases;

require '../vendor/autoload.php';

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
    /**
     * @param mixed $producto
     */
    function setProducto($producto)
    {
        $this->producto = $producto;
    }
    /**
     * @param mixed $tienda
     */
    function setTienda($tienda)
    {
        $this->tienda = $tienda;
        /**
         * @return mixed
         */
    }
    function getproducto()
    {
        return  $this->producto;
    }
    /**
     * @return mixed
     */
    function getTienda()
    {
        return  $this->tienda;
    }

    /*
     * @param
     * @return int|null
     */
    function unidadesTienda()
    {
        $consulta = ("SELECT unidades FROM stocks WHERE producto=:p AND tienda=:t");
        $stmt = self::$conexion->prepare($consulta);
        try {
            $stmt->execute([
                ':p' => $this->producto,
                ':t' => $this->tienda
            ]);
        } catch (PDOException $ex) {
            die("Error al recuperar el stock del producto: " . $ex->getMessage());
        }
        if ($stmt->rowCount() == 0) return null;
        //Para que devuelva el dato concreto ustilizamos fetch() sino nos devuelve 1
        $fila = $stmt->fetch();
        $stock=$fila['unidades'];
        return $stock;
    }
}
