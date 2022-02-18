<?php
//Llamamos a la conexión.
require_once 'conexion.php';
$conexionProyecto = new PDO($dsn,$user,$pass);
//Creamos una variable resultado para utilizar flags y según su resultado le asociaremos unas acciones u otras.
$resultado=true;
//Si clicamos en moficar se ejecuta el código dentro del if.
if (isset($_POST['modificar'])) {
    $cod = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $nombreCorto = $_POST['nombreCorto'];
    $precio = $_POST['precio'];
    $familia = $_POST['familia'];
    $descripcion = $_POST['descripcion'];
//Generamos la sentencia del update.
    $sql =("UPDATE productos SET nombre=:nombre,nombre_corto=:nombreCorto,descripcion=:descripcion,pvp=:precio,familia=:familia WHERE id=:i");
//Preparamos el update pasándole la variable donde almacenamos la sentencia del update.
    $stmt3 = $conexionProyecto->prepare($sql);
    try {
//Ejecutamos el update pasándole los valores.
        $stmt3->execute([':i'=>$cod,':nombre'=>$nombre,':nombreCorto'=>$nombreCorto,':descripcion'=>$descripcion,':precio'=>$precio,':familia'=>$familia]);
//Almacenamos en la variable $producto el array del objeto.       
        $producto2 = $stmt3->fetchALL(PDO::FETCH_OBJ);
    } catch (PDOException $ex) {
        //$resultado = false;
        $error = $ex->getMessage();
    }
    if ($resultado) {
        //Si resultado es true lanzamos una alerta conforme se ha actualizado el producto.
        echo "<div class='alert alert-success' role='alert' > Producto : $nombre  actualizado correctamente.</div>";
        
    } else {
        //Si es falso lanzamos una alerta conforme no se ha podido modificar
        echo "<div class='content alert alert-danger' role='alert'> No se ha podido modificar el producto. ERROR:$error </div>";
    }
}

//Si no mandamos el id nos lleva a listado.php
if (!isset($_GET['id'])) {
    header('Location:listado.php');
    exit();
} else {
    $id = $_GET['id'];
    //Creamos la sentencia para seleccionar el producto donde el id sea el que se pasa por get,
    $consulta = "SELECT * FROM productos WHERE id=:i";
    //Preparamos la consulta.
    $stmt2 = $conexionProyecto->prepare($consulta);
    //Creamos la sentencia para que nos aparezca la familia a la que corresponde el producto con el id pasado.
    $familia = "SELECT cod,nombre FROM familias ORDER BY nombre";
    //Preparamos la consulta.
    $stmt = $conexionProyecto->prepare($familia);
    try {
        //Ejecutamos ambas consultas pasándole a la primera el id.
        $stmt->execute();
        $stmt2->execute([':i' => $id]);
        $producto = $stmt2->fetchALL(PDO::FETCH_OBJ);
        //$stmt2->execute();
    } catch (PDOException $ex) {
        //En caso de que haya algún error recogemos el erros y lanzamos una alerta.
        $error = $ex->getMessage();
        echo "<div class='content alert alert-danger' role='alert'> Error al recuperar el producto o la familia. ERROR:$error </div>";
    }

}

?>
<!DOCTYPE html>

<html lang="es">

<head>
    <title>Tema 3</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">


</head>


<body>
    <div class="container-fluid">
        <div>
            <h3 class="text-center">Modificar Producto</h3>
        </div>

        <div class="container mt-5">
            <form method="POST" action="">
                <!-- action="<?php //echo $_SERVER['PHP_SELF']; ?>"-->
                <?php
                //Recorremos el array 
                foreach ($producto as $dato) {
                ?>
                <div class="row">
                    <div class="col">
                        <label for="nombre">Nombre</label>
                        <input value="<?php echo $dato->nombre ?>" placeholder="Nombre" id="nombre" name="nombre"
                            type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label for="nombreCorto">Nombre Corto</label>
                        <input value="<?php echo $dato->nombre_corto ?> " placeholder="Nombre corto" id="nombreCorto"
                            name="nombreCorto" type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="precio">Precio (€)</label>
                        <input value="<?php echo $dato->pvp ?>" placeholder="Precio" id="precio" name="precio" type="text"
                            class="form-control">
                    </div>
                    <div class="col">
                        <label for="familia">Familia</label>
                        <select id="familia" name="familia" class="form-control">
                            <?php
                            //Recorremos el array de familia para que se asocie la familia con el id que corresponde
                                while ($filas = $stmt->fetch(PDO::FETCH_OBJ)) {
                                    if ($filas->cod == $dato->familia) {
                                        echo "<option value='{$filas->cod}' selected>$filas->nombre</option>";
                                    } else {
                                        echo "<option value='{$filas->cod}'>$filas->nombre</option>";
                                    }
                                }
                                ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea placeholder="descr" class="form-control" name="descripcion"
                            id="descripcion" rows="12"><?php echo $dato->descripcion ?></textarea>
                    </div>
                   
                </div>
                <?php
                }
                ?>
                    
                <div style="margin-top: 1em">
                        <!--Introducimos el id como campo oculto para enviarlo pos post y que no se pueda modificar-->
                        <input type="hidden" name="codigo" value="<?php echo $dato->id ?>">
                        <button type="submit" name="modificar" class="btn btn-primary">Modificar</button>

                        <button type="button" class="btn btn-info"><a href="listado.php">Volver</a></button>

                    </div>
            </form>
        </div>

    </div>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
