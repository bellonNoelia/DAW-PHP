<?php
require '../vendor/autoload.php';
$uri='http://127.0.0.1/~noeliabellon/3EVAL/DWES06/servidorSoap';
try {
    //Instanciamos el SoapServer al no trabajar con wsdl el primer parámetro es null y como segundo parámetro pasamos la uri
    $server = new SoapServer(null,['uri'=>$uri]);
    //Le indicamos de donde carga las clases
    $server->setClass('Clases\Operaciones');
    $server->handle();
} catch (SoapFault $f) {
    die("error en server: " . $f->getMessage());
}
?>