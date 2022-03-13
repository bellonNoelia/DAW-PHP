<?php
class Producto extends Conexion
{
     private $id;
     private $nombre;
     private $nombre_corto;
     private $familia;
     private $pvp;
     private $descripcion;

     function __construct()
     {
          parent::__construct();
     }

     function setId($id)
     {
          $this->id = $id;
     }

     function setNombre($nombre)
     {
          $this->nombre = $nombre;
     }
     function setNombre_corto($nombre_corto)
     {
          $this->nombre_corto = $nombre_corto;
     }
     function setFamilia($familia)
     {
          $this->familia = $familia;
     }
     function setPrecio($pvp)
     {
          $this->pvp = $pvp;
     }

     function setDescripcion($descripcion)
     {
          $this->descripcion = $descripcion;
     }


     function crear()
     {
          $insert ="INSERT INTO productos(nombre,nombre_corto,descripcion,pvp,familia)
          VALUES (:nombre,:nombre_corto,:descripcion,:precio,:familia)";
          $stmt = $this->conexion->prepare($insert);
          try {
               $stmt->execute([
                    ':nombre' => $this->nombre,
                    ':nombre_corto' => $this->nombre_corto,
                    ':descripcion' => $this->descripcion,
                    ':precio' => $this->pvp,
                    ':familia' => $this->familia
               ]);
          } catch (PDOException $ex) {
               die("Error al crear producto: ".$ex->getMessage());
          }
     }

     

     function verProducto()
     {
          $consulta = "SELECT * FROM productos WHERE id=:i";
          $stmt = $this->conexion->prepare($consulta);
          try {
              $stmt->execute([':i' => $this->id]);
          } catch (PDOException $ex) {
              die("Error al recuperar el producto: " . $ex->getMessage());
          }
          $stmt->fetchAll(PDO::FETCH_OBJ); //Devolvemos con All sólo es una fila
          while ($filas = $stmt->fetch(PDO::FETCH_OBJ)) {
               echo "\n".$filas->nombre;
       }
     }


}
