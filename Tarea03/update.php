<?php
if (isset($_GET['id'])) {
    //Llamamos a la conexión.
    require_once("conexion.php");
    $conexionProyecto=new PDO($dsn,$user,$pass);

    if (isset($_POST['modificar'])) {
    try {
        $producto = [
            "id"        => $_GET['id'],
            "nombre"    => $_POST['nombre'],
            "nombreCorto "  => $_POST['nombreCorto '],
            "descripcion"     => $_POST['descripcion'],
            "precio"      => $_POST['precio']
        ];

        $update= "UPDATE productos SET
    nombre = :nombre,
    nombreCorto = :nombreCorto,
    descripcion = :descripcion,
    precio = :precio,
    familia = :familia,
    updated_at = NOW()
    WHERE id = :id";

        $sentencia = $conexionProyecto->prepare($update);
        $sentencia->execute($producto);
        $sentencia->execute();
    } catch (PDOException $error) {
        $resultado = true;
        $error = $error->getMessage();
    }

}
    try {
       
          
        $id = $_GET['id'];
        $consultaSQL = "SELECT * FROM productos WHERE id=$id";
      
        $sentencia = $conexionProyecto->prepare($consultaSQL);
        $sentencia->execute();
      
        $producto = $sentencia->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        $resultado = true;
        $error = $ex->getMessage();
    }
          
if (isset($resultado)) {

    if ($resultado === false) {

        echo "<div class='alert alert-success' role='alert' > Producto : $nombre  actualizado correctamente.</div>";
    } else {
        echo "<div class='content alert alert-danger' role='alert'> No se ha encontrado el producto. ERRO:$error </div>";
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
            <h3 class="text-center">Crear Producto</h3>
        </div>

        <div class="container mt-5">
            <form method="POST">
                <div class="row">
                    <div class="col">
                        <label for="nombre">Nombre</label>
                        <input value="<?=($producto['nombre']) ?>" id="nombre" name="nombre" type="text"
                            class="form-control" placeholder="Nombre">
                    </div>
                    <div class="col">
                        <label for="nombreCorto">Nombre Corto</label>
                        <input value="<?= ($producto['nombreCorto']) ?> " id="nombreCorto" name="nombreCorto"
                            type="text" class="form-control" placeholder="Nombre Corto">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="precio">Precio (€)</label>
                        <input value="<?= ($producto['precio']) ?>" id="precio" name="precio" type="text"
                            class="form-control" placeholder="Precio (€)">
                    </div>
                    <div class="col">
                        <label for="familia">Familia</label>
                        <select value="<?= ($producto['familia']) ?>" id="familia" name="familia" class="form-control">
                            <option value="CAMARA">Cámaras digitales</option>
                            <option value="CONSOL">Consolas</option>
                            <option value="EBOOK">Libros electrónicos</option>
                            <option value="IMPRES">Impresoras</option>
                            <option value="MEMFLA">Memorias flash</option>
                            <option value="MP3">Reproductores MP3</option>
                            <option value="MULTIF">Equipos multifunción</option>
                            <option value="NETBOK">Netbooks</option>
                            <option value="ORDENA">Ordenadores</option>
                            <option value="PORTAT">Ordenadores portátiles</option>
                            <option value="ROUTER">Routers</option>
                            <option value="SAI">Sistemas de alimentación initerrumpida</option>
                            <option value="SOFTWA">Software </option>
                            <option value="TV">Televisores</option>
                            <option value="VIDEOC">Videocámaras</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label value="<?= ($producto['descripcion']) ?>" for="descripcion">Descripción</label>
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
