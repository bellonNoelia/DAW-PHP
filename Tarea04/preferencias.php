<?php
// Iniciamos la sesión.
session_start();
echo "identificador sesion ".session_id();
echo "nombre sesion ".session_name();
//Comprobamos si se han enviado datos.
if(isset($_POST['establecer'])){
    //Cargamos los datos en la sesión.
    $_SESSION['']['idioma']=$_POST['idioma'];
    $_SESSION['']['perfil']=$_POST['perfil'];
    $_SESSION['']['zonah']=$_POST['zonah'];
}
?>
<!DOCTYPE html>
<html lang="en">

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
        <link rel="stylesheet" href="estilos.css">
        <title>Tarea04</title>
</head>

<body>
    <div class="container mt-5">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="m-auto">
                <h3 class="text-center">Preferencias Usuario</h3>
            </div>
            <div class="row mb-3 ">
                <div class="col-md-3 m-auto">
                    <label for="idioma" class="form-label">Idioma</label>
                    <div class="col-sm-10">
                        <select id="idioma" name="idioma" class="form-control">
                            <option selected value="esp">Español</option>
                            <option value="ing">Inglés</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3 ">
                <div class="col-md-3  m-auto">
                    <label for="perfil" class="form-label">Perfil público</label>
                    <div class="col-sm-10">
                        <select id="prefil" name="perfil" class="form-control">
                            <option selected value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 m-auto">
                    <label for="zonah" class="form-label">Zona horaria</label>
                    <div class="col-sm-10">
                        <select id="zonahor" name="zonah" class="form-control">
                            <option selected value="-2">GTM-2</option>
                            <option value="-1">GTM-1</option>
                            <option selected value="GMT">GTM</option>
                            <option value="+1">GTM+1</option>
                            <option selected value="+2">GTM+2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6 m-auto">
                <button type="submit" name="establecer" class="btn btn-primary">Establecer preferencias</button>
                <button type="button" name="mostrar" class="btn btn-success"><a href="mostrar.php">Mostrar preferencias</a></button>
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
