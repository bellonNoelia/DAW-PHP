<?php
//Si no mandamos el id nos lleva a listado.php
if (!isset($_GET['id'])) {
    header('Location:listado.php');
}

//Llamamos a la conexión.
require_once("conexion.php");
$conexionProyecto = new PDO($dsn, $user, $pass);
$familia = "SELECT cod,nombre FROM familias ORDER BY nombre";
$consulta = "SELECT * FROM productos WHERE id=:i";
$id = $_GET['id'];
$stmt = $conexionProyecto->prepare($familia);
$sentencia = $conexionProyecto->prepare($consulta);
try {
    $stmt->execute();
    $sentencia->execute([':i=>$id']);
} catch (PDOException $ex) {
    $resultado = true;
    $error = $ex->getMessage();
    echo "<div class='content alert alert-danger' role='alert'> Error al recuperar el producto o la familia. ERROR:$error </div>";
}
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if (isset($_GET['modificar'])) {
    try {
        $producto = [
            "id"        => $_GET['id'],
            "nombre"    => $_GET['nombre'],
            "nombre_corto "  => $_GET['nombre_corto'],
            "descripcion"     => $_GET['descripcion'],
            "pvp"      => $_GET['pvp'],
            "familia"     => $_GET['familia']
        ];

        $update = "UPDATE productos SET
            nombre = :nombre,
            nombreCorto = :nombre_corto,
            descripcion = :descripcion,
            precio = :pvp,
            familia = :familia,
            WHERE id = :id";

        $sentencia = $conexionProyecto->prepare($update);
       
    } catch (PDOException $error) {
        $resultado = true;
        $error = $error->getMessage();
    }
    try {
        $sentencia->execute([
            ':nombre' => $nombre,
            ':nombre_corto' => $nombre_corto,
            ':descripcion' => $descripcion,
            ':pvp' => $pvp,
            ':familia' => $familia
        ]);
    } catch (PDOException $error) {
        $resultado = true;
        $error = $error->getMessage();
    }



    if (isset($resultado)) {

        if ($resultado === false) {

            echo "<div class='alert alert-success' role='alert' > Producto : $nombre  actualizado correctamente.</div>";
        } else {
            echo "<div class='content alert alert-danger' role='alert'> No se ha encontrado el producto. ERRO:$error </div>";
        }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">


</head>


<body>
    <div class="container-fluid">
        <div>
            <h3 class="text-center">Modificar Producto</h3>
        </div>
        <?php
        //Recorremos el array 
        foreach ($producto as $dato) {
        ?>
            <div class="container mt-5">
                <form method="GET">
                    <div class="row">
                        <div class="col">
                            <label for="nombre">Nombre</label>
                            <input value="<? echo $dato->nombre ?>" id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="col">
                            <label for="nombreCorto">Nombre Corto</label>
                            <input value="<? echo $dato->nombre_corto ?> " id="nombre_corto" name="nombreCorto" type="text" class="form-control" placeholder="Nombre Corto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="precio">Precio (€)</label>
                            <input value="<? echo $dato->pvp ?>" id="pvp" name="precio" type="text" class="form-control" placeholder="Precio (€)">
                        </div>
                        <div class="col">
                            <label for="familia">Familia</label>
                            <select id="familia" name="familia" class="form-control">
                                <?php
                                while ($filas = $stmt->fetch(PDO::FETCH_OBJ)) {
                                    if ($filas->cod == $producto->familia) {
                                        echo "<option value='{$filas->cod}' selected>$filas->nombre</option>";
                                    } else {
                                        echo "<option value='{$filas->cod}'>$filas->nombre</option>";
                                    }
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label value="<? echo $dato->descripcion ?>" for="descripcion">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="12"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">

                                    <button type="submit" name="modificar" class="btn btn-primary">Modificar</button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-info"><a href="listado.php">Volver</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php
        }
        ?>
    </div>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
