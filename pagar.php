<?php

include "config.php";
include "conexion.php";

include "templates/menu.php";
?>


<?php 
 if($_POST){

    $total=0;
    $SID=session_id();

    $Correo=$_POST['email'];
    foreach($_SESSION['Carrito'] as $indice=>$producto){

        $total=$total+($producto['Precio']*$producto['Cantidad']);
    }


    
    $sentencia=$pdo->prepare("INSERT INTO `tblventas` (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) 
    VALUES (NULL, :ClaveTransaccion, '', NOW() , :Correo, :Total, 'pendiente');");
    
$sentencia->bindParam(":ClaveTransaccion", $SID);
$sentencia->bindParam(":Correo", $Correo);
$sentencia->bindParam(":Total", $total);

    $sentencia->execute();

    $idVenta=$pdo->lastInsertId();

    foreach($_SESSION['Carrito'] as $indice=>$producto){
        $sentencia=$pdo->prepare("INSERT INTO `tbldetalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) 
        VALUES (NULL, :IDVENTA, :IDPRODUCTO, :PRECIOUNITARIO, :CANTIDAD, '0');");


$sentencia->bindParam(":IDVENTA", $idVenta);
$sentencia->bindParam(":IDPRODUCTO", $producto['Id']);
$sentencia->bindParam(":PRECIOUNITARIO", $producto['Precio']);
$sentencia->bindParam(":CANTIDAD", $producto['Cantidad']);

    $sentencia->execute();
    }

//echo "<h3>".$total."</h3>";
 }
?>


<link rel="stylesheet" type="text/css" href="CSS.css">
<style type="text/css">
.contenedor{
    display:flex;
    justify-content: center;
    align-items: center;
}
.mensajefinal{
    margin-top: 10%;
    width: 80%;
    height: 400px;
    background-color:  #e5f1e4;
    border: 1px black solid;
}

.mensajefinal h1{
    text-align: center;
    font-family: Arial;
}

.mensajefinal p{
    text-align: center;
    font-family: Arial;
}
.mensajefinal h4{
    text-align:center;
    font-family: Arial;

}

.mensajefinal p strong{
    text-align:center;
    font-family: Arial;
}


.pie{
display: flex;
justify-content: center;
align-items: center;
background-color: transparent;
width: 100%;
height: 50px;
}

#paypal-button-container{
    text-align: center;
    display: block;
    margin-top: 5%;
}
</style> 
<div class="contenedor">
<div class="mensajefinal">
<h1>!Paso Final¡</h1>
<br/>
<p>Estas apunto de pagar con paypal la cantidad de: 
<br/>
<h4><br/>$<?php echo number_format($total,2); ?></h4>

</p>
<br/>

<p>Los productos seran enviados una vez que se procese el pago
<strong><br/>(Para aclaraciones: bbemlu6@gmail.com)</strong></p>
<div id="paypal-button-container"></div>



</div>

</div>


<!DOCTYPE html>

<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>

<body>
    <!-- Set up a container element for the button -->
    

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.01'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
    </script>
</body>
    




<div class="pie">
<p>BEMLU @2019</p>
</div>