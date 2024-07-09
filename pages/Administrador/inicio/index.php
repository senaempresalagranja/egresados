<?php
session_start();
if (isset($_SESSION['ADMINISTRADOR']))
{ 
  include '../include/conexion.php';
  $usuario=($_SESSION['ADMINISTRADOR']);
  $res=mysqli_query($conexion,"SELECT * FROM usuarios WHERE id_Usuario=$usuario");
        while ($reg=mysqli_fetch_array($res)) 
        {
          $nomusua_usua=utf8_decode($reg[2]);
          $rolusua=utf8_decode($reg[1]);
         }
         $saludo="Bienvenido $nomusua_usua, a el Rol del $rolusua";
         $usu="<p>$nomusua_usua</p> <p class='designation'>$rolusua</p>"; 
         
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Sistema De Informacion Para Los Egresados del Sena ">
  <meta name="keywords" content="HTML,CSS,JavaScript">
  <meta name="author" content="Alexis Espinosa Vidal">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Egresados La Granja</title>
  <?php 
      include'../include/links.php'; 
    ?>
</head>
  <body class="sidebar-mini fixed" style="" >
    <!-- menu de navegacion de todo el sistema  -->
    <?php 
      include'../include/menu.php'; 
    ?>
 <div class="banner">
      <!--     <h1 class="titulo-baner">Caffe</h1> -->
        </div>


    <div class="container">
      <div class="row">

       

        

      </div>
    </div>





    <style>
      
    </style>
    
    <div id="resultado"></div>      
  </body>
    <?php
      include'../include/scripts.php';
    ?>
    <?php
echo <<<EOT
<script>function EventoAlert() 
  {
    swal({
      title: 'Sesion Iniciada',
      text: '$saludo',
      type: 'success',
      background: '#fff url(../../../assets/img/Huevo3.png)',
      confirmButtonColor: '#ff9800'
  })
  }window.onload = EventoAlert;</script>
EOT;
}
else
{
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../index.php?Acceso Denegado'</script>";
}  
?>
</html>