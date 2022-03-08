<?php
session_start();
require '../vendor/autoload.php';


use Philo\Blade\Blade;

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'Nuevo';
$encabezado = 'Crear Jugador';
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    echo $blade
        ->view()
        ->make('vcrear', compact('titulo', 'encabezado', 'error'))
        ->render();
    unset($_SESSION['error']);
} else {
    echo $blade
        ->view()
        ->make('vcrear', compact('titulo', 'encabezado'))
        ->render();
}