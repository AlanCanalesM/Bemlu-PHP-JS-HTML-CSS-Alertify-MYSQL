<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
<script src="js/alertify.min.js"></script>
    <title>Actualizar</title>
</head>
<body>
    
</body>
</html>

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

mysql_query("UPDATE usuarios set nombre='$_POST[txtname]', Username='$_POST[txtusername]', Password='$_POST[txtpassword]' WHERE Username='$_SESSION[Usuario]', $con") or die(mysql_error());

?>

<script>alertify.success('Se actualizo correctamente');</script>


<?php

  


  
}
?>