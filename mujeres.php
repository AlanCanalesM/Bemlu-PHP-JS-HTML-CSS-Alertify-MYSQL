<?php
include "config.php";
include "conexion.php";
include "templates/menu.php";

?>
 <link rel="stylesheet" type="text/css" href="css/estilosm.css">
 <link rel="stylesheet" type="text/css" href="css/animate.css">
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

<?php } ?>
  <?php
$sentencia=$pdo->prepare("SELECT * FROM `tblmujeres`");
$sentencia->execute();
$listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($listaProductos); 
?>

<?php foreach($listaProductos as $producto){?>
	<div class="cajauno">
  

  
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


