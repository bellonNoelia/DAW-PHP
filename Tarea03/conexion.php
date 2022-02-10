<?php
$host="localhost";
$db="proyecto";
$user="gestor";
$pass="secreto";
$dsn="mysql:host=$host;dbname=$db;charset=utf8mb4";
try{
    $conexionProyecto=new PDO($dsn,$user,$pass);
    $conexionProyecto->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ex){
    die("Error en la conexión, mensaje de error: ".$ex->getMessage());
}

$conexionProyecto=null;
?>
