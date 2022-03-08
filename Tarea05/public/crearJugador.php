<?php
session_start();
require '../vendor/autoload.php';

use Clases\Jugador;

function error($text)
{
        $_SESSION['error'] = $text;
        header('Location:fcrear.php');
        die();
}

//Función para comprobar que el campo nombre y apellidos no están vacíos y el dorsal no existe
function comprobar(&$n, &$ap)
{
        //comprobamos que no esten vacios ni nombre ni apellidos
        if (strlen($n) == 0 || strlen($ap) == 0) {
                error("Ni el Nombre ni el ni los Apellidos pueden estar en blanco");
        }
}

//Creamos variables de la información enviada
$nombre = trim($_POST['nombre']);
$apellidos = trim($_POST['apellidos']);
$dorsal = (int)$_POST['dorsal'];
$posicion = $_POST['posicion'];
$barcode = $_POST['barcode'];
//Realizamos la comprobación:
comprobar($nombre, $apellidos);
//Creamos el objeto
$jugador = new Jugador();
// y comprobamos que nombre corto no exista el dorsal.
if ($jugador->dorsalExiste($dor)) {
        $jugador = null;
        error("El dorsal ya existe");
}
//Si todo está correcto creamos el resgistro del jugador
$jugador->setNombre($nombre);
$jugador->setApellidos($apellidos);
$jugador->setPosicion($posicion);
if ($dorsal != 0) $jugador->setDorsal($dorsal);
$jugador->setBarcode($barcode);
$jugador->create();
$_SESSION['mensaje'] = "Jugador Creado con exito";

header('Location:fcrear.php');
