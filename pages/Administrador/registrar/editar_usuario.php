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
    <meta charset="UTF-8"/>
    <meta name="description" content="Sistema De Informacion Para Los Egresados del Sena "/>
    <meta name="keywords" content="HTML,CSS,JavaScript"/>
    <meta name="author" content="Alexis Espinosa Vidal"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="../../../../assets/img/SIE.png"/>
    <title>
      Actualizar Usuario
    </title>
    <?php  include'../include/links.php';  ?>
  </head>
  <body class="sidebar-mini fixed" style="">
  <header class="main-header hidden-print">
      <div class="logo" >
        <img class="logoimg" src="../../../assets/img/SIE.png" alt="user">
        <h1 class="logoa">Sistema de Informacion para Egresados</h1 > 
      </div >
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
        <!-- Navbar Right Menu-->
        <div class="navbar-custom-menu">
          <ul class="top-nav">
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
            <?php 
              echo "$usu";
            ?>
          </div>
        </div>
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu"> <!-- colorcar la clase "active" cuando sea necesario --> 
          <li class=""><a href="../Registrar/Index.php"><i class="fa fa-home"></i><span>Inicio</span></a></li>
          <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Registrar</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="egresados.php"><i class="fa fa-circle-o"></i>Egresado</a></li>
              <li><a href="Reg-Programa.php"><i class="fa fa-circle-o"></i>Programa de Formación</a></li>
              <li><a href="Reg-Ficha.php"><i class="fa fa-circle-o"></i>Ficha</a></li>
              <li><a href="Reg-Asignar_Programa-Ficha.php"><i class="fa fa-circle-o"></i>Asignacion Ficha a Programa</a></li>

              <li><a href="Reg-Universidad.php"><i class="fa fa-circle-o"></i>Universidades</a></li>
              <li><a href="Reg-Empresa.php"><i class="fa fa-circle-o"></i>Empresa</a></li>
              <li><a href="Reg-Situacion.php"><i class="fa fa-circle-o"></i>Situación</a></li>
              <li><a href="Reg-tipo_etapa.php"><i class="fa fa-circle-o"></i>Tipo Etapa Practica</a></li>
              <li><a href="Reg-Departamento.php"><i class="fa fa-circle-o"></i>Departamento</a></li>
              <li><a href="Reg-Municipio.php"><i class="fa fa-circle-o"></i>Municipio</a></li>
            </ul>
          </li>

          <li class="treeview"><a href="#"><i class="fa fa-table"></i><span>Consultar</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu"> 
              <li><a href="../consultar/Cons-Egresados.php"><i class="fa fa-circle-o"></i>Egresados</a></li> 
              <li><a href="../consultar/Cons-Programa.php"><i class="fa fa-circle-o"></i>Programas De Formación </a></li>
              <li><a href="../consultar/Cons-Asignacion_ficha.php"><i class="fa fa-circle-o"></i>Asignación Ficha a Programa</a></li>
              <li><a href="../consultar/Cons-Universidades.php"><i class="fa fa-circle-o"></i> Universidades</a></li>
              <li><a href="../consultar/Cons-Empresa.php"><i class="fa fa-circle-o"></i>Empresas</a></li>
            </ul>
          </li>


          <li class=""><a href="../graficas/graficas_egresados.php"><i class="fa fa-pie-chart"></i><span>Graficar</span></a></li>

          <li class="treeview"><a href="#"><i class="fa fa-cogs"></i><span>Configurar</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="../Copia_Seguridad/Copia_Seguridad.php"><i class="fa fa-circle-o"></i> Copia De Seguridad</a></li>
              <li><a href="usuarios.php"><i class="fa fa-circle-o"></i> Configurar Usuarios</a></li>
            </ul>
          </li>
          
          <li class=""><a href="../manual_usuario/Manual_De_Usuario_SIE.pdf"><i class="fa fa-book"></i><span>Manual De Usuario</span></a></li>
        </ul>
      </section>
    </aside>


    <div class="container">



	  <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="titulo-mayuscula">
            Actualizar Usuario
          </h1>
        </div>
        <div class="col-md-12 text-center">
          <hr/>
        </div>
      </div>

	 <form action="actualizar_usuario.php" id="formulario">
	   <div class="row">
