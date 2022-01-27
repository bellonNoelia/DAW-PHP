<?php
/*Tarefa 1. Construción de expresións en PHP. Nesta tarefa crearase un script PHP con dez expresións que fagan uso de dous operadores 
a elixir de cada un dos tipos expostos anteriormente: aritméticos, asignación, incremento/diminución, comparación e lóxicos. O script 
amosará o resultado de avaliar cada unha das expresións anteriores. Deberanse incluír no código cinco comentarios para cada grupo de i
nstrucións referidas a cada tipo de operador.*/
    $x=5;
    $y=4;
    echo "Partiendo de que x=5 e y=4 : "."\n";
    echo "\n";

    // Operadores aritméticos:
    echo "Operadores aritméticos: "."\n";
    echo "El resultado de ".$x." + ".$y." es: ";
    echo $x+$y."\n";

    echo "El resultado de ".$x." x ".$y." es: ";
    echo $x*$y."\n";
    echo "\n";

    //Operadores de asignación:
    echo "Operadores de asignación: "."\n";
    echo "El resultado de ".$x." = ".$y." es x= ";
    echo $x=$y."\n";

    echo 'El resultado de '.$x.'*'.'= '.$y.' es x= '.$x*=$y;
    echo "\n";
    echo "\n";

    //Operadores de incremento/diminución:
    echo "Operadores de incremento/diminución: "."\n";
    echo "El resultado de ++".$x." es x= ";
    echo ++$x."\n";

    echo "El resultado de ".$y." --  es y= ";
    echo --$y."\n";
    echo "\n";

    //Operadores de comparación
    echo "Operadores de comparación: "."\n";
    echo "El resultado de ".$x." > ".$y." es: ";
    if ($x>$y){
        echo "true";
    }else echo "false";
    echo "\n";
  
    echo "El resultado de ".$x." <= ".$y." es: ";
    if ($x<=$y){
        echo "true";
    }else echo "false";
    echo "\n";
    echo "\n";
    
    //Operadores lógicos:
    echo "Operadores lógicos: "."\n";
    echo "El resultado de ".$x."==11 and ".$y." == 3 es: ";
    if ($x==11 and $y==3){
        echo "true";
    }else echo "false";
    echo "\n";
  
    echo "El resultado de ".$x." == 5|| ".$y." <= 3 es: ";
    if($x==5||$y<=3){
        echo "true";
    }
    echo "\n";
?>