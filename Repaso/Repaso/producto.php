<?php
require_once 'Conexion.php';
require_once 'Producto.php';
require_once 'Familia.php';
$conexion=new Conexion();
echo "\nIntroduce el usuario: ";
$user=readline();
echo "\nIntroduce el password: ";
$pass=readline();

$consulta="SELECT user FROM mysql.user WHERE ;"
if()
$producto=new Producto();




echo "\nIntroduce un nombre: ";
$nombre=readline();
$producto->setNombre($nombre);

echo "\nIntroduce un nombre corto: ";
$nombre_corto=readline();
$producto->setNombre_corto($nombre_corto);

echo "\nIntroduce una descripción del producto: ";
$descripcion=readline();
$producto->setDescripcion($descripcion);

echo "\nIntroduce un precio del producto: ";
$pvp=readline();
$producto->setPrecio($pvp);
$familia=new Familia($user,$pass);
echo "\nListado familias: ";
$familia->mostrarFamilias();

echo "\nIntroduce una familia del producto: ";
$familia=readline();
$producto->setFamilia($familia);
$producto->crear();
echo"\nProducto: ";
$producto->verProducto();
