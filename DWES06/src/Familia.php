<?php

namespace Clases;

use PDO;
use PDOException;

class Familia extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    
    public function mostrarFamilias()
    {
        $consulta = "SELECT cod FROM familias ORDER BY nombre";
        $stmt = $this->conexion->prepare($consulta);
        try {
            echo $stmt->execute();
        } catch (PDOException $ex) {
            die("Error al recuperar: " . $ex->getMessage());
        }
        while ($filas = $stmt->fetch(PDO::FETCH_OBJ)) {
            //-----
        }
    }
    


}
