<?php

namespace Clases;

require '../vendor/autoload.php';

use PDO;
use PDOException;

class Producto extends Conexion
{
    private $id;
    private $pvp;

    /**
     * Producto constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @param mixed $id
     */
    function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @param mixed $pvp
     */
    function setPrecio($pvp)
    {
        $this->pvp = $pvp;
    }
    /**
     * @return mixed
     */
    function getId()
    {
        return  $this->id;
    }
    /**
     * @return mixed
     */
    function getPrecio()
    {
        return  $this->pvp;
    }
    /*
     * @param
     * @return eES|null
     */

    function pvpProducto()
    {
        $consulta = ("SELECT pvp FROM productos WHERE id=:i");
        $stmt = self::$conexion->prepare($consulta);
        try {
            $stmt->execute([':i' => $this->id]);
        } catch (PDOException $ex) {
            die("Error al recuperar el precio : " . $ex->getMessage());
        }
        if ($stmt->rowCount() == 0) return null;
        //Para que devuelva el dato concreto ustilizamos fetch() sino nos devuelve 1
        $fila = $stmt->fetch();
        $precio=$fila['pvp'];
        return $precio;
    }
    /*
     * @param string $familia
     * @return array|null
     */
    function familiaProducto($familia)
    {
        $consulta = ("SELECT id FROM productos WHERE familia=:f");
        $stmt = self::$conexion->prepare($consulta);
        try {
            $stmt->execute([':f' => $familia]);
        } catch (PDOException $ex) {
            die("Error al recuperar los productos de la familia: " . $ex->getMessage());
        }
        if ($stmt->rowCount() == 0) return null;
        while ($filas = $stmt->fetch(PDO::FETCH_OBJ)) {
            $productos[] = $filas->id;
        }
        return $productos;
    }
}
