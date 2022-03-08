<?php
require '../vendor/autoload.php';


use Clases\Jugador;

$jugador = new Jugador();
if ($jugador->tieneDatos()) {
    $jugador = null;
    header('Location: jugadores.php');
} else {
    $jugador = null;
    header('Location: instalacion.php');
}



