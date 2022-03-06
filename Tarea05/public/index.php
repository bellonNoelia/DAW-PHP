<?php
require '../vendor/autoload.php';

use Clases\Jugador;

$jugador = new Jugador();

if(!$jugador->tablaVacia){
        header('Location:jugadores.php');
        exit();
}else{
        header('Location:instalacion.php');
    exit();
}




