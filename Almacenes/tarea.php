<?php
//Creamos Conexión con MySQL
$conexionBD= @mysqli_connect('localhost','noe','a');

//Comprobamos la Conexión
if(!$conexionBD){
    echo("\n".'Error número '.mysqli_connect_errno().' al establecer la conexión: '.mysqli_connect_error());
}else{
    echo("\n".'Conexión establecida con éxito.');
}

//Creamos la BBDD
    if(mysqli_query($conexionBD,'DROP DATABASE ALMACENES')=== TRUE){
        echo("\n".'Se ha borrado la base de datos ALMACENES correctamente.');
    }else{
        echo ("\n".'Error en ell borrado de la base de datos: '.mysqli_error($conexionBD));
    }
    $crearBD='CREATE DATABASE  ALMACENES ';
    if(mysqli_query($conexionBD,$crearBD)=== TRUE){
        echo("\n".'Se ha creado la base de datos ALMACENES correctamente.');
    }else{
        echo ("\n".'Error en la creación de la base de datos: '.mysqli_error($conexionBD));
    }

    if(mysqli_query($conexionBD,'USE ALMACENES')=== TRUE){
        echo("\n".'Se ha seleccionado la base de datos ALMACENES correctamente.');
    }else{
        echo ("\n".'Error en la selección de la base de datos: '.mysqli_error($conexionBD));
    }


//Creamos las tablas ALMACEN y CAJA
$crearTablaAlm='CREATE TABLE IF NOT EXISTS ALMACEN (
    codigo INT (4)  PRIMARY KEY,
    lugar VARCHAR(100),
    capacidad INT(5)
    )';


$crearTablaCaja='CREATE TABLE IF NOT EXISTS CAJA (
    NumReferencia CHAR (5)  PRIMARY KEY,
    contenido VARCHAR(100),
    valor INT(3),
    almacen INT(4),
    FOREIGN KEY (almacen) REFERENCES ALMACEN(codigo)
                          ON DELETE NO ACTION
                          ON UPDATE CASCADE
    )';

if(mysqli_query($conexionBD,$crearTablaAlm)){
    echo("\n".'Tabla Almacén creada con éxito.');
}else{
    echo("\n".'Error en la creación de la tabla '.mysqli_error($conexionBD));
}

if(mysqli_query($conexionBD,$crearTablaCaja)){
    echo("\n".'Tabla Caja creada con éxito.');
}else{
    echo("\n".'Error en la creación de la tabla '.mysqli_error($conexionBD));
}

//Insertar datos
$datos="INSERT INTO ALMACEN 
VALUES (0001,'Sabon',3),
(0002,'Bilbao',4),
(0003,'Barcelona',15),
(0004,'Coruña',2)";


if(mysqli_query($conexionBD,$datos)){
    echo("\n".'Datos de almacenes insertados con éxito.');
}else{
    echo("\n".'Error en la inserción de datos'.mysqli_error($conexionBD));
}


$datos="INSERT INTO CAJA 
VALUES ('LC01','CPU',999,0001),
('LC02','Memoria Ram',600,0001),
('LC03','Auriculares',500,0001),
('BL01','Clips',100,0002),
('BL02','Chinchetas',70,0002),
('BC01','Aspirador',799,0003),
('BC02','Purificador de aire',800,0003),
('C01','Lapices',100,0004),
('C02','Gomas',100,0004),
('C03','Cartulinas',200,0004),
('C04','Folios',150,0004)";

if(mysqli_query($conexionBD,$datos)){
    echo("\n".'Datos de almacenes insertados con éxito.');
}else{
    echo("\n".'Error en la inserción de datos'.mysqli_error($conexionBD));
}

//Obtener los códigos de los almacenes que están saturados
$consulta='SELECT codigo 
FROM ALMACEN 
WHERE capacidad<( SELECT COUNT(*) 
FROM CAJA WHERE ALMACEN=codigo)';

$res=mysqli_query($conexionBD,$consulta);
if($res){
    echo("\n".'Consulta almacenes saturados realizada con éxito.');
    
    while($codigo = mysqli_fetch_assoc($res)){
        echo "\nAlmacenes saturados: "."Codigo: ".$codigo['codigo']."\n";
    }
}else{
    echo("\n".'Error en la consulta almacenes saturados'.mysqli_error($conexionBD));
}
//Cerrar conexión
if (!@mysqli_close($conexionBD)) {
 echo("\n".'Error número ' . mysqli_errno($conexionBD) . ' al cerrar la conexión: ' . mysqli_error($conexionBD) . '.');
}

?>
