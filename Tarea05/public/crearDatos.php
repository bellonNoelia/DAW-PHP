<?php
require '../vendor/autoload.php';

use Clases\Jugador;
use Faker\Calculator\Ean;

$faker = Faker\Factory::create("es_ES");
for ($i = 0; $i < 5; $i++) {
    $jugador=new Jugador();
    $jugador->setNombre($faker->firstName());
    $jugador->setApellidos($faker->lastName());
    $jugador->setDorsal($faker->unique()->numberBetween(1,25));
    $jugador->setPosicion($faker->randomElement(['Portero', 'Defensa', 'Lateral Izquierdo', 'Lateral Derecho', 'Central', 'Delantero']));
    $jugador->setBarcode($faker->unique(Ean13));
}
