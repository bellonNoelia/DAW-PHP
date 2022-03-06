<?php
require '../vendor/autoload.php';

use Clases\Jugador;

$jugador = new Jugador();
$consulta = $this->conexion->query("SELECT * FROM jugadores");
echo $consulta;
if($consulta->num_rows > 0){
        header('Location:jugadores.php');
        exit();
}else{
        header('Location:instalacion.php');
    exit();
}

