<?php  include "templates/menu.php";
include "carrito.php";
include "config.php";
session_start();
?>
<link rel="stylesheet" type="text/css" href="css/estiloscarrito.css">
<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
<link  rel="icon"   href="imagenes/favicon.ico" type="image/ico">

<script src="js/alertify.min.js"></script>

<div class="contenedor">
<section class="body">
<?php if ($_SESSION['Usuario']=="S/N") {?>
 
   <h1>Para comprar debes inciar sesion</h1>
    <style type="text/css">
        

        h1{
            text-align: center;
            margin-top: 5%;
            margin-left: 33%;
        }

    
    </style>

<?php } else{?>

<?php if(!empty($_SESSION['Carrito'])) {?>

<table class="tabla">
    <tbody>
<tr>
    <th width="40%">Descripcion</th>
    <th width="15%">Cantidad</th>
    <th width="20%">Precio</th>
    <th width="20%">Total</th>
    <th width="5%">--</th>
    
</tr>
<?php $total=0; ?>
<?php foreach($_SESSION['Carrito'] as $indice=>$producto){ ?>
<tr>
    <td width="40%"><?php echo $producto['Nombre']; ?></td>
    <td width="15%"><?php echo $producto['Cantidad']; ?></td>
    <td width="20%"><?php echo $producto['Precio']; ?></td>
    <td width="20%"><?php echo number_format($producto['Precio']*$producto['Cantidad'],2);  ?></td>
    <td width="5%">
    <form action="" method="POST">

    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['Id'], Cod, Key); ?>">
   <button class="btnrojo" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>

    </form>
    </td>
</tr>
<?php $total=$total+($producto['Precio']*$producto['Cantidad']); ?>
<?php } ?>

<tr>
<td colspan="3"><h3>TOTAL</h3></td>
<td><h3><?php echo number_format($total,2); ?></h3></td>
<td></td>

</tr>

<tr>
<td colspan="5">

<form action="pagar.php" method="post">
<div class="alert2">

<div>
<label for="my-input">Correo de contacto:</label>
<input id="email" name="email" type="email" placeholder="Escribe tu correo" required> 
</div>

<small id="emailHelp" class="">Los productos se enviaran a este correo</small>
</div>
<button class="btnverde" type="submit" value="proceder" name="btnAccion">Proceder a pagar</button>
</form>
</td>
</tr>

</tbody>
</table>



<?php } else{?>

<script>
alertify
  .alert("No hay ningun elemento en el carrito", function(){
    alertify.error('OK');
  });</script>
<div class="alert">

<p>No hay ningun elemento en el carrito</p>


</div>


<?php } }?>

</section>


</div>
<div class="pie">
<p>BEMLU @2019</p>
</div>
</body>
</html>