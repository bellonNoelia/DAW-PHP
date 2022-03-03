<?php
//Se crea sesión
session_start();

//Se crean arrays con los valores de las opciones
$idioma=["Español","Ingles"];
$perfil=["Si","No"];
$zona=["GTM-2","GTM-1","GTM","GTM+1","GTM+2"];

/*Si se ha enviado "establecer", se asigna lo recogido al array correspondiente
(Se establecen las preferencias)*/
if(isset($_POST['establecer'])){
    $_SESSION['idioma'] = $_POST['idioma'];
    $_SESSION['perfil'] = $_POST['perfil'];
    $_SESSION['zona'] = $_POST['zona'];
}

//Si se han creado los arrays idioma, perfil y zona, se escribe el texto
if(isset($_SESSION['idioma']) && isset($_SESSION['perfil']) && isset($_SESSION['zona'])){
    echo "Preferencias de usuario guardadas";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tarea 4</title>
    <link rel="stylesheet" type="text/css" href="preferencias.css"/>

</head>
<body>
    <!--El action envía a la página a recargarse sobre sí misma-->
<form method="POST"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div id="caja">
        <div id="cabecera">
            <h1>Preferencias Usuario</h1>
        </div>
        <div id="cuerpo">
            <h6>Idioma</h6>
            <select id="idioma"name="idioma">
            <?php
                /*Recorro el array con los valores, si existe el dato y tiene$value
                y el$value es igual al índice, selecciona ese$value*/
                foreach ($idioma as $i => $value) {
                    if (isset($_SESSION['idioma']) && $_SESSION['idioma'] == $i) {
                        echo "<option value='$i' selected > $value  </option>";
                    } else {echo " <option value='$i'> $value</option>";}
                }
            ?>
             </select>
             <h6>Perfil Público</h6>
            <select id="perfil" name="perfil" >
            <?php
            /*Recorro el array con los valores, si existe el dato y tiene$value
                y el$value es igual al índice, selecciona ese$value*/
                foreach ($perfil as $i => $value) {
                    if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == $i) {
                        echo "<option value='$i' selected > $value  </option>";
                    } else { echo " <option value='$i'> $value</option>";}
                }
            ?>
             </select>
             <h6>Zona Horaria</h6>
            <select id="zona" name="zona" >
            <?php
            /*Recorro el array con los valores, si existe el dato y tiene$value
                y el$value es igual al índice, selecciona ese$value*/
                foreach ($zona as $i => $value) {
                    if (isset($_SESSION['zona']) && $_SESSION['zona'] == $i) {
                        echo "<option value='$i' selected > $value  </option>";
                    } else {echo " <option value='$i'> $value</option>";}
                }
            ?>
             </select>
             <br><br>
             <div id="botones">
                <button type="button" name="mostrar id="mostrar">Mostrar Preferencias</button>
                <button type="submit" name="establecer" id="establecer">Establecer Preferencias</button>
             </div>
        </div>
    </div>
</form>
</body>
</html>