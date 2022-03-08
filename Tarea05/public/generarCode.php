<?php
require '../vendor/autoload.php';

use Clases\Jugador;
use Faker\Factory;
use Philo\Blade\Blade;
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$faker = Factory::create('es_Es');
$jugador=new Jugador();

do{
    $barcode = $faker->ean13;
}while($jugador->barcodeExiste($barcode));
$jugador = null;
$titulo = 'Nuevo';
$encabezado = 'Crear Jugador';

echo $blade
    ->view()
    ->make('vcrear', compact('titulo', 'encabezado', 'barcode'))
    ->render();