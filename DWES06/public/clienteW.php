<?php
$url='http://127.0.0.1/~noeliabellon/3EVAL/DWES06/servidorSoap/servicio.wsdl';
$codigoProducto=14;
$codigoTienda=1;
$codigoFamilia='CAMARA';
try {
//Creamos el cliente SOAP al ser WSDL indicamos donde se encontrará.
$cliente = new SoapClient($url);
} catch (SoapFault $ex) {
    echo "Error: ".$ex->getMessage();
}
//Recuperamos el precio del producto.
$pvp=$cliente->__soapCall('getPVP',['id'=>$codigoProducto]);
echo "<ul>";
    echo "<li><code>El precio del producto $codigoProducto es $pvp euros.</code></li>";
echo "</ul>";
//Recuperamos las unidades del producto en la tienda indicada.
$stock=$cliente->__soapCall('getStock',['p'=>$codigoProducto,'t'=>$codigoTienda]);
echo "<ul>";
    echo "<li><code>Hay $stock unidades del producto $codigoProducto en la tienda $codigoTienda.</code></li>";
echo "</ul>";
//Recuperamos los códigos de las familias.
$familia=$cliente->__soapCall('getFamilias',[]);
echo "<ul>";
foreach ($familia as $k => $v) {
    echo "<li><code>$v</code></li>";
}
echo "</ul>";
//Recuperamos los productos de la familia indicada.

$productoFamilia=$cliente->__soapCall('getProducto',['f'=>$codigoFamilia]);
echo "<ul>";
foreach ($productoFamilia as $k => $v) {
    echo "<li><code>$v</code></li>";
}
echo "</ul>";
?>

