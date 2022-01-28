<?php
//Conexión
$conexionBD = @mysqli_connect ('localhost','root',4689);
if (!$conexionBD){
    echo ('Error numero'.mysqli_connect_errno().'al establecer conexión'.mysqli_connect_error().'.<br/>');}
    else {echo('Conexión establecida con éxito<br/>');}
/*

//creación de  una BD

if (mysqli_query($conexionBD, 'CREATE DATABASE almacenes')===TRUE){
    echo('Se creó correctamente la BD llamada almacenes.<br/>');
}else{
    echo('Error en la creación de la BD: '.mysqli_error($conexionBD).'<br/>');}

$sentenciaSQL_crear='CREATE TABLE almacen(
                codigo INT PRIMARY KEY,
                lugar VARCHAR (100) NOT NULL,
                capacidad  INT NOT NULL
                ON DELETE NOT ACTION
                ON UPDATE CASCADE)
                
                CREATE TABLE caja(
                numReferencia CHAR(5) PRIMARY KEY,
                contenido VARCHAR (100),
                valor INT,
                almacen_id INT FOREIGN KEY REFERENCES almacen(codigo)
                ON DELETE NOT ACTION 
                ON UPDATE CASCADE)'
                ;
$sentenciaSQL_datos='INSERT INTO almacen VALUES 
                    (1501,"Sabon",2),
                    (1502,"Pocomaco",3),
                    (4801,"Bilbao",4),
                    (4802,"Bilbao",2),
                    (4803,"Bilbao",1),
                    (3901,"El Campon",2),
                    (3902,"Camargo",2);
                    
                    INSERT INTO caja VALUES (11547,"Monitores PC",1540,1501),
                    (36745,"Cajas PC",2820,1501),
                    (14723,"Tarjetas gráficas" PC,700,1501),
                    (36845,"Microprocesadores" PC,820,1501),

                    (98547,"Ratones PC",135,1502),
                    (14604,"Teclados PC",110,1502),
                    (13043,"Discos Duros PC",300,1502),

                    (00746,"Boinas",90,4801),
                    (63604,"Bastones",140,4801),
                    (63604,"Andadores",365,4801),
                    (63604,"Silla ruedas",865,4801),

                    (63604,"Mochilas",305,4802),
                    (63604,"Neceseres",365,4802),

                    (54774,"Latas berberechos",350,3902),
                    (54774,"Latas zamburiñas",380,3902),
                    (54774,"Latas navajas",390,3902),
                    (54774,"Latas ostras",330,3902);
                    ';



mysqli_query($conexionBD);
mysqli_query($sentenciaSQL_crear);
mysqli_query($sentenciaSQL_datos);

                    

//Desconexión
if (!@mysqli_close($conexionBD)) {
    echo('Error número: '.mysqli_errno($conexionBD).' al cerrar la conexión: '. mysqli_error($conexionBD).'.<br/>');
} else {
    echo('Conexión cerradacon éxito');
}
*/
?>