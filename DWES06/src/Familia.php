<?php

namespace Clases;

require '../vendor/autoload.php';

use PDO;
use PDOException;

class Familia extends Conexion
{
    /**
     * Familia constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param
     * @return array
     */
    public function mostrarFamilias()
    {
        $consulta = ("SELECT cod FROM familias ORDER BY cod");
        $stmt = self::$conexion->prepare($consulta);
        try {
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar: " . $ex->getMessage());
        }
        while ($filas = $stmt->fetch(PDO::FETCH_OBJ)) {
            $familias[] = $filas->cod;
        }
        return $familias;
    }
}
