<?php





$mensaje="";

if(isset($_POST['btnAccion'])){

switch($_POST['btnAccion']){

    case 'Agregar al carrito': 
    
if(is_numeric(openssl_decrypt($_POST['id'], Cod, Key))){

    $id=openssl_decrypt($_POST['id'], Cod, Key);
    $mensaje.="OK ID correcto".$id."<br/>";


}
else{
    $mensaje.="Error en el ID".$id."<br/>";
}

if(is_string(openssl_decrypt($_POST['nombre'], Cod, Key))){
    $Nombre=openssl_decrypt($_POST['nombre'], Cod, Key);
    $mensaje.="Ok nombre".$Nombre."<br/>";
}
else {
    $mensaje.="Error con el nombre"."<br/>";
    break;
}
if(is_numeric(openssl_decrypt($_POST['cantidad'], Cod, Key))){
    $Cantidad=openssl_decrypt($_POST['cantidad'], Cod, Key);
    $mensaje.="Ok cantidad".$Cantidad."<br/>";
}
else{
    $mensaje.="Error con la cantidad"."<br/>";
    break;
} 

if(is_numeric(openssl_decrypt($_POST['precio'], Cod, Key))){

    $Precio=openssl_decrypt($_POST['precio'], Cod, Key);
    $mensaje.="Ok precio ".$Precio."<br/>";
}
else 
{
    $mensaje.="Error con el precio"."<br/>";
    break;
}

if(!isset($_SESSION['Carrito'])){

    $producto=array(


        'Id'=>$id,
        'Nombre'=>$Nombre,
        'Cantidad'=>$Cantidad,
        'Precio'=>$Precio,
    );

    $_SESSION['Carrito'][0]=$producto;
    $mensaje="Producto Agregado al Carrito";
    


}else{

    $idProductos=array_column($_SESSION['Carrito'], "Id");
if(in_array($id, $idProductos)){

    echo "<script>alert('El producto ya ha sido seleccionado');</script>";
    $mensaje="ya seleccionado";

}else{


    $Numerodeproductos=count($_SESSION['Carrito']);

    $producto=array(


        'Id'=>$id,
        'Nombre'=>$Nombre,
        'Cantidad'=>$Cantidad,
        'Precio'=>$Precio,
    );

    $_SESSION['Carrito'][$Numerodeproductos]=$producto;
    $mensaje="Producto Agregado al Carrito";
}
}

//$mensaje=print_r($_SESSION, true);

break;

case 'Eliminar':
if(is_numeric(openssl_decrypt($_POST['id'], "AES-128-ECB", "alanyjaqui"))){

    $id=openssl_decrypt($_POST['id'], "AES-128-ECB", "alanyjaqui");
    
    foreach($_SESSION['Carrito'] as $indice=>$producto){

        if($producto['Id']==$id){

            unset($_SESSION['Carrito'][$indice]);

            $mensaje="eliminado";
        }

    }


}
else{
    $mensaje.="Error en el ID".$id."<br/>";
}
break;
}
}




   


?>