<?php

namespace Clases;

require '../vendor/autoload.php';

use Clases\{Stock, Producto, Familia};

class Operaciones
{
    /**
     * Obtiene el PVP de un producto a partir de su codigo
     * @soap
     * @param int $id
     * @return float
     */
    //getPVP. Recibe como parámetro el código de un producto, y devuelve el PVP correspondiente al mismo.
    function getPvp($id)
    {
        $producto = new Producto();
        $producto->setId($id);
        $pvp = $producto->pvpProducto();
        $producto = null;
        return $pvp;
    }
    /**
     * Devuelve el numero de unidades que existen en una tienda de un producto
     * @soap
     * @param int $idP
     * @param int $tienda
     * @return int
     */

    //getStock.Recibe dos parámetros: el código de un producto y el código de una tienda. Devuelve el stock existente en dicha tienda del producto.
    function getStock($idP, $tienda)
    {
        $stock = new Stock();
        $stock->setProducto($idP);
        $stock->setTienda($tienda);
        $unidadesProducto = $stock->unidadesTienda();
        $stock = null;
        return $unidadesProducto;
    }
    /**
     * Devuelve un array con los codigos de todas las familias
     * @soap
     * @param
     * @return string[]
     */
    //getFamilias. No recibe parámetros y devuelve un array con los códigos de todas las familias existentes.
    function getFamilias()
    {
        $familia = new Familia();
        $codFamilia = $familia->mostrarFamilias();
        $familia = null;
        return $codFamilia;
    }
    /**
     * Devuelve un array con los nombres de los productos de una familia
     * @soap
     * @param string $familia
     * @return string[]
     */
    //getProductosFamilia. Recibe como parámetro el código de una familia y devuelve un array con los códigos de todos los productos de esa familia.
    function getProducto($familia)
    {
        $producto = new Producto();
        $famProducto = $producto->familiaProducto($familia);
        $producto = null;
        return $famProducto;
    }
}
