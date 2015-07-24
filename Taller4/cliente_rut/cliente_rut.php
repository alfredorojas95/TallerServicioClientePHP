<?php
// Esto nos sirve para incluir Zend de forma directa
set_include_path(get_include_path() .
PATH_SEPARATOR .
realpath(dirname(__FILE__) . "/../Taller4/servicio/"));
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Cliente Factorial</title>
</head>
<body>
	
<?php
if ( isset($_GET['calcular'], $_GET['numero'])) {
$_GET['numero'] = str_replace(" ", "", $_GET['numero']);
// Creamos un cliente SOAP
require_once("Zend/Soap/Client.php");
$wsdl_url = "http://localhost/Ejercicios/Taller4/servicio/servicio_rut/servicio_ejemploSOA.php?wsdl";
$cliente = new Zend_Soap_Client($wsdl_url);
if ( ($_GET['calcular'] == 'rut') and ($_GET['numero'] != "") ) {
?>

<h1>Resultado Validacion de rut</h1>
<p>El factorial del número es: </p><br/>

<?php 
if ($cliente->validarRut((int)$_GET['numero'])==true){
	echo "El rut es correcto";
} else {
	echo "El rut es incorrecto";
}
?>

<?php
}
}
?>

<h1>Prueba Validación de RUT</h1>
<form action="cliente_rut.php" method="get">
<input type="hidden" name="calcular" value="rut" /><!--para comprobar que se haya presionado el boton-->
<p>Ingrese un número positivo:</p>
<p><input type="text" name="numero" /></p><!--text field-->
<p><input type="submit" value="Verificar" /></p><!--boton-->
</form>
<br />

</body>
</html>