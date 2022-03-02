<?php

class Jugador{

    private $nombre;
    private $apellidos;
    private $posicion;
    private $numeroDorsal;
    private $codigoBarras;

    function __construct($nombre,$apellidos,$posicion,$numeroDorsal,$codigoBarras)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->posicion = $posicion;
        $this->numeroDorsal = $numeroDorsal;
        $this->codigoBarras = $codigoBarras;
        

    }

    function __set($name, $value)
    {
        
    }

}
?>