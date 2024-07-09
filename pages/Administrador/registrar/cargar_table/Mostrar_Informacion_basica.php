<?php
session_start();
if (isset($_SESSION['ADMINISTRADOR']))
{ 
  include '../../include/conexion.php';
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
      SIE Sistema De Informacion Para Egresados
    </title>
    <link rel="shortcut icon" href="../../../../assets/img/SIE.png">
  <link rel="stylesheet" href="../../../../assets/css/components.css">
  </head>
  <body class="sidebar-mini fixed" style="">
        <header class="main-header hidden-print">
      <div class="logo" >
        <img class="logoimg" src="../../../../assets/img/SIE.png" alt="user">
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
          <div class="pull-left image"><img class="img-circle" src="../../../../assets/img/user.png" alt="User Image"></div>
          <div class="pull-left info">
            <?php 
              echo "$usu";
            ?>
          </div>
        </div>
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu"> <!-- colorcar la clase "active" cuando sea necesario --> 
          <li class="active"><a href="../index.php"><i class="fa fa-home"></i><span>Inicio</span></a></li>
          <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Registrar</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="../Registrar/egresados.php"><i class="fa fa-circle-o"></i>Egresado</a></li>
              <li><a href="../Registrar/Reg-Programa.php"><i class="fa fa-circle-o"></i>Programa de Formación</a></li>
              <li><a href="../Registrar/Reg-Ficha.php"><i class="fa fa-circle-o"></i>Ficha</a></li>
              <li><a href="../Registrar/Reg-Asignar_Programa-Ficha.php"><i class="fa fa-circle-o"></i>Asignacion Programa a Ficha</a></li>

              <li><a href="../Registrar/Reg-Universidad.php"><i class="fa fa-circle-o"></i>Universidades</a></li>
              <li><a href="../Registrar/Reg-Empresa.php"><i class="fa fa-circle-o"></i>Empresa</a></li>
              <li><a href="../Registrar/Reg-Situacion.php"><i class="fa fa-circle-o"></i>Situación</a></li>
              <li><a href="../Registrar/Reg-Departamento.php"><i class="fa fa-circle-o"></i>Departamento</a></li>
              <li><a href="../Registrar/Reg-Municipio.php"><i class="fa fa-circle-o"></i>Municipio</a></li>
            </ul>
          </li>

          <li class="treeview"><a href="#"><i class="fa fa-table"></i><span>Consultar</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu"> 
              <li><a href="../consultar/Cons-Programa.php"><i class="fa fa-circle-o"></i>Programas De Formación </a></li>
              <li><a href="../consultar/Cons-Asignacion_ficha.php"><i class="fa fa-circle-o"></i>Asignación Programa a Ficha</a></li>
              <li><a href="../Consultar/Cons-Universidades.php"><i class="fa fa-circle-o"></i> Universidades</a></li>
              <li><a href="../consultar/Cons-Empresa.php"><i class="fa fa-circle-o"></i>Empresas</a></li>
            </ul>
          </li>


          <li class=""><a href="../graficas/graficas_egresados.php"><i class="fa fa-pie-chart"></i><span>Graficar</span></a></li>

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
        
            <h1 class="text-center">EGRESADOS <?php echo "$nomusua_usua"; ?></h1>

            <div class="col-md-12 text-center">
              <h3 class="help-block">Bienvenido</h3>
              <hr>
            </div> 

           <!--  <div class="col-xs-12 box" ><a class="button button--antiman button--inverted-alt Preterminado" href="egresados.php"> <i class="icon fa fa-edit"></i><span>Registrar Egresado</span></a></div> 

            <div class="col-md-4 col-xs-12 col-md-offset-4">
              <div class="form-group">
                <label for="nombre_documento">Nombre o N° Documento  </label>
                <input type="text" class="form-control" id="nombre_documento">
              </div>
            </div>   -->
            <?php 

include '../../../../assets/conexion/conexion.php';

$id=$_REQUEST['id']; 




$query="SELECT egresados.id_Egresado,`Tipo_Documento`, `Numero_Documento`, `Nombre_Aprendiz`, `Apellidos_Aprendiz`, `Correo_Electronico`, `Telefono_Fijo`, `Telefono_Alterno`, `Telefono_Celular`, `Facebook`, `Sexo`, `Fecha_Nacimiento`,  municipios.nombre_Municipio, departamentos.nombre_Departamento,  contactacion.contactado, `id_Usuario` FROM `egresados`

INNER JOIN municipios ON egresados.id_Egresado=municipios.id_Municipio

INNER JOIN departamentos ON municipios.id_Municipio=departamentos.id_Departamento

INNER JOIN contactacion ON egresados.id_Egresado=contactacion.id_contactado
 WHERE egresados.id_Egresado=$id
 ";




  
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
  

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <section class="invoice">
                <div class="row">
                  <div class="col-xs-12">
                    <h2 class="page-header"><i class="fa fa-globe"></i> Información De Egresado</h2>
                  </div>
                </div>
                <div class="row invoice-info">

                  <div class="col-xs-4">
                    <b>Nombre:</b> <?php echo $fila[3] ?>
                    <br>
                    <b>Apellido:</b> <?php echo $fila[4] ?>
                    <br>
                    <b>N°Documento:</b> <?php echo $fila[1] ?>. <?php echo $fila[2] ?>
                    <br>
                    <b>Fecha De Nacimiento:</b> <?php echo $fila[11] ?>
                    <br>
                    <b>Sexo:</b> <?php echo $fila[10] ?>
                  </div>

          <div class="col-xs-4">
                    <b>Departamento:</b> <?php echo $fila[13] ?>
                    <br><b>Municipio:</b> <?php echo $fila[12] ?>
               
                  </div>

                  <div class="col-xs-4">
                    <b>Correo Electrónico:</b> <?php echo $fila[5] ?>
                    <br><b>Teléfono Fijo:</b> <?php echo $fila[6] ?>
                    <br><b>Teléfono Alterno:</b> <?php echo $fila[7] ?>
                    <br><b>Teléfono Celular:</b> <?php echo $fila[8] ?>
                    <br><b>Facebook:</b> <?php echo $fila[9] ?>
                  <br>
                  <br><b>Contactado:</b> <?php echo $fila[14] ?>
                  </div>
                  
                </div>
                

              </section>
            </div>
          </div>
        </div> 
        



  <?php 
}
   ?>

                    


              

                
          </div>
          
          



          

        
          
       
  </body>
  <script src="../../../../assets/js/jquery-3.2.1.min.js"></script>

<script src="../../../../assets/js/essential-plugins.js"></script>   

<script src="../../../../assets/js/bootstrap.min.js"></script> 

<script src="../../../../assets/js/main.js"></script>

<script src="../../../../assets/js/bootstrap-datepicker.js"></script> 

<script src="../../../../assets/js/bootstrap-datepicker.es.min.js"></script> 

<script src="../../../../assets/js/sweetalert2.min.js"></script>

<script type="text/javascript">$('body').removeClass("sidebar-mini").addClass("sidebar-collapse");</script>
 
  <?php

}
else
{
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../../index.php?Acceso Denegado'</script>";
}  
?>
</html>


