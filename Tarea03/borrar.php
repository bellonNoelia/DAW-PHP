<?php
if (isset($_GET['id'])) {
    //Llamamos a la conexión.
    require_once("conexion.php");
    $conexionProyecto=new PDO($dsn,$user,$pass);

    $resultado = false;


    try {

        $id = $_GET['id'];
        $delete = ("DELETE FROM productos WHERE id =$id");

        $sentencia = $conexionProyecto->prepare($delete);
        $sentencia->execute();
    } catch (PDOException $error) {
        $resultado = true;
        $error = $error->getMessage();
    }

    if (isset($resultado)) {

        if ($resultado === false) {

            echo " Producto : $id  borrado correctamente.
            <button type='button'><a href='listado.php'>Volver</a></button>";
        } else {
            echo "Fallo al eliminar los datos. ERRO:$error 
            <button type='button' ><a href='listado.php'>Volver</a></button>";
        }
    }
}
?>
