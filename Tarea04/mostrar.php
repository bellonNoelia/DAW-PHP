<?php
// Iniciamos la sesión.
session_start();
//if(isset($_POST['mostrar'])){
    if(isset($_SESSION['idioma']) && isset($_SESSION['perfil']) && isset($_SESSION['zona'])){
        $idioma=$_SESSION['idioma'];
        $perfil=$_SESSION['perfil'];
        $zona=$_SESSION['zona'];
    }
//}
if(isset($_POST['borrar'])){
    if(!isset($_SESSION['idioma']) && !isset($_SESSION['perfil']) && !isset($_SESSION['zona'])){
    echo "<div class='content alert alert-danger' role='alert'> Debe fijar primero las preferencia. </div>";
    }else{
        session_destroy();
        echo "<div class='content alert alert-danger' role='alert'>Preferencias borradas.</div>";
    }
    

}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- css Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos2.css">
    <title>Tarea04</title>
</head>

<body>
    <div class="container mt-3" style="width: 40em; height: 18em;">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="m-auto">
                <div class="input-group margin-bottom-s">
                    <i class="fa fa-users-cog fa-2x fa-pull-left" style="margin-left: 0.5em;padding-top: 0.5em;"></i>
                    <h3 class="text-left" style="margin-left: 0.5em;">Preferencias Usuario</h3>
                </div>
            </div>
            </br>
            <div class="row justify-content-center">
                <div class="col-md-11 ">
                    <?php
                        echo"<p class='text-left'>Idioma: $idioma </p>"?>
                    <p class="text-left">Perfil público: <?php echo $perfil ?></p>
                    <p class="text-left">Zona horaria: <?php echo $zona ?></p>

                </div>
                <div class="col-md-11 ">
                    <button type="button" name="establecer" class="btn btn-primary"><a
                            href="preferencias.php">Establecer</a></button>
                    <button type="submit" name="borrar" class="btn btn-danger"
                        style="margin-left: 0.5em;">Borrar</button>

                </div>
            </div>
    </div>



    </form>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
