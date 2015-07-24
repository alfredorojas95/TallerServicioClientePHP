<?php
// Esto nos sirve para incluir Zend de forma directa
set_include_path(get_include_path().PATH_SEPARATOR.realpath(dirname(__FILE__) . "/../"));
// Incluimos la clase que contiene el Servicio Web
require_once('servicio_ejemplo.php');
if (strtolower($_SERVER['QUERY_STRING']) == 'wsdl')
{
#Utilizamos la clase Zend_Soap_AutoDiscover para
#generar de forma automatica el WSDL
require_once('Zend/Soap/AutoDiscover.php');
$wsdl = new Zend_Soap_AutoDiscover();
$wsdl->setClass('Servicio_ejemplo');
$wsdl->handle();
}
else
{
#Calculamos la ruta del WSDL del servidor
$wsdl_url = sprintf('http://%s%s?WSDL', $_SERVER['HTTP_HOST'],
$_SERVER['SCRIPT_NAME']);
// Creamos un servidor que atienda en base al WSDL generado
require_once('Zend/Soap/Server.php');
$server = new SoapServer($wsdl_url);
$server->setClass('Servicio_ejemplo');
$server->handle();
}

?>