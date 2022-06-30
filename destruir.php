<!DOCTYPE html>
<html>
<head>
	<title>Cerrar</title>
	<link rel="stylesheet" type="text/css" href="css/animate.css">
 <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
<script src="js/alertify.min.js"></script>
</head>
<body>
<?php

session_start();
session_destroy();
header("location:index.php");

?>


</body>
</html>
