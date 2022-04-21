<?php
$cliente = new SoapClient("http://127.0.0.1/~noeliabellon/3EVAL/DWES06/servidorSoap?wsdl");
$codigoProducto=14;
$codigoTienda=1;
$codigoFamilia='CAMARA';
$pvp=$cliente->getPVP($codigoProducto);
echo "<ul>";
    echo "<li><code>$pvp</code></li>";
echo "</ul>";

$stock=$cliente->getStock($codigoProducto,$codigoTienda);
echo "<ul>";
    echo "<li><code>$stock</code></li>";
echo "</ul>";


$familia=$cliente->getFamilia();
echo "<ul>";
foreach ($familia as $k => $v) {
    echo "<li><code>$v</code></li>";
}
echo "</ul>";

$productoFamilia=$cliente->getProducto($codigoFamilia);
echo "<ul>";
foreach ($productoFamilia as $k => $v) {
    echo "<li><code>$v</code></li>";
}
echo "</ul>";
?>

