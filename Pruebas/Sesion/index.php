<?php
require_once "Session.php";

$session=new Session();

$session->setAttribute("nombre","noe");

echo "Valor de la propiedad nombre:". $session->getAttribute("nombre")."</br>";


$session->deleteAttribute("nombre");

echo  "Valor de la propiedad nombre:". $session->getAttribute("noe")."</br>";


$session->destroySession();
?>