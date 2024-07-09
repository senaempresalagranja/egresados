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
  <title>Actualizar</title>
  <?php 
      include'../include/links.php'; 
    ?>
</head>
  <body class="sidebar-mini fixed" style="" >
    <!-- menu de navegacion de todo el sistema  -->
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
        <h1 class="titulo-mayuscula">Actualizar Universidad</h1>
    </div>
    <div class="col-md-12 text-center">       
      <hr>
    </div>  
  </div>
  <div class="row">
    <div class="col-xs-12 col-lg-7 col-lg-offset-4" data-form-type="formoid">


      <div class="col-xs-12 col-md-7">
        <div class="form-group">

          <label class="form-control-label" for="">Nombre Universidad</label>
          <input type="text" name="" id="nombre_universidad" class="form-control"  >  

        </div>            
      </div>   

      <div class="col-xs-12 col-md-7">
        <div class="form-group">
          <label for="Id_Departamento_universidad">Seleccione Departamento</label> 
          <select name="" id="Id_Departamento_universidad" onclick="validar_departamento_universidad()" class="form-control">
            <option value="Seleccione">Seleccione</option>
              <?php 
                $query="SELECT * FROM `departamentos`";
                $resource=mysqli_query($conexion,$query);
                while ($fila=mysqli_fetch_row($resource)) {
                  ?>
                <option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

              <?php 
            }

                ?>
          </select>
        </div>
      </div>

      <div class="col-xs-12 col-md-7">
        <div class="form-group">
          <label for="Id_Municipio_universidad">Seleccione Municipio</label>
          <select name="" id="Id_Municipio_universidad" onchange="validar_Id_Municipio_universidad()" class="form-control">
            <option value="Seleccione">Seleccione</option>
              <?php 
                $query="SELECT * FROM `municipios`";
                $resource=mysqli_query($conexion,$query);
                while ($fila=mysqli_fetch_row($resource)) {
                  ?>
                <option value="<?php echo $fila[0] ?>"><?php echo $fila[2] ?></option>

                  <?php 
                }

                    ?>
          </select>  
        </div>
      </div>    
    </div>

    <div class="row">
                      
                      <div class="col-md-12 box">
                        <!-- <input type="button" value="ACTUALIZAR" class="btn btn-danger" onclick="ACTUALIZAR()"> -->



                        <button class="button button--antiman button--inverted-alt Actualizar" type="button" value="Acceder" onclick="ACTUALIZAR()"><i class="icon fa fa-refresh"></i><span>Actualizar</span></button>


                      </div>
                    </div>                    

<div id="contenedor">
  
</div>

<?php 
$Id_universidad=$_POST["Id_universidad"];
$query="SELECT `Id_universidad`, `Nombre_universidad`, departamentos.id_Departamento, municipios.id_Municipio FROM `universidades` INNER JOIN municipios ON universidades.id_Municipio=municipios.id_Municipio INNER JOIN departamentos ON municipios.id_Departamento=departamentos.id_Departamento WHERE `Id_universidad`=$Id_universidad";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);


echo "<script>
var Id_universidad=$fila[0];
var nombre_universidad=document.getElementById('nombre_universidad').value='$fila[1]';
var Id_Departamento_universidad=document.getElementById('Id_Departamento_universidad').value='$fila[2]';
var Id_Municipio_universidad=document.getElementById('Id_Municipio_universidad').value='$fila[3]';
</script>";

 ?>




  </body>
  <?php
      include'../include/scripts.php';
    ?>

      <script>
$(document).ready(inicio);

function inicio() {
$("#nombre_universidad").keyup(validar_nombre_universidad);
}


function validar_nombre_universidad() {
  
var nombre_universidad=document.getElementById("nombre_universidad").value;

      nombre_universidad=nombre_universidad.toUpperCase();
      if(nombre_universidad==null  || nombre_universidad.length==0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nombre_universidad)){
  var nombre_universidad=document.getElementById('nombre_universidad').style.border="2px solid red"
        return false;

      }else if (isNaN(nombre_universidad)==false) {
var nombre_universidad=document.getElementById('nombre_universidad').style.border="2px solid red"
        return false;

      }else if (nombre_universidad.length>50) {
var nombre_universidad=document.getElementById('nombre_universidad').style.border="2px solid red";
        return false;

      }else{
var nombre_universidad=document.getElementById('nombre_universidad').style.border="2px solid #4caf50";

      return true;
      }
}



function ACTUALIZAR() {
  if (validar_nombre_universidad()==true && validar_Id_Municipio_universidad()==true) {
var Id_Municipio_universidad=document.getElementById("Id_Municipio_universidad").value;
var nombre_universidad=document.getElementById("nombre_universidad").value;
$("#contenedor").load("actualizar_universidad.php",{nombre_universidad:nombre_universidad,Id_Municipio_universidad:Id_Municipio_universidad,Id_universidad:Id_universidad})
    
  }else{

    swal('LLene los campos correctamente','','error')
  }
}

function validar_Id_Municipio_universidad() {
  
  var Id_Municipio_universidad=document.getElementById('Id_Municipio_universidad').value;

    if (Id_Municipio_universidad=="Seleccione") {
var Id_Municipio_universidad=document.getElementById("Id_Municipio_universidad").style.border="2px solid red";
return false;

    }else{

      var Id_Municipio_universidad=document.getElementById("Id_Municipio_universidad").style.border="2px solid #4caf50";
      return true;
    }
}

function validar_departamento_universidad() {
  var Id_Departamento_universidad=document.getElementById("Id_Departamento_universidad").value;

if (Id_Departamento_universidad=="Seleccione") {

var Id_Departamento_universidad=document.getElementById("Id_Departamento_universidad").style.border="2px solid red";
return false;

}else{
Id_Departamento_universidad=document.getElementById("Id_Departamento_universidad").style.border="2px solid #4caf50";
var Id_Departamento_universidad=document.getElementById("Id_Departamento_universidad").value;
$("#Id_Municipio_universidad").load("mostrar_municipio__universidad.php",{Id_Departamento_universidad:Id_Departamento_universidad});
return true;

} 

}

</script>  



  <?php

}
else
{
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../index.php?Acceso Denegado'</script>";
}  
?>
</html>


