<?php
  $nombre=$_POST['nombre'];
  $Ape1=$_POST['Apellido1'];
  $Ape2=$_POST['Apellido2'];
  $edad=$_POST['edad'];
  $fecha=$_POST['fecha'];
  $dni=$_POST['dni'];

 
  echo dniValido($dni)."<br>";
  
  echo dniExiste($dni)."<br>";

  echo fechaCorrecta($fecha)."<br>";
  
  echo "<br><br>Los datos introducidos son los siguientes: <br><br>".
        "Nombre: ".$nombre."<br>"."Primer apellido: ".$Ape1."<br>".
        "Segundo apellido: ".$Ape2."<br>"."Edad: ".$edad."<br>".
        "Fecha de nacimiento:  ".$fecha."<br>"."DNI: ".$dni."<br>";

  
  /*Función que recibe como parametro el DNI y comprueba que tiene 8 dígitos numéricos y 1 letra. pe.11111111A Si la comprobación es correcta,
  devolvera un mensaje DNI Válido.*/
  function dniValido($dni){
    //$patron="[0-9]{8}[A-Z]{1}/"; NO FUNCIONA
    $patron='/^[0-9]{8}[A-Z]{1}$/';
    if(!preg_match($patron,$dni)){
      return "DNI erróneo"."<br>";
    }
    else {
      return "DNI válido."."<br>";
    }
  }
  /*Función que recibe el DNI y comprueba si existe en el array de DNI´*/
  function dniExiste($dni){
    $fp=fopen("datos.txt","r"); 
    if (!$fp = fopen("datos.txt", "r")){
      echo "No se ha podido abrir el archivo"."<br>";
  }
    $archivo = file_get_contents('datos.txt'); //Guardamos el contenido del fichero en una variable.
    $pos=strpos($archivo,$dni); //Buscamos el DNI en el contenido.
    if($pos===false){//NO FUNCIONA SIN USAR LINEA 44
      echo dniNoExiste($dni);
      fclose($fp);
    }else{
      echo "El DNI ya existe."."<br>";
      fclose($fp);
    }
    
 }

  /*Función que recibe un DNI válido y que no existe en el array de DNI´s , y lo guarda en la siguiente posición libre del array.*/
  function dniNoExiste($dni){
    global $nombre;
    global $Ape1;
    global $Ape2;
    global $edad;
    global $fecha;
    $fp=fopen("datos.txt","a");
    fwrite($fp,$dni);
    fwrite($fp," , ");
    fwrite($fp,$nombre);
    fwrite($fp," , ");
    fwrite($fp,$Ape1);
    fwrite($fp," , ");
    fwrite($fp,$Ape2);
    fwrite($fp," , ");
    if(edadCorrecta($fecha)==$edad){
      fwrite($fp,$edad);
    }else{
      fwrite($fp,edadCorrecta($fecha));
    }
    fwrite($fp," , ");
    fwrite($fp,$fecha);
    fwrite ($fp, "\n");
    //fwrite($fp,);
    fclose($fp);

    echo "El DNI se ha registrado correctamente"."<br>";

  }  

  /*Función que recibe como parámetros la fecha de nacimiento y la edad, y comprueba si es cierto el valor que tiene el campo edad. En el caso de no ser cierto, 
  devolverá un mensaje que diga  “Es una tontería mentir en la edad, si aportas la fecha de nacimiento”. Si es cierto, muestra un mensaje que indica “La sinceridad
  es un punto”.*/
  function fechaCorrecta($fecha){
      global $edad;
      $cumpleanos=new DateTime($fecha);
      $hoy=new DateTime();
      $calculo=($hoy-> diff($cumpleanos))-> format("%y");
      if($calculo==$edad){
        return "La sinceridad es un punto."."<br>";
      }else{
        return "Es una tontería mentir en la edad, si aportas la fecha de nacimiento."."<br>"."La edad correcta es: ".$calculo."<br>";
      }
  }
/*Función que recibe como parámetros la fecha de nacimiento y la edad, y devuelve la edad según la fecha introducida.*/
  function edadCorrecta($fecha){
    global $edad;
    $cumpleanos=new DateTime($fecha);
    $hoy=new DateTime();
    return $calculo=($hoy-> diff($cumpleanos))-> format("%y");
}



?>