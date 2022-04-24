<?php

namespace Clases\Clases1;

class ClasesOperacionesService extends \SoapClient
{

  /**
   * @var array $classmap The defined classes
   */
  private static $classmap = array();

  /**
   * @param array $options A array of config values
   * @param string $wsdl The wsdl file to use
   */
  public function __construct(array $options = array(), $wsdl = null)
  {
    foreach (self::$classmap as $key => $value) {
      if (!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    $options = array_merge(array(
      'features' => 1,
    ), $options);
    if (!$wsdl) {
      $wsdl = 'http://127.0.0.1/~noeliabellon/3EVAL/DWES06/servidorSoap/servicioW.php?wsdl';
    }
    parent::__construct($wsdl, $options);
  }

  /**
   * Obtiene el PVP de un producto a partir de su codigo
   *
   * @param int $id
   * @return float
   */

  //Llama a getPvp
  public function getPvp($id)
  {
    return $this->__soapCall('getPvp', array($id));
  }

  /**
   * Devuelve el numero de unidades que existen en una tienda de un producto
   *
   * @param int $idP
   * @param int $tienda
   * @return int
   */
  //Llama a getStock
  public function getStock($idP, $tienda)
  {
    return $this->__soapCall('getStock', array($idP, $tienda));
  }

  /**
   * Devuelve un array con los codigos de todas las familias
   *
   * @return Array
   */
  //Llama a getFamilias
  public function getFamilias()
  {
    return $this->__soapCall('getFamilias', array());
  }

  /**
   * Devuelve un array con los nombres de los productos de una familia
   *
   * @param string $familia
   * @return Array
   */
  //Llama a getProductosFamilia
  public function getProductosFamilia($familia)
  {
    return $this->__soapCall('getProductosFamilia', array($familia));
  }
}
