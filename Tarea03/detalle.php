<?php
//Si no mandamos el id nos lleva a listado.php
if (!isset($_GET['id'])) {
    header('Location:listado.php');
}

//Llamamos a la conexión.
require_once("conexion.php");
$conexionProyecto = new PDO($dsn, $user, $pass);
$id = $_GET['id'];
$sentencia = $conexionProyecto->query("SELECT * FROM productos  WHERE id=$id");
//Guardamos en la variable producto todos los valores de la BBDD.
$producto = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($producto);

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
    <div class="container-fluid" style="width:100%; height:100%">
        <div>
            <h3 class="text-center">Detalle de producto</h3>
        </div>
        <?php
        //Recorremos el array 
        foreach ($producto as $dato) {
        ?>
        <div class="container mt-5">
            <div class="nombre">
                <p> <?php echo $dato->nombre ?></p>
            </div>
            <div>
                <p class="codigo">Código: <?php echo $dato->cod ?></p>
                <div>

                    <p>Nombre: <?php echo $dato->nombre ?></p>
                    <p>Nombre corto: <?php echo $dato->nombre_corto ?></p>
                    <p>Precio: <?php echo $dato->pvp ?></p>
                    <p>Familia: <?php echo $dato->familia ?></p>
                    <p>Descripción: <?php echo $dato->descripcion ?></p>

                </div>
            </div>

        </div>
    </div>
    <button type="button" class="btn btn-info"><a href="listado.php">Volver</a></button>
    <?php
            //Cerramos el foreach
        }
        ?>
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
