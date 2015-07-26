<?php
// Esto nos sirve para incluir Zend de forma directa
set_include_path(get_include_path() .
PATH_SEPARATOR .
realpath(dirname(__FILE__) . "/../servicio/"));
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Cliente Factorial</title>
</head>
<body>
	
<?php
if ( isset($_GET['numero'])) {
$_GET['numero'] = str_replace(" ", "", $_GET['numero']);
// Creamos un cliente SOAP
require_once("Zend/Soap/Client.php");
$wsdl_url = "http://localhost/Ejercicios/Taller4/servicio/servicio_factorial/servicio_ejemploSOA.php?wsdl";
$cliente = new Zend_Soap_Client($wsdl_url);
if ( ($_GET['calcular'] == 'factorial') and ($_GET['numero'] != "") ) {
?>

<h1>Resultado Factorial</h1>
<p>El factorial del número es: <?php echo $cliente->factorial((int)$_GET['numero']); ?></p><br />

<?php
}
}
?>

<h1>Prueba Factorial</h1>
<form action="cliente_factorial.php" method="get">
<input type="hidden" name="calcular" value="factorial" /><!--para comprobar que se haya presionado el boton-->
<p>Ingrese un número positivo:</p>
<p><input type="text" name="numero" required/></p><!--text field-->
<p><input type="submit" value="Calcular" /></p><!--boton-->
</form>
<br />

</body>
</html>