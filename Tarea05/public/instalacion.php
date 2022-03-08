<?php
session_start();
require '../vendor/autoload.php';

use Philo\Blade\Blade;

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'Install';
$encabezado = 'Instalación';
echo $blade
    ->view()
    ->make('vinstalacion', compact('titulo', 'encabezado'))
    ->render();
