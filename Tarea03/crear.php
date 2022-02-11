<?php
//Llamamos a la conexión.
require_once("conexion.php"); 


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
            <h3 class="text-center">Crear Producto</h3>
        </div>

        <div class="container mt-5">
            <form method="POST" action="">
                <div class="row">
                    <div class="col">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="col">
                        <label for="nombreCorto">Nombre Corto</label>
                        <input type="text" class="form-control" placeholder="Nombre Corto">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="precio">Precio (€)</label>
                        <input type="text" class="form-control" placeholder="Precio (€)">
                    </div>
                    <div class="col">
                        <label for="familia">Familia</label>
                        <select id="familia" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" rows="12"></textarea>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col">

                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success">Limpiar</button>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-light"><a
                                    href="listado.php">Volver</a></button>
                            </div>
                        </div>
                    </div>
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
