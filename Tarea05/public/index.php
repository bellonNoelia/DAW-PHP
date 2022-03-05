<?php
require '../vendor/autoload.php';

use Clases\Jugador;
use Philo\Blade\Blade;

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);