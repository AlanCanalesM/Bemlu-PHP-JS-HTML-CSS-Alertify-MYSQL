<?php
include "config.php";
include "conexion.php";
include "carrito.php";

session_start();

  if(isset($_SESSION['Usuario'])){?>

<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
<script src="js/alertify.min.js"></script>
 <script>alertify.success('Producto agregado correctamente');</script>

 <?php } else {

 	$_SESSION['Usuario']="S/N";
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Prueba</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link  rel="icon"   href="imagenes/favicon.ico" type="image/ico">
	

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/script.js"></script>
	<link rel="stylesheet" href="css/flexslider.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });
</script>




</head>
<body>
	<!---<embed id="reproductor" src="imagenes/aaron_smith.mp3">---> 

	
	
	<header>

		<nav>

			<ul>
				<li><a href="hombres.php">Hombres</a></li>
				<li><a href="mujeres.php">Mujeres</a></li>
				<li><a href="hombres.php">Cosa3</a></li>
			</ul>

			<img id="logo" src="imagenes/BEMLU.png" width="250px">

			

			<ul>
				<li><a href="login.php">Suscribete</a></li>
				<li><a href="perfil.php"><?php echo ($_SESSION['Usuario'])  ?></a></li>
				<li><a href="carritop.php">Carrito(<?php  echo (empty ($_SESSION['Carrito']))?0:count($_SESSION['Carrito']); ?>)</a></li>
			</ul>
		</nav>

	

	</header>
	<section id="banner">

		<div id="set" class="set">

			<div><img src="imagenes/animacion.png" width="30px"></div>
			<div><img src="imagenes/animacion.png" width="30px"></div>
			<div><img src="imagenes/animacion.png" width="30px"></div>
			<div><img src="imagenes/animacion.png" width="30px"></div>
			<div><img src="imagenes/animacion.png" width="30px"></div>
			<div><img src="imagenes/animacion.png" width="30px"></div>
		</div>

		<div id="set2" class="set set2">

			<div><img src="imagenes/animacion.png" width="30px"></div>
			<div><img src="imagenes/animacion.png" width="30px"></div>
			<div><img src="imagenes/animacion.png" width="30px"></div>
			<div><img src="imagenes/animacion.png" width="30px"></div>
			<div><img src="imagenes/animacion.png" width="30px"></div>
			<div><img src="imagenes/animacion.png" width="30px"></div>
		</div>




	</section>
	<div class="principal">
  <br/>  <br/>  <br/>


<style type="text/css">
.principal{
	width: 100%;
	justify-content: center;
	display: block;
	background: #000;
	height: 2500px;
	z-index: 99999;
	background-color: transparent;
}
.flexslider{
	width: 50%;
    position: center;
    margin-top: 100px;
   
    
}


	
#color2{
	font-family: Lato;
	position: absolute;
	top: 75%;
	text-align: center;
	width: 100%;
	font-size: 45px;
	color: #fff;
	font-weight: bold;
	text-decoration: none;
	background: red;
	padding: 10px;
	border-bottom: 5px solid black;
}




	
#color{
	font-family: Lato;
	position: absolute;
	top: 75%;
	text-align: center;
	width: 100%;
	font-size: 45px;
	color: #fff;
	font-weight: bold;
	text-decoration: none;
	background: red;
	padding: 10px;
	border-bottom: 5px solid black;
}



</style>
	
	<div class="flexslider">
	<ul class="slides">
		<li>
			<img src="imagenes/BEMLU3.png" alt="">
			<section class="flex-caption"><a href="#" id="color2">Ver Coleccion</a></section>
		</li>
		<li>
			<img src="imagenes/2.png" alt="">
			<section class="flex-caption"></section>
		</li>
		<li>
			<img src="imagenes/joya2.jpg" alt="">
			<section class="flex-caption"><p>VISITANOS AHORA MISMO</p></section>
		</li>
	</ul>
</div>


<section class="colecciones">
	  <div class="imagen1"><div id="info"><p>Esta es la mejor coleccion de mujeres de todo el e commerce<br/><br/><br/><a class="btnvisita" href="#">¡Visitala ya!</a></p></div></div>
	  <div class="imagen2"><div id="info2"><p>Es muy buena coleccion y atractiva para caballeros<br/><br/><br/><a class="btnvisita" href="hombres.php">¡Visitala ya!</a></p></div></div>

	

</section>
<br/>  <br/>  <br/>
<p id="sub">Hecha un vistazo a lo mas reciente</p>
  <?php
$sentencia=$pdo->prepare("SELECT * FROM `tblproductos`");
$sentencia->execute();
$listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaProductos); 
?>





<div id="contenedor-slider" class="contenedor-slider">
 <div id="slider" class="slider">
 	
 	<?php foreach($listaProductos as $producto){?>

    <section class="slider__section"><img src="<?php echo $producto['Imagen']; ?>" class="slider__img"><br/><form action="" method="POST">



<input type="submit" name="btnAccion" value="Agregar al carrito" class="buttoncarrito">

<input class="encrypted" type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], Cod, Key); ?>">
<input class="encrypted" type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'], Cod, Key); ?>">
<input class="encrypted" type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'], Cod, Key); ?>">
<input class="encrypted" type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, Cod, Key);?>">

</form></section>

    <?php } ?>
    

  </div>
  <div id="btn-prev" class="btn-prev">&#60;</div>
  <div id="btn-next" class="btn-next">&#62;</div>
 </div>
 
 <script type="text/javascript">//almacenar slider en una variable
var slider = $('#slider');
//almacenar botones
var siguiente = $('#btn-next');
var anterior = $('#btn-prev');

//mover ultima imagen al primer lugar
$('#slider .slider__section:last').insertBefore('#slider .slider__section:first');
//mostrar la primera imagen con un margen de -100%
slider.css('margin-left', '-'+63+'%');

function moverD() {
	slider.animate({
		marginLeft:'-'+200+'%'
	} ,1500, function(){
		$('#slider .slider__section:first').insertAfter('#slider .slider__section:last');
		slider.css('margin-left', '-'+63+'%');
	});
}

function moverI() {
	slider.animate({
		marginLeft:0
	} ,1500, function(){
		$('#slider .slider__section:last').insertBefore('#slider .slider__section:first');
		slider.css('margin-left', '-'+63+'%');
	});
}

function autoplay() {
	interval = setInterval(function(){
		moverD();
	}, 5000);
}
siguiente.click('click',function() {
	moverD();
	clearInterval(interval);
	autoplay();
});

anterior.click('click',function() {
	moverI();
	clearInterval(interval);
	autoplay();
});


autoplay();</script>
 
</div>





	<?php

include "templates/redes.php";
?>

</body>
</html>
