<?php
require '../vendor/autoload.php';

use Clases\Jugador;
$jugador=new Jugador();

do{
    //generar ean13
}while($jugador->barcodeExiste($barcode));
