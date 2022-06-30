<?php

include "carrito.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font/css/all.css">
	<link rel="stylesheet" type="text/css" href="font/css/fontawesome.css">
    <script src="font/js/all.js"></script>
	<script src="font/js/fontawesome.js"></script>
   

</head>
<body>

<header>


<nav>

    <ul>
        <li><a href="hombres.php">Hombres</a></li>
        <li><a href="mujeres.php">Mujeres</a></li>
        <li><a href="hombres.php">Cosa3</a></li>
    </ul>

    <a href="index.php"><img id="logo" src="imagenes/BEMLU.png" width="50px"></a>

    <ul>
        <li><a href="login.php">Suscribete</a></li>
        <li><a href="perfil.php"><?php echo $_SESSION['Usuario'];   ?></a></li>
        <li><a href="Carritop.php">Carrito(<?php  
        
        echo (empty ($_SESSION['Carrito']))?0:count($_SESSION['Carrito']);

        ?>)</a></li>
    </ul>
</nav>

</header>