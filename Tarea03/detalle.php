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
    <div class="container-fluid">
        <div>
            <h3 class="text-center">Detalle de producto</h3>
        </div>
        <form method="GET">
            <?php
            //Recorremos el array 
            foreach ($producto as $dato) {
            ?>
            <div class="container mt-5">
                <div class="container mt-2 bg_info_t1 text-white" style="background-color:#1c8caa;">
                    <div class="text-center"> <?php echo $dato->nombre ?></div>
                </div>
                <div id="container" class="container mt-2 bg-info_t2  text-white" style="background-color:#20a8cd;">

                    </br>
                    <h6 class="text-center">Código: <?php echo $dato->id ?></h6>
                    <p class="text-left">Nombre: <?php echo $dato->nombre ?></p>
                    <p class="text-left">Nombre corto: <?php echo $dato->nombre_corto ?></p>
                    <p class="text-left">Precio: <?php echo $dato->pvp ?></p>
                    <p class="text-left">Familia: <?php echo $dato->familia ?></p>
                    <p class="text-left">Descripción: <?php echo $dato->descripcion ?></p>
                    </br>
                </div>



            </div>

            <?php
                //Cerramos el foreach
            }
            ?>
            <div class="text-center" style="margin-top: 1em">
                <button type="button" class="btn btn-info"><a href="listado.php">Volver</a></button>
            </div>
        </form>
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