<div class="col-xs-12 col-lg-7 col-lg-offset-4" data-form-type="formoid">
  		<div class="col-xs-12 col-md-7">
		  <div class="form-group">
  		    <label for="">Usuario </label>
  		    <input type="text" name="" id="usuario" class="form-control">
		  </div>
  		</div>


    	<div class="col-xs-12 col-md-7">
    	  <div class="form-group">

   			<label for="">Nombre Usuario </label>
  			<input type="text" name="" id="nombre_usuario" class="form-control">
		  </div>
  		</div>

		<div class="col-xs-12 col-md-7">
		  <div class="form-group">
  			<label for="">Contraseña  </label><b class="help-block">Si no escribe nada la contraseña no se actualizará</b>
  			<input type="text" name="" id="contraseña" class="form-control">
		  </div>
  		</div>

  		<div class="col-xs-12 col-md-7">
		  <div class="form-group">
      		<label for="">Rol </label>
    		<select name="rol" class="form-control" id="rol" onchange="validar_rol()">
      		  <option value="Selecciona">Selecciona</option>
      		  <option value="ADMINISTRADOR">Administrador</option>
      		  <option value="CENTRO">CENTRO</option>
    		</select>
  		  </div>
        </div>
	   </div>
	</div>
	 </form>
<!-- <div class="row">
  <br>
  <div class="col-md-12">
    <input type="button" value="Actualizar Usuario" onclick="actualizar_usuario()" class="btn ">
  </div>
</div> -->

<div class="row">
                <div class="col-xs-12 box">
                  <button class="button button--antiman button--inverted-alt Actualizar" type="button" value="Actualizar Usuario" onclick="actualizar_usuario()">
                    <i class="icon fa fa-refresh">
                    </i>
                    <span>
                      Actualizar
                    </span>
                  </button>
                </div>
              </div>


<div id="contenedor"></div>


  <?php 

$id_usuario=$_REQUEST["id_usuario"];


$query="SELECT `id_Usuario`, `rol`, `nombre_Usuario`, `usuario` FROM usuarios  WHERE id_Usuario='$id_usuario' ";

$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

echo "<script>
var id_usuario='$id_usuario';
var usuario=document.getElementById('usuario').value='$fila[3]';
var rol=document.getElementById('rol').value='$fila[1]';
var nombre_usuario=document.getElementById('nombre_usuario').value='$fila[2]';
</script>";

  ?>
            </div>

  





  <script src="../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../../assets/js/jquery-3.2.1.min.js"></script>    
    <script src="../../../assets/js/bootstrap.min.js"></script> 
 
            <script>
  
  $(document).ready(inicio);

  function inicio() {
$("#contraseña").keyup(validar_contraseña);
$("#usuario").keyup(validar_usuario);
$("#nombre_usuario").keyup(validar_nombre_usuario);
  }

    function validar_nombre_usuario() {
   
         var nombre_usuario=document.getElementById('nombre_usuario').value;
      if(nombre_usuario==null  || nombre_usuario.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(nombre_usuario)){
  var nombre_usuario=document.getElementById('nombre_usuario').style.border="2px solid red"
        return false;

      }else if (nombre_usuario.length>50) {
var nombre_usuario=document.getElementById('nombre_usuario').style.border="2px solid red"
        return false;

      } else{
var nombre_usuario=document.getElementById('nombre_usuario').style.border="2px solid #4caf50"

      return true;
      } 

  }
  function actualizar_usuario() {

    if (validar_usuario()==true && validar_nombre_usuario()==true && validar_contraseña()==true && validar_rol()==true) {

 var usuario=document.getElementById('usuario').value;
var rol=document.getElementById("rol").value;
var nombre_usuario=document.getElementById('nombre_usuario').value;
var contraseña=document.getElementById('contraseña').value;
$("#contenedor").load("actualizar_usuario.php",{usuario:usuario,rol:rol,id_usuario:id_usuario,actualizar_contraseña:actualizar_contraseña,nombre_usuario:nombre_usuario,contraseña:contraseña});

    }
  }


  function validar_usuario() {
   
         var usuario=document.getElementById('usuario').value;
      if(usuario==null  || usuario.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(usuario)){
  var usuario=document.getElementById('usuario').style.border="2px solid red"
        return false;

      }else if (usuario.length>50) {
var usuario=document.getElementById('usuario').style.border="2px solid red"
        return false;

      } else{
var usuario=document.getElementById('usuario').style.border="2px solid #4caf50"

      return true;
      } 

  }


  function validar_rol() {
      var rol=document.getElementById("rol").value;
  if (rol=="Selecciona") {

var rol=document.getElementById('rol').style.border="2px solid red";
return false

  }else{
var rol=document.getElementById('rol').style.border="2px solid #4caf50";
return true
  }
  }


function validar_contraseña() {
   var contraseña=document.getElementById('contraseña').value;
      if(contraseña==null  || contraseña.length==0){
var contraseña=document.getElementById('contraseña').style.border="2px solid #4caf50";
actualizar_contraseña=false;

        return true;

      }else if (contraseña.length>50) {
var contraseña=document.getElementById('contraseña').style.border="2px solid red";
        return false;

      } else{
var contraseña=document.getElementById('contraseña').style.border="2px solid #4caf50";
actualizar_contraseña=true;

      return true;
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


