
<!DOCTYPE html>
<html lang="es">
<head>
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
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../../../assets/css/components.css">
</head>
  <body class="sidebar-mini fixed">
    <!-- menu de navegacion de todo el sistema  -->
    <header class="main-header">
        <!-- <a class="logo" href="index.html">Egresados la granja</a> -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">              
              <!-- User Menu-->

              <li><a href="../include/cerrar.php"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>

            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="../../../assets/img/user.png" alt="User Image"></div>
            <div class="pull-left info">
              <!-- <p>Alexi Espinosa vidal</p>
              <p class="designation">Analista y desarrollador <br> software</p> -->
              <?php 
                echo "$usu";
               ?>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu"> <!-- colorcar la clase "active" cuando sea necesario --> 
            <li class=""><a href="../Inicio/Index.php"><i class="fa fa-home"></i><span>Inicio</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Registrar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Registrar Egresados</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Registrar Fichas</a></li>
              </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-table"></i><span>Consultar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Consultar Egresados</a></li>
              </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-pie-chart"></i><span>Graficar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Graficar </a></li>
              </ul>
            </li>

            <li class="treeview"><a href="#"><i class="fa fa-file-text"></i><span>Configurar</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Copia De Seguridad</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Configurar Usuarios</a></li>
              </ul>
            </li>
          </ul>
        </section>
      </aside>


  



           <div class="container">



<div class="row">
  <div class="col-md-12 text-center">
    <h1>Crear Usuario</h1>
  </div>
</div>
<form action="actualizar_usuario.php" id="formulario">
<div class="row ">

  <div class="col-md-7">
  <h3>Usuario</h3>
  <input type="text" name="" id="usuario"  class="form-control">
  </div>
    <div class="col-md-7">
  <h3>Nombre Usuario</h3>
  <input type="text" name="" id="nombre_usuario"  class="form-control">
  </div>
  <div class="col-md-7">
      <h3>Rol</h3>
    <select name="rol" class="form-control" id="rol" onclick="validar_rol()">
      <option value="Selecciona">Selecciona</option>
      <option   value="ADMINISTRADOR">ADMINISTRADOR</option>
      <option value="CENTRO">CENTRO</option>
 
    </select>
  </div>
 <div class="col-md-7">
 <h3>Contraseña</h3>
 <input type="password" class="form-control" name="" id="contraseña">
 </div>

  <div class="col-md-7">
 <h3>Repita Contraseña</h3>
 <input type="password" class="form-control" name="" id="contraseña_repita">
 </div> 
</div>

</form>
<div class="row">
  <br>
  <div class="col-md-12">
    <input type="button" value="Crear Usuario" onclick="crear_usuario()" class="btn ">
  </div>
</div>

<div id="contenedor"></div>

        <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
            </div>

  <script src="../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../../assets/js/jquery-3.2.1.min.js"></script>    
    <script src="../../../assets/js/bootstrap.min.js"></script> 
            <script>
  
  $(document).ready(inicio);

  function inicio() {

$("#usuario").keyup(validar_usuario);
$("#contraseña").keyup(validar_contraseña);
$("#contraseña_repita").keyup(validar_contraseña_repita);
$("#nombre_usuario").keyup(validar_nombre_usuario);
  }

function validar_contraseña() {
   var contraseña=document.getElementById('contraseña').value;
      if(contraseña==null  || contraseña.length==0){
  var contraseña=document.getElementById('contraseña').style.border="1px solid red"
        return false;

      }else if (contraseña.length>50) {
var contraseña=document.getElementById('contraseña').style.border="1px solid red"
        return false;

      } else{
var contraseña=document.getElementById('contraseña').style.border="1px solid green"

      return true;
      } 

}

function validar_contraseña_repita() {
   var contraseña_repita=document.getElementById('contraseña_repita').value;
      if(contraseña_repita==null  || contraseña_repita.length==0){
  var contraseña_repita=document.getElementById('contraseña_repita').style.border="1px solid red"
        return false;

      }else if (contraseña_repita.length>50) {
var contraseña_repita=document.getElementById('contraseña_repita').style.border="1px solid red"
        return false;

      } else{
var contraseña_repita=document.getElementById('contraseña_repita').style.border="1px solid green"

      return true;
      } 

}

  function crear_usuario() {
    if (validar_usuario()==true && validar_nombre_usuario()==true && validar_rol()==true && validar_contraseña()==true && validar_contraseña_repita()==true) {

var nombre_usuario=document.getElementById("nombre_usuario").value;
   var contraseña_repita=document.getElementById('contraseña_repita').value;
      var contraseña=document.getElementById('contraseña').value;


      if (contraseña==contraseña_repita) {
 var usuario=document.getElementById('usuario').value;
var rol=document.getElementById("rol").value;


$("#contenedor").load("crear.php",{usuario:usuario,rol:rol,contraseña:contraseña,nombre_usuario:nombre_usuario});

}else{
swal("Advertencia","Contraseñas Diferentes","error")
   var contraseña_repita=document.getElementById('contraseña_repita').value="";
      var contraseña=document.getElementById('contraseña').value="";

      var contraseña_repita=document.getElementById('contraseña_repita').style.border="1px solid red";
      var contraseña=document.getElementById('contraseña').style.border="1px solid red";
}

    }
  }


  function validar_usuario() {
   
         var usuario=document.getElementById('usuario').value;
      if(usuario==null  || usuario.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(usuario)){
  var usuario=document.getElementById('usuario').style.border="1px solid red"
        return false;

      }else if (usuario.length>50) {
var usuario=document.getElementById('usuario').style.border="1px solid red"
        return false;

      } else{
var usuario=document.getElementById('usuario').style.border="1px solid green"

      return true;
      } 

  }

    function validar_nombre_usuario() {
   
         var nombre_usuario=document.getElementById('nombre_usuario').value;
      if(nombre_usuario==null  || nombre_usuario.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(nombre_usuario)){
  var nombre_usuario=document.getElementById('nombre_usuario').style.border="1px solid red"
        return false;

      }else if (nombre_usuario.length>50) {
var nombre_usuario=document.getElementById('nombre_usuario').style.border="1px solid red"
        return false;

      } else{
var nombre_usuario=document.getElementById('nombre_usuario').style.border="1px solid green"

      return true;
      } 

  }


  function validar_rol() {
      var rol=document.getElementById("rol").value;
  if (rol=="Selecciona") {

var rol=document.getElementById('rol').style.border="1px solid red";
return false

  }else{
var rol=document.getElementById('rol').style.border="1px solid green";
return true
  }
  }



</script>

  </body>
  <?php
      include'../include/scripts.php';
    ?>
  <?php

}
else
{
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../index.php?Acceso Denegado'</script>";
}  
?>
</html>


