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
<title>Cliente Email</title>
</head>
<body>
	
<?php
if ( isset($_GET['calcular'], $_GET['cadena'])) {
$_GET['cadena'] = str_replace(" ", "", $_GET['cadena']);
// Creamos un cliente SOAP
require_once("Zend/Soap/Client.php");
$wsdl_url = "http://localhost/Ejercicios/Taller4/servicio/servicio_email/servicio_ejemploSOA.php?wsdl";
$cliente = new Zend_Soap_Client($wsdl_url);
if ( ($_GET['calcular'] == 'email') and ($_GET['cadena'] != "") ) {
?>

<h1>Resultado Email</h1>
<p>El correo: <?php echo $_GET['cadena']." es ".$cliente->validarCorreo($_GET['cadena']); ?></p><br />

<?php
}
}
?>

<h1>Prueba Email</h1>
<form action="cliente_email.php" method="get">
<input type="hidden" name="calcular" value="email" /><!--para comprobar que se haya presionado el boton-->
<p>Ingrese su dirección de correo electrónico:</p>
<p><input type="text" name="cadena" required/></p><!--text field-->
<p><input type="submit" value="Verificar" /></p><!--boton-->
</form>
<br />

</body>
</html>