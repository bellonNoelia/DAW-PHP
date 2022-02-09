<?php
$host="localhost";
$db="proyecto";
$user="gestor";
$pass="secreto";
$dsn="mysql:host=$host;dbname=$db;charset=utf8mb4";
try{
    $conexionProyecto=new con($dsn,$user,$pass);
    $conexionProyecto->setAttribute(con::ATTR_ERRMODE, con::ERRMODE_EXCEPTION);
}catch(conException $ex){
    die("Error en la conexión, mensaje de error: ".$ex->getMessage());
}

$conexionProyecto=null;
?>