<?php
//Llamamos al archivo de conexión.
require_once('conexion.php');
$conexionProyecto= new PDO($dsn,$user,$pass);
//Creamos una variable que llame a la BBDD y hacemos el SELECT
$sentencia=$conexionProyecto->query("SELECT * FROM productos");
//Guardamos en la variable producto todos los valores de la BBDD.
$producto=$sentencia->fetchAll(PDO::FETCH_OBJ);



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
            <h3 class="text-center">Gestión de Productos</h3>
        </div>

        


        <div class="container mt-5">
        <button type="submit" class="btn btn-success"><a href="crear.php">Crear</a></button>

            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Detalle</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Recorremos el array 
                    foreach($producto as $dato){
                    ?>
                    <tr>
                        <td scope="row"><button type="button" class="btn btn-info"><a
                                    href="detalle.php?id=<?php echo $datos->id ?>">Detalle</a></button></td>
                        <!--Lo referenciamos con el ID -->
                        <td><?php echo $dato->id ?></td>
                        <!--Nombre en  la BBDD-->
                        <td><?php echo $dato->nombre ?></td>
                        <td><button type="button" class="btn btn-warning"> <a
                                    href="update.php?id=<?php echo $datos->id ?>"> Actualizar</a></button>
                            <button type="button" class="btn btn-danger"> <a
                                    href="borrar.php?id=<?php echo $datos->id ?>">Borrar</a></button>
                        </td>
                    </tr>

                    <?php
                    //Cerramos el foreach
                    }
                    ?>
                </tbody>

            </table>
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
