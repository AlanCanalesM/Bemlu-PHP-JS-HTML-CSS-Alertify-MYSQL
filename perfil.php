<?php  

include "config.php";
include "conexion.php";
include "carrito.php";

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
	<script src="js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="font/css/all.css">
    <script src="font/js/all.js"></script>
    <title>Perfil</title>
</head>
<body>

<style>
*{
    background: radial-gradient(  #F7E7CE,  #F7E7CE);

}
</style>

<?php if ($_SESSION['Usuario']=="S/N") {?>
   

    <h1>No puedes ver esta pagina hasta que inicies sesion</h1>
    <style type="text/css">
        

        h1{
            text-align: center;
            margin-top: 15%;
        }

        .btn{
            margin-top: 5%;
        }
    </style>
<div class="text-center">
    <a href="index.php"><button class="btn btn-link">Volver al inicio</button></a>
    </div>
<?php } else {?>
    <div class="principal">
<div class="col text-center">

<div class="card">
    <img class="card-img-top" src="
    imagenes/user.png" width="40%" alt="">
    <div class="card-body">
        <h5 class="card-title"><?php echo ($_SESSION['Usuario'])  ?></h5>
        <p class="card-text">Elementos en carrito:  <?php  echo (empty ($_SESSION['Carrito']))?0:count($_SESSION['Carrito']); ?></p>
        <br/><a href="carritop.php"><button type="button" class="btn btn-info">Ver mi carrito </button></a>
        <br/><br/><!-- Button trigger modal -->
<!---<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
  Editar Perfil
</button>--->
<br/><br/><a href="destruir.php"><button type="button" class="btn btn-danger">
  Cerrar sesion
</button></a>
<br/><br/><a href="index.php"><button type="button" class="btn btn-link">Volver al inicio</button></a>
    </div>
</div>

</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="loginform" class="form-horizontal" role="form" action="actualizar.php" method="POST" autocomplete="off">
						
                        <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="usuario" type="text" class="form-control" name="txtname" value="" placeholder="Nombre" required>                                        
                            </div>
                            
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="usuario" type="text" class="form-control" name="txtusername" value="<?php echo($_SESSION['Usuario'])?>" placeholder="Nombre_Usuario" required>                                        
                            </div>
                            
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="txtpassword" placeholder="Password" required>
                            </div>
                            
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    <button id="btn-login" type="submit" class="btn btn-success">Guardar Cambios</a>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                        Ya tienes cuenta? <a href="login.php">Inicia sesion aqui</a>
                                    </div>
                                </div>
                            </div>    
                        </form>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>


    </div>
</body>

<?php }?>
</html>