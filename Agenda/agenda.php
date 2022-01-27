<?php
/*Debes programar una aplicación para mantener una pequeña agenda en una única página web programada en PHP.
La agenda almacenará únicamente dos datos de cada persona: su nombre y un número de teléfono. Además, no podrá haber nombres repetidos en la agenda.
En la parte superior de la página web se mostrará el contenido de la agenda. En la parte inferior debe figurar un sencillo formulario con dos cuadros 
de texto, uno para el nombre y otro para el número de teléfono.
Cada vez que se envíe el formulario:*/
     
$nombre=strtoupper($_POST['nombre']);
$telefono=$_POST['telefono'];
$informacion=$_POST['informacion'];
$existe=false;
$datos =[];


   

nombreVacio($nombre);

//Si el nombre está vacío, se mostrará una advertencia.
function nombreVacio($nombre){      
    global $telefono;
    if(empty($nombre) && (!isset($_POST["vaciar"]))){
        include "adver.html";
    }else{
        if(!empty($telefono)){
            $patron='/^[0-9]{9}$/';
            if(!preg_match($patron,$telefono)){
                echo "Teléfono erróneo"."<br>";
                }
                else {
                    return nombreExiste($nombre,$telefono);
                }
           }
            
        }
 }

function nombreExiste($nombre,$telefono){
    $fp=fopen("datosAgenda.txt","r"); 
    if (!$fp = fopen("datosAgenda.txt", "r")){
        //echo "No se ha podido abrir el archivo"."<br>";
    }
    $archivo = file_get_contents('datosAgenda.txt'); //Guardamos el contenido del fichero en una variable.
    $pos=strpos($archivo,$nombre); 
    //echo $pos;
    if($pos===false){
        if(!empty($telefono)){//Si el nombre no existe y el teléfono no está vacío guardamos.
            echo nombreNoExiste($nombre,$telefono); //Guardamos los valores.
            fclose($fp);
            }
        }else{
           return $existe=true;
            }
}

/*Si el nombre que se introdujo no existe en la agenda, y el número de teléfono no está vacío, se añadirá a la agenda. Comprobamos previamente que ambos campos fuesen introducidos.*/
function nombreNoExiste($nombre,$telefono){
    $fp=fopen("datosAgenda.txt","a");
    fwrite($fp,"$nombre,$telefono".PHP_EOL);
    fclose($fp);
}           

if(file_exists('datosAgenda.txt')){
    //Almaceno el contenido completo del txt en esta variable
    $agenda = trim(file_get_contents('datosAgenda.txt'), PHP_EOL);
    //Obtengo todas las entradas de linea del txt
    $lineas = explode(PHP_EOL, $agenda);
    foreach($lineas as $linea){
        list($name, $tlf) = explode(',', $linea);
        $datos[$name]= $tlf;
        }
}

if(!empty($datos)){
    $tabla=' <table style="margin: 0 auto; border="1">
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
        </tr>
    ';
    foreach($datos as $clave=>$valor){
        $tabla .= '
            <tr><td>'.$clave.'</td><td>'.$valor.'</td></tr>
        ';
    }
$tabla.= '</table>';
}
$informacion = $tabla;

// Si el nombre que se introdujo ya existe en la agenda y se indica un número de teléfono, se sustituirá el número de teléfono anterior.
// Si el nombre que se introdujo ya existe en la agenda y no se indica número de teléfono, se eliminará de la agenda la entrada correspondiente a ese nombre.




$arr=file ('datosAgenda.txt');
for($i=0;$i<count($arr);$i++){
    echo $arr[$i];
    if (in_array($arr[$i],$nombre) && empty($telefono)) {
        unset($arr[$i]);
        
        
    }

}








/*En el momento que la agenda tenga un nombre nos aparecerá un nuevo formulario que nos permitirá vaciar todos los contactos. Para ello mandaremos en la url una variable 
a la misma página de la agenda (fíjate en la url de la primera imagen). Al procesar la página comprobaremos si nos ha llegado o no esta variable (acuérdate de $_GET)

si se definió la variable vaciar(si se hizo clic)*/
if (isset($_POST["vaciar"])) {
    $fp = "datosAgenda.txt";
    $fp = fopen("datosAgenda.txt","w");
    fclose($fp);
    echo "<p>Se ha borrado la agenda correctamente<p>";
}


//Para que nos muestre las partes del html que necesitamos según el contenido del txt:
$archivo = "datosAgenda.txt";
    if(filesize($archivo) > 0){
       include "agendaCom.php";
      // header("refresh:3;url=agendaCom.html");
    } else{
        include "agenda.html";
      
}

    

    
?>