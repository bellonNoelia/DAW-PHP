<?php
require '../vendor/autoload.php';
$url='http://127.0.0.1/~noeliabellon/3EVAL/DWES06/servidorSoap/servicio.wsdl';
try {
    //Instanciamos el SoapServer al trabajar con wsdl solo tiene el parámetro de la url
    $server = new SoapServer($url);
    //Le indicamos de donde carga las clases
    $server->setClass('Clases\Operaciones');
    $server->handle();
} catch (SoapFault $f) {
    die("error en server: " . $f->getMessage());
}
