<?php
/*Tarefa 2. Manexo de cadeas en PHP. Nesta tarefa crearase un script PHP no que se asignen tres cadeas a tres variables. 
Estas variables mostraranse concatenadas de tal maneira que haxa un salto de liña entre cada unha delas. 
Tamén se mostrará a lonxitude da cadea resultante.*/
    $var1="Hola, qué tal?";
    $var2="Mi nombre es Noelia.";
    $var3="Y  este es un ejercicio de PHP.";
    //Resultado de las tres variables concatenadas y su longitud.
    echo "El resultado de la variable concatenadas más la longitud es: "."\n";
    echo $var1." la longitud de la cadena es: ".strlen("Hola, qué tal?")."\n".$var2." la longitud de la cadena es: ".strlen("Mi nombre es Noelia.")."\n".$var3." la longitud de la cadena es: ".strlen("Y  este es un ejercicio de PHP.")."\n";
?>