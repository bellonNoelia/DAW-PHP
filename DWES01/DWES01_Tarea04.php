<?php 
/*Tarefa 4. Uso de arrays. Nesta tarefa desenvolvese un script PHP que me permita sumar 2 matrices 3x3, previamente creadas polo usuario; 
é dicir, solicitando os datos dende teclado. Mostrar o resultado da xeración das matrices e máis o resultado da suma.*/
$primero=array();
for($i=0;$i<3;$i++){
    $primero[$i]=array();
    for($j=0;$j<3;$j++){
        echo "Introduce un número para la primera matriz ";
        $primero[$i][$j]=readline();
        echo $primero[$i][$j];
    }
}
echo "\n";
echo "Primera matriz";
echo "\n";
for($i=0;$i<3;$i++){
    for($j=0;$j<3;$j++){
        echo $primero[$i][$j]." ";
    } 
    echo "\n";
}
$segundo=array();
for($n=0;$n<3;$n++){
    $segundo[$n]=array();
    for($m=0;$m<3;$m++){
        echo "Introduce un número para la segunda matriz ";
        $segundo[$n][$m]=readline();
        echo $segundo[$n][$m];
    }
}
echo "\n";
echo "Segunda matriz";
echo "\n";
for($n=0;$n<3;$n++){
    for($m=0;$m<3;$m++){
        echo $segundo[$n][$m]." ";
    }
    echo "\n";
}
$suma=array();
for($s=0;$s<3;$s++){
    for($r=0;$r<3;$r++){
        $suma[$s][$r]=$primero[$s][$r]+ $segundo[$s][$r];
    }
}
echo "\n";
echo "Suma matrices";
echo "\n";
for($s=0;$s<3;$s++){
    for($r=0;$r<3;$r++){
        echo  $suma[$s][$r]." ";
    }
    echo "\n";
}
    
?>