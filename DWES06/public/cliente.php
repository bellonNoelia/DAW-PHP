<?php
require '../src/Operaciones.php';
$url = 'http://127.0.0.1/~noeliabellon/3%c2%ba%20EVAL/DWES06/servidorSoap/servicio.php';
$uri = 'http://127.0.0.1/~noeliabellon/3%c2%ba%20EVAL/DWES06/servidorSoap';
$codigoProducto=14;
$codigoTienda=1;
$codigoFamilia='CAMARA';
try {
    $cliente = new SoapClient(null, ['location' => $url, 'uri' => $uri, 'trace'=>true]);
} catch (SoapFault $ex) {
    echo "Error: ".$ex->getMessage();
}
$pvp=$cliente->getPVP($codigoProducto);

$stock=$cliente->getStock($codigoProducto,$codigoTienda);

$familia=$cliente->getFamilia();

$productoFamilia=$cliente->getProducto($codigoFamilia);
?>

