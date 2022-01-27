<?php 
/*Tarefa 3. Definición de arrays en PHP. Nesta tarefa desenvolverase un script PHP no que se cree un array de cada un dos tipos vistos
 anteriormente: indexado, asociativo e multidimensional. Mostrarase o resultado de acceder a un elemento de cada un dos arrays, así como 
 o número de elementos de cada array.*/

    //Arrays indexados:
    echo "Arrays indexados"."\n";
    $asignaturas=array("PRG","DWES","DWEC");
    echo "Curso tres asignaturas que son: "."$asignaturas[0]"." , "."$asignaturas[1]"." y "."$asignaturas[2]"."\n";
    echo "Tengo ".count($asignaturas)." asignaturas"."\n";
    echo "\n";
    
    //Arrays asociativos:
    echo "Arrays asociativos"."\n";
    $gato=array("Mía"=>"10","Haru"=>"1");
    echo "Haru tiene ".$gato["Haru"]." años"."\n";
    echo "Tengo ".count($gato)." gatos"."\n";
    echo "\n";

    //Arrays multidimensionales: 
    echo "Arrays multidimensionales"."\n";
    $animales=array
        (
            "Mamiferos"=>array
            (
                "Leon",
                "Delfin",
                "Perro"
            ),
            "Reptiles"=>array
            (
                "Caiman",
                "Lagartija"
            ),
            "Peces"=>array(
                "Piraña",
                "Pez globo",
                "Pez luna",
                "Raya"
            )
        );
    echo "El ".$animales["Mamiferos"][2]." es un mamífero"."\n";
    echo "Hay escritas ".count($animales,COUNT_RECURSIVE)." entradas."."\n";
?>