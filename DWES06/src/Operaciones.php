<?php

namespace Clases;

class Operaciones
{
    function getPvp($id)
    {
        $producto = new Producto();
        $producto->setId($id);
        $pvp = $producto->pvpProducto();
        return $pvp;
        $producto = null;
    }

    function getStock($idP, $tienda)
    {
        $stock = new Stock();
        $stock->setProducto($idP);
        $stock->setTienda($tienda);
        $stockProducto = $stock->stock();
        return $stockProducto;
        $stock = null;
    }

    function getFamilias()
    {
        $familia = new Familia();
        $codFamilia = $familia->mostrarFamilias();
        return $codFamilia;
        $familia = null;
    }

    function getProdutos($familia)
    {
        $producto = new Producto();
        $famProducto = $producto->familiaProducto($familia);
        return $famProducto;
        $producto = null;
    }
}
