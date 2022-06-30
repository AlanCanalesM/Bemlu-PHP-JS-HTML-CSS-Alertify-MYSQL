<!DOCTYPE html>
<html>
<head>
	<title>Ingresar</title>
	<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
<script src="js/alertify.min.js"></script>
</head>
<body>

</body>
</html>

<?php
include "config.php";
include "conexion.php";

$con=mysql_connect(Servidor, Usuario, Password, BD) or die ("Problemas al conectar");

mysql_select_db(BD,$con ) or die("Problemas con la bd");

$nombre= $_POST['username'];
$pass= $_POST['password'];

$sel=mysql_query("SELECT nombre, Username, Password FROM usuarios WHERE Username='$nombre'", $con);

$sesion=mysql_fetch_array($sel);

if ($pass == $sesion['Password']) {
	
	session_start();
	$_SESSION['Usuario']=$sesion['nombre'];
	header("location:index.php");
}else?><script>alertify.error('No existe ese usuario');</script>


	