<?php
session_start();
require '../vendor/autoload.php';

use Clases\Jugador;
use Milon\Barcode\DNS1D;
use Philo\Blade\Blade;
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);
$d = new DNS1D();
$d->setStorPath($cache);
$titulo = 'Jugadores';
$encabezado = 'Listado de Jugadores';
$jugadores = (new Jugador())->listadoJugadores();

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']); //para no volver a repetir el mensaje
    echo $blade
        ->view()
        ->make('vjugadores', compact('titulo', 'encabezado', 'jugadores', 'd', 'mensaje'))
        ->render();
} else {
    echo $blade
        ->view()
        ->make('vjugadores', compact('titulo', 'encabezado', 'jugadores', 'd'))
        ->render();
}
