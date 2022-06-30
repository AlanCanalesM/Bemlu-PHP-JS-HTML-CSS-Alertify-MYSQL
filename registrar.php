<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="js/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
<script src="js/alertify.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
  <title>Registro</title>
</head>
<body>
  


<?php
include "config.php";
include "conexion.php";

if(isset($_POST['txtusername']) && !empty($_POST['txtusername'])

&& isset($_POST['txtpassword']) && !empty($_POST['txtpassword'])
&& isset($_POST['txtpassword']) && !empty($_POST['txtname'])){

  $nombre=$_POST['txtname'];
  $user=$_POST['txtusername'];
  $pass=$_POST['txtpassword'];

  $con=mysql_connect(Servidor, Usuario, Password, BD) or die ("Problemas al conectar");

  mysql_select_db(BD,$con ) or die("Problemas con la bd");
$sel=mysql_query("SELECT nombre, Username, Password FROM usuarios WHERE Username='$user'", $con);

$sesion=mysql_fetch_array($sel);

if ($user == $sesion['Username']) {?>
  
 <script>alertify.error('Ya existe un usuario asi');</script>
  <?php header("location:registro.php");
}else{?>


 <style>
 *{
  background: radial-gradient(  #F7E7CE,  #F7E7CE);


}
 .abs{
 display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
}

.asa{

  margin-top:10%;
}

.btn{
  margin-top: -200%;
}
 </style>
  
<script>alertify.success('Se registro correctamente');</script>
<div class="col text-center">
<img src="imagenes/user.png" width="400px" class="asa img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
</div>
<div class="col text-center abs">

<a href="login.php"><button class="btn btn-primary" type="button">Inicia sesion ahora mismo</button></a>
</div>


<?php }} ?>

</body>
</html>