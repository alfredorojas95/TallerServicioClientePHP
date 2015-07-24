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
<title>Cliente Fibonacci</title>
</head>
<body>
	
<?php
if ( isset($_GET['calcular'], $_GET['numero'])) {
$_GET['numero'] = str_replace(" ", "", $_GET['numero']);
// Creamos un cliente SOAP
require_once("Zend/Soap/Client.php");
$wsdl_url = "http://localhost/Ejercicios/Taller4/servicio/servicio_fibonacci/servicio_ejemploSOA.php?wsdl";
$cliente = new Zend_Soap_Client($wsdl_url);
if ( ($_GET['calcular'] == 'fibonacci') and ($_GET['numero'] != "") ) {
?>

<h1>Resultado Factorial</h1>
<p>La serie fibonacci hasta el valor límite es: <?php echo $cliente->fibonacci((int)$_GET['numero']); ?></p><br />

<?php
}
}
?>

<h1>Prueba Fibonacci</h1>
<form action="cliente_fibonacci.php" method="get">
<input type="hidden" name="calcular" value="fibonacci" /><!--para comprobar que se haya presionado el boton-->
<p>Ingrese un límite hasta donde calcular la serie fibonacci:</p>
<p><input type="text" name="numero" /></p><!--text field-->
<p><input type="submit" value="Calcular" /></p><!--boton-->
</form>
<br />

</body>
</html>