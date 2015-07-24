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
if ( isset($_GET['calcular'], $_GET['cadena'])) {
$_GET['cadena'] = str_replace(" ", "", $_GET['cadena']);
// Creamos un cliente SOAP
require_once("Zend/Soap/Client.php");
$wsdl_url = "http://localhost/Ejercicios/Taller4/servicio/servicio_mayuscula/servicio_ejemploSOA.php?wsdl";
$cliente = new Zend_Soap_Client($wsdl_url);
if ( ($_GET['calcular'] == 'mayuscula') and ($_GET['cadena'] != "") ) {
?>

<h1>Resultado Factorial</h1>
<p>La cadena es: <?php echo $cliente->mayuscula($_GET['cadena']); ?></p><br />

<?php
}
}
?>

<h1>Prueba Conversion de una cadena a mayúscula</h1>
<form action="cliente_mayuscula.php" method="get">
<input type="hidden" name="calcular" value="mayuscula" /><!--para comprobar que se haya presionado el boton-->
<p>Ingrese una cadena de texto:</p>
<p><input type="text" name="cadena" /></p><!--text field-->
<p><input type="submit" value="Calcular" /></p><!--boton-->
</form>
<br />

</body>
</html>