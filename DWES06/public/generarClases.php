<?php

require '../vendor/autoload.php';

use Wsdl2PhpGenerator\Generator;
use Wsdl2PhpGenerator\Config;

$generator =new Generator();
$generator->generate(
    new Config([
        'inputFile' => "http://127.0.0.1/~noeliabellon/3EVAL/DWES06/servidorSoap/servicioW.php?wsdl", //wsdl
        'outputDir' => '../src/Clases1',  //directorio donde vamos a generar las clases
        'namespaceName' => 'Clases\Clases1'  //namespace que vamos a usar con ellas (lo indicamos en composer)
    ])
    );

?> 