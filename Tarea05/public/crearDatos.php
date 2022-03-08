<?php
session_start();
require '../vendor/autoload.php';

use Clases\Jugador;
use Faker\Factory;

$jugador = (new Jugador())->borrarTodo();
$jugador = null;
$faker = Factory::create("es_ES");
for ($i = 0; $i < 15; $i++) {
    $jugador=new Jugador();
    $jugador->setNombre($faker->firstName);
    $jugador->setApellidos($faker->lastName." ".$faker->lastName);
    $jugador->setDorsal($faker->unique()->numberBetween(1,25));
    $jugador->setPosicion($faker->numberBetween(1, 6));
    $jugador->setBarcode($faker->unique->ean13);
    $jugador->create();
    $jugador = null;
}
$_SESSION['mensaje'] = 'Datos de Ejemplo Creados Correctamente';
header('Location:jugadores.php');