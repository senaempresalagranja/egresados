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
    <title>
      Actualizar Tipo etapa Practica
    </title>
    <?php  include'../include/links.php';  ?>
  </head>
  <body class="sidebar-mini fixed">
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
              <li><a href="../Registrar/usuarios.php"><i class="fa fa-circle-o"></i> Configurar Usuarios</a></li>
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
        Actualizar Tipo Etapa Practica
      </h1>
    </div>
    <div class="col-md-12 text-center">
      <hr/>
    </div>
  </div>


<div class="row">

  <div class="col-xs-12 col-lg-4 col-lg-offset-4">
    <div class="form-group">

    
    <label for="" class="form-control-label">Nombre Etapa</label>
    <input type="text" name="" id="nombre_etapa" class="form-control">
  </div>  
<?php 
$id_Egresado=$_POST["id_Egresado"];
echo "<script>

var id_Egresado='$id_Egresado';
</script>";
$query="SELECT `Nombre_Etapa` FROM `tipo_etapa_practica` WHERE `Id_Tipo_Etapa_Practica`=$id_Egresado";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

echo "<script>

var nombre_etapa=document.getElementById('nombre_etapa').value='$fila[0]';
</script>";
 ?>
  </div>    

</div>    
<!-- <div class="row">
                      <div class="col-md-12 text-rigth">
                        <input type="button" value="Actualizar" onclick="actualizar()">
                      </div>
                    </div>  
 -->
                    <div class="row">
          <div class="col-xs-12  box" >


            <button class="button button--antiman button--inverted-alt Actualizar" type="button" value="Actualizar" onclick="actualizar()" ><i class="icon fa fa-refresh"></i><span>Actualizar</span></button>
          </div>
        </div>                  

</div>
<div id="contenedor">
  
</div>


  <?php
      include'../include/scripts.php';
    ?>
    <script>
$(document).ready(inicio);

function inicio() {
$("#nombre_etapa").keyup(validar_nombre_etapa);
}


function validar_nombre_etapa() {
  
var nombre_etapa=document.getElementById("nombre_etapa").value;

      nombre_etapa=nombre_etapa.toUpperCase();
      if(nombre_etapa==null  || nombre_etapa.length==0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nombre_etapa)){
  var nombre_etapa=document.getElementById('nombre_etapa').style.border="2px solid red"
        return false;

      }else if (isNaN(nombre_etapa)==false) {
var nombre_etapa=document.getElementById('nombre_etapa').style.border="2px solid red"
        return false;

      }else if (nombre_etapa.length>50) {
var nombre_etapa=document.getElementById('nombre_etapa').style.border="2px solid red";
        return false;

      }else{
var nombre_etapa=document.getElementById('nombre_etapa').style.border="2px solid #4caf50";

      return true;
      }
}



function actualizar() {
  if (validar_nombre_etapa()==true) {

var nombre_etapa=document.getElementById("nombre_etapa").value;
$("#contenedor").load("actualizar/conex_Actu-Etapa_Practica.php",{nombre_etapa:nombre_etapa,id_Egresado:id_Egresado})
    
  }else{

    swal('LLene los campos correctamente','','error')
  }
}

</script>
  </body>
  
  <?php

}
else
{
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../index.php?Acceso Denegado'</script>";
}  
?>
</html>


