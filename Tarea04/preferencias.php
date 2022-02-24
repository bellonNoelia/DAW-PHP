<?php
// Iniciamos la sesión.
session_start();
$idioma = ["Español", "Inglés"];
$perfil = ["Si", "No"];
$zona = ["GTM-2", "GTM-1", "GTM", "GTM+1", "GTM+2"];
//Comprobamos si se han enviado datos.
if (isset($_POST['establecer'])) {
    //Cargamos los datos en la sesión.
    $_SESSION['idioma'] = $_POST['idioma'];
    $_SESSION['perfil'] = $_POST['perfil'];
    $_SESSION['zona'] = $_POST['zona'];
}
if(isset($_SESSION['idioma'])&& isset($_SESSION['perfil']) &&isset($_SESSION['zona'])){
    echo "<div class='alert alert-success' role='alert' > Preferencia de usuario guardadas</div>";
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
    <link rel="stylesheet" href="estilos.css">
    <title>Tarea04</title>
</head>

<body>
    <div class="container mt-3" style="width: 30em; height: 23em;">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div style="background-color: #ebeff0;">
                <div class="m-auto">
                    <h3 class="text-left">Preferencias Usuario</h3>
                </div>
                <hr>
            </div>
            <div class="row justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <label for="idioma" class="form-label">Idioma</label>
                        <div class="col-sm-12">
                            <div class="input-group margin-bottom-s">
                                <i class="fa fa-language fa-lg fa-border" style="background-color:  #dce2e4 ;"></i>
                                <select id="idioma" name="idioma" class="form-select">
                                    <?php

                            foreach ($idioma as $i => $value) {
                                if (isset($_SESSION['idioma']) && $_SESSION['idioma'] == $i) {

                                    echo "<option value='$i' selected > $value  </option>";
                                } else {

                                    echo " <option value='$i'> $value</option>";
                                }
                            }
                            ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                </br>
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <label for="perfil" class="form-label">Perfil público</label>
                        <div class="col-sm-12">
                            <div class="input-group margin-bottom-s">
                                <i class="fa fa-users fa-lg  fa-align-center fa-border"
                                    style="background-color:#dce2e4 ;"></i>
                                <select id="perfil" name="perfil"  class="form-select">
                                    <<?php
                                foreach ($perfil as $i => $value) {
                                    if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == $i) {

                                        echo "<option value='$i' selected > $value  </option>";
                                    } else {
    
                                        echo " <option value='$i'> $value</option>";
                                    }
                                }
                                ?> </select>
                            </div>
                        </div>
                    </div>
                </div>
                </br>
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <label for="zonah" class="form-label">Zona horaria</label>
                        <div class="col-sm-12">
                            <div class="input-group margin-bottom-s">
                                <i class="fa fa-clock fa-lg fa-border" aria-hidden="true"
                                    style="background-color:#dce2e4;"></i>
                                <select id="zona" name="zona"  class="form-select">
                                    <?php
                            foreach ($zona as $i => $value) {
                                if (isset($_SESSION['zona']) && $_SESSION['zona'] == $i) {

                                    echo "<option value='$i' selected > $value  </option>";
                                } else {

                                    echo " <option value='$i'> $value</option>";
                                }
                            }
                            ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11">

                    <button type="button" name="mostrar" class="btn btn-success"  style="margin-top: 1em;margin-left: 0.5em;"><a href="mostrar.php">Mostrar preferencias</a></button>
                    <button type="submit" name="establecer" class="btn btn-primary"style="margin-left: 1em;">Establecer preferencias</button>
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
