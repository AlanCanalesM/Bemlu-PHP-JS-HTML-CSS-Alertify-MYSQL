<?php
include "config.php";
include "conexion.php";
include "templates/menu.php";

?>
 <link rel="stylesheet" type="text/css" href="css/estilosh.css">
 <link rel="stylesheet" type="text/css" href="css/animate.css">
 <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
<script src="js/alertify.min.js"></script>
 <link  rel="icon"   href="imagenes/favicon.ico" type="image/ico">


    <div class="contenedor">

	

    
  <div class="uno">
  	<?php if(!$mensaje==""){ ?>
  <?php if($mensaje=="Producto Agregado al Carrito"){ ?>
	

 <script>alertify.success('Producto agregado correctamente');</script>



<?php } else{?>
<script>alertify.error('El producto no se agrego');</script>
<?php }?>
<?php }?>
  <?php
$sentencia=$pdo->prepare("SELECT * FROM `tblproductos`");
$sentencia->execute();
$listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaProductos); 
?>

<?php foreach($listaProductos as $producto){?>
	<div class="cajauno">
  <style type="text/css">

.modalDialog {
	position: fixed;
	font-family: Arial, Helvetica, sans-serif;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
	z-index: 99999;
	opacity:0;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	pointer-events: none;
}
.modalDialog:target {
	opacity:1;
	pointer-events: auto;
}
.modalDialog > div {
	width: 400px;
	position: relative;
	margin: 10% auto;
	padding: 5px 20px 13px 20px;
	border-radius: 10px;
	background: #fff;
	background: -moz-linear-gradient(#fff, #999);
	background: -webkit-linear-gradient(#fff, #999);
	background: -o-linear-gradient(#fff, #999);
  -webkit-transition: opacity 400ms ease-in;
-moz-transition: opacity 400ms ease-in;
transition: opacity 400ms ease-in;
}
.close {
	background: #606061;
	color: #FFFFFF;
	line-height: 25px;
	position: absolute;
	right: -12px;
	text-align: center;
	top: -10px;
	width: 24px;
	text-decoration: none;
	font-weight: bold;
	-webkit-border-radius: 12px;
	-moz-border-radius: 12px;
	border-radius: 12px;
	-moz-box-shadow: 1px 1px 3px #000;
	-webkit-box-shadow: 1px 1px 3px #000;
	box-shadow: 1px 1px 3px #000;
}
.close:hover { background: #00d9ff; }

#ver{
  background-color: red;
  padding: 10px;
  border-radius:10px;
  text-align:center;
  color:white;
  text-decoration:none;

}
</style>

 
<img class="img" src="<?php echo $producto['Imagen']; ?>" width="100%" height="53%"/>

<h2><?php echo $producto['Nombre']; ?></h2><br/><br/>

<h3>$<?php echo $producto['Precio'];?></h3>

<div class="descripciones"><p><?php echo $producto['Descripcion']; ?></p><br/><br/> 

</div>

<form action="" method="POST">



<input type="submit" name="btnAccion" value="Agregar al carrito" class="buttoncarrito">

<input class="encrypted" type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], Cod, Key); ?>">
<input class="encrypted" type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'], Cod, Key); ?>">
<input class="encrypted" type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'], Cod, Key); ?>">
<input class="encrypted" type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, Cod, Key);?>">

</form>

</div>

<?php } ?>



</div>

</body>


</html>


