<?php
//Si no mandamos el id nos lleva a listado.php
if (!isset($_GET['id'])) {
    header('Location:listado.php');
}
$resultado = true;
//Llamamos a la conexión.
require_once("conexion.php");
$conexionProyecto = new PDO($dsn, $user, $pass);
$id = $_GET['id'];
$familia = "SELECT cod,nombre FROM familias ORDER BY nombre";
$consulta = "SELECT * FROM productos WHERE id=$id";

$stmt = $conexionProyecto->prepare($familia);
$stmt2 = $conexionProyecto->prepare($consulta);
try {
    $stmt->execute();
    $stmt2->execute();
} catch (PDOException $ex) {
    $error = $ex->getMessage();
    echo "<div class='content alert alert-danger' role='alert'> Error al recuperar el producto o la familia. ERROR:$error </div>";
}
$producto = $stmt2->fetchALL(PDO::FETCH_OBJ);
if (isset($_POST['modificar'])) {
    $nombre = ($_POST['nombre']);
    $nombreCorto = ($_POST['nombreCorto']);
    $precio = ($_POST['precio']);
    $familia = ($_POST['familia']);
    $descripcion = ($_POST['descripcion']);
    $id = $_GET['id'];

    $sql = "UPDATE productos SET
    nombre = :nombre,
    nombre_corto = :nombreCorto,
    descripcion = :descripcion,
    pvp = :precio,
    familia = :familia,
    WHERE id = :id";

    $stmt3 = $conexionProyecto->prepare($sql);
    try {
        $stmt3->execute([
            ':nombre' => $nombre,
            ':nombreCorto' => $nombreCorto,
            ':descripcion' => $descripcion,
            ':precio' => $precio,
            ':familia' => $familia,
            ':id' => $id
        ]);
    } catch (PDOException $ex) {
        $resultado = false;
        $error = $ex->getMessage();
    }
    if ($resultado) {
        echo "<div class='alert alert-success' role='alert' > Producto : $nombre  actualizado correctamente.</div>";
    } else {
        echo "<div class='content alert alert-danger' role='alert'> No se ha encontrado el producto. ERROR:$error </div>";
    }
}
print_r($producto);print_r($p);

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
            <form method="POST" action="prueba.php">
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
                        <input value="<?php echo $dato->nombre_corto ?> " placeholder="Nombre corto" id="nombre_corto"
                            name="nombreCorto" type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="precio">Precio (€)</label>
                        <input value="<?php echo $dato->pvp ?>" placeholder="Precio" id="precio" name="pvp" type="text"
                            class="form-control">
                    </div>
                    <div class="col">
                        <label for="familia">Familia</label>
                        <select id="familia" name="familia" class="form-control">
                            <?php
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
                        <textarea placeholder="<?php echo $dato->descripcion ?>" class="form-control" name="descripcion"
                            id="descripcion" rows="12"></textarea>
                    </div>
                    <div style="margin-top: 1em">

                        
                        <button type="submit" name="modificar" class="btn btn-primary">Modificar</button>

                        <button type="button" class="btn btn-info"><a href="listado.php">Volver</a></button>

                    </div>
                </div>
                <?php
                }
                ?>
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
