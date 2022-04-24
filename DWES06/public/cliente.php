<?php
$url = 'http://127.0.0.1/~noeliabellon/3EVAL/DWES06/servidorSoap/servicio.php';
$uri = 'http://127.0.0.1/~noeliabellon/3EVAL/DWES06/servidorSoap';
$codigoProducto=14;
$codigoTienda=1;
$codigoFamilia='CAMARA';
try {
    //Creamos el cliente SOAP al no tener WSDL el primer parámetro es null.
    $cliente = new SoapClient(null, ['location' => $url, 'uri' => $uri]);
} catch (SoapFault $ex) {
    echo "Error en cliente SOAP: ".$ex->getMessage();
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

