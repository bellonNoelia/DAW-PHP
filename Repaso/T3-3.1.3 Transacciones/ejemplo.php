<?php
//Hacemos la conexión
$conProyecto = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');
if ($conProyecto->connect_error) {
    die("Error en la conexión mesaje de error: " . $conProyecto->connect_error);
}
//Definimos una variable para comprobar que no tenemos errores
$todoBien = true;
//Iniciamos la transacción
$conProyecto->autocommit(false);
$update = "update stocks set unidades=1 where producto=(select id from productos
where nombre_corto='3DSNG') AND tienda=1";
if (!$conProyecto->query($update)) {
    $todoBien = false;
}
//fijate en este insert, el select devolverá el productos.id del producto de
//nombre_corto='3DSNG' 3 y 1 es decir
// estamos haciendo un insert into stocks(producto, tienda, unidades) lo valores
//1, 3, 1
$insert = "INSERT INTO stocks(producto, tienda, unidades) SELECT id, 3, 1 FROM
productos WHERE nombre_corto='3DSNG'";
if (!$conProyecto->query($insert)) {
    $todoBien = false;
}
//Si todo fue bien hacemos el commit si no el rollback
if ($todoBien) {
    $conProyecto->commit();
    echo "<p>Los cambios se han realizado correctamente.</p>";
} else {
    //Revierte la transacción actual
    $conProyecto->rollback();
    echo "<p>No se han podido realizar los cambios.</p>";
}
$conProyecto->close();
//No es necesario cerrar el script al ser un archivo php "puro"