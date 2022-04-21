<?php
require '../src/Operaciones.php';
$uri='http://127.0.0.1/~noeliabellon/3%c2%ba%20EVAL/DWES06/servidorSoap';
$parametros=['uri'=>$uri];
try {
    $server = new SoapServer(NULL, $parametros);
    $server->setClass('Operaciones');
    $server->handle();
} catch (SoapFault $f) {
    die("error en server: " . $f->getMessage());
}
?>