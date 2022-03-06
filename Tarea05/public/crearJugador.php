<?php

require '../vendor/autoload.php';

use Clases\Jugador;
//Creamos el objeto
$jugador = new Jugador();
//Función para comprobar que el campo nombre y apellidos no están vacíos y el dorsal no existe
function comprobar(&$n, &$ap, &$dor)
{
        global $jugador;
        //comprobamos que no esten vacios ni nombre ni apellidos
        if (strlen($n) == 0 || strlen($ap) == 0) {
                error("<div class='content alert alert-danger' role='alert'> Ni el Nombre ni el ni los Apellidos pueden estar en blanco</div>");
        }

        // y comprobamos que nombre corto no exista el dorsal.
        if ($jugador->dorsalExiste($dor)) {
                error("<div class='content alert alert-danger' role='alert'> El dorsal ya existe </div>");
        }
}
//Si existe crear, es decir si clicamos en crear hará lo que está entre las llaves.
if (isset($_POST['crear'])) {
        //Creamos variables de la información enviada
        $nombre = trim($_POST['nombre']);
        $apellidos = trim($_POST['apellidos']);
        $dorsal = $_POST['dorsal'];
        $posicion = $_POST['posicion'];
        $barcode = $_POST['barcode'];
        //Realizamos la comprobación:
        comprobar($nombre, $apellidos, $dorsal);
        //Si todo está correcto creamos el resgistro del jugador
        $jugador->setNombre($nombre);
        $jugador->setApellidos($apellidos);
        $jugador->setDorsal($dorsal);
        $jugador->setPosicion($posicion);
        $jugador->setBarcode($barcode);
        $jugador->create();
        echo "<div class='alert alert-success' role='alert' > Jugador : $nombre  agregado correctamente.</div>";
}else{
        header('Location:fcrear.php');
        exit();
}
