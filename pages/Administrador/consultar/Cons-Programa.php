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
  <title>Consultar Programa</title>
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
              <li><a href="../Registrar/egresados.php"><i class="fa fa-circle-o"></i>Egresado</a></li>
              <li><a href="../Registrar/Reg-Programa.php"><i class="fa fa-circle-o"></i>Programa de Formación</a></li>
              <li><a href="../Registrar/Reg-Ficha.php"><i class="fa fa-circle-o"></i>Ficha</a></li>
              <li><a href="../Registrar/Reg-Asignar_Programa-Ficha.php"><i class="fa fa-circle-o"></i>Asignacion Ficha a Programa</a></li>

              <li><a href="../Registrar/Reg-Universidad.php"><i class="fa fa-circle-o"></i>Universidades</a></li>
              <li><a href="../Registrar/Reg-Empresa.php"><i class="fa fa-circle-o"></i>Empresa</a></li>
              <li><a href="../Registrar/Reg-Situacion.php"><i class="fa fa-circle-o"></i>Situación</a></li>
              <li><a href="../Registrar/Reg-tipo_etapa.php"><i class="fa fa-circle-o"></i>Tipo Etapa Practica</a></li>
              <li><a href="../Registrar/Reg-Departamento.php"><i class="fa fa-circle-o"></i>Departamento</a></li>
              <li><a href="../Registrar/Reg-Municipio.php"><i class="fa fa-circle-o"></i>Municipio</a></li>
            </ul>
          </li>

          <li class="treeview"><a href="#"><i class="fa fa-table"></i><span>Consultar</span><i class="fa fa-angle-right"></i></a>
            <ul class="treeview-menu"> 
              <li><a href="Cons-Egresados.php"><i class="fa fa-circle-o"></i>Egresados</a></li> 
              <li><a class="click-pointer"><i class="active-icon fa fa-circle-o"></i>Programas De Formación </a></li>
              <li><a href="Cons-Asignacion_ficha.php"><i class="fa fa-circle-o"></i>Asignación Ficha a Programa</a></li>
              <li><a href="Cons-Universidades.php"><i class="fa fa-circle-o"></i> Universidades</a></li>
              <li><a href="Cons-Empresa.php"><i class="fa fa-circle-o"></i>Empresas</a></li>
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
        <h1 class="titulo-mayuscula">Consultar Programa Formacion</h1>
      </div>
      <div class="col-md-12 text-center">
            <!-- <h3 class="help-block">DATOS BASICOS EGRESADO</h3> -->
            <hr></div>  
    </div>
      <form action="" id="formulario" method="POST" autocomplete="off">
        <div class="col-xs-12 col-md-8 col-lg-offset-2">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="form-control-label" for="">Programa</label>
              <input type="text" class="form-control" name="nombre_Programa" id="nombre_Programa">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label class="form-control-label" for="">Tipo De Prgrama</label>
              <input type="text" class="form-control" name="id_Tipo_Programa" id="id_Tipo_Programa">
            </div>  
          </div>
      
          <div class="col-md-4">
            <div class="form-group">
              <label class="form-control-label" for="">Duracion</label>
              <input type="number" class="form-control" name="duracion" id="duracion">
            </div>
          </div>
        </div>
  </div>
        <div class="row">

          
          <div class="col-xs-12 box">
            <button class="button button--antiman button--inverted-alt PDF" type="button" value="Exportar pdf" onclick="exportar_pdf()"><i class="icon fa fa-file-pdf-o"></i><span>PDF</span></button>

            <button class="button button--antiman button--inverted-alt Excel" type="button" value="Exportar excel" onclick="exportar_excel()"><i class="icon fa fa-file-excel-o"></i><span>Excel</span></button>

          </div>
        </div>  

        <div class="row">
          <div class="col-xs-12 col-md-8 col-lg-offset-2">
            <div class="panel panel-default">
              <table class="table table-fixed">
                <thead>
                  <tr>
                    <th class="col-xs-5">
                      Programa de formacion
                    </th>
                    <th class="col-xs-5">
                      Tipo De Programa
                    </th>
                    <th class="col-xs-2">
                      Duracion
                    </th>
                    
                  </tr>
                </thead>
                <tbody id="contenedor_Programas">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </form>
      
    </div>


  </body>
  <?php
      include'../include/scripts.php';
    ?>
<script>
function exportar_pdf() {
    if (enviar() == true) {
        var formulario = document.getElementById('formulario').action = '../exportar/exportar_Pdf/Expor_PDF-Programas.php';
        var formulario = document.getElementById('formulario').submit();
    } else {
        swal({
            title: 'Error!',
            text: "Ingrese Un Criterio De Busqueda",
            type: 'error',
            // background: '#fff url(../../../assets/img/Huevo3.png)',
            confirmButtonColor: '#238276'
        })
    }
}

function exportar_excel() {
    if (enviar() == true) {
        var formulario = document.getElementById('formulario').action = '../exportar/exportar_excel/Export_Excel-Programas.php';
        var formulario = document.getElementById('formulario').submit();
    } else {
        swal({
            title: 'Error!',
            text: "Ingrese Un Criterio De Busqueda",
            type: 'error',
            // background: '#fff url(../../../assets/img/Huevo3.png)',
            confirmButtonColor: '#238276'
        })
    }
}
$(document).ready(inicio);

function inicio() {
    $("#nombre_Programa").keyup(enviar);
    $("#id_Tipo_Programa").keyup(enviar);
    $("#duracion").keyup(enviar);
}

function validar_nombre_Programa() {
    var nombre_Programa = document.getElementById('nombre_Programa').value;
    nombre_Programa = nombre_Programa.toUpperCase();
    if (nombre_Programa == null || nombre_Programa.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nombre_Programa)) {
        var nombre_Programa = document.getElementById('nombre_Programa').style.border = "2px solid red"
        return false;
    } else if (nombre_Programa.length > 50) {
        var nombre_Programa = document.getElementById('nombre_Programa').style.border = "2px solid red";
        return false;
    } else {
        var nombre_Programa = document.getElementById('nombre_Programa').style.border = "2px solid #4caf50";
        var nombre_Programa = document.getElementById('nombre_Programa').value;
        return true;
    }
}

function validar_id_Tipo_Programa() {
    var id_Tipo_Programa = document.getElementById('id_Tipo_Programa').value;
    id_Tipo_Programa = id_Tipo_Programa.toUpperCase();
    if (id_Tipo_Programa == null || id_Tipo_Programa.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(id_Tipo_Programa)) {
        var id_Tipo_Programa = document.getElementById('id_Tipo_Programa').style.border = "2px solid red"
        return false;
    } else if (id_Tipo_Programa.length > 50) {
        var id_Tipo_Programa = document.getElementById('id_Tipo_Programa').style.border = "2px solid red";
        return false;
    } else {
        var id_Tipo_Programa = document.getElementById('id_Tipo_Programa').style.border = "2px solid #4caf50";
        var id_Tipo_Programa = document.getElementById('id_Tipo_Programa').value;
        return true;
    }
}


function validar_duracion() {
    var duracion = document.getElementById('duracion').value;
    duracion = duracion.toUpperCase();
    if (duracion == null || duracion.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(duracion)) {
        var duracion = document.getElementById('duracion').style.border = "2px solid red"
        return false;
    } else if (duracion.length > 50) {
        var duracion = document.getElementById('duracion').style.border = "2px solid red";
        return false;
    } else {
        var duracion = document.getElementById('duracion').style.border = "2px solid #4caf50";
        var duracion = document.getElementById('duracion').value;
        return true;
    }
}

function enviar() {
    if (validar_nombre_Programa() == true || validar_id_Tipo_Programa() == true || validar_duracion() == true) {
        var nombre_Programa = document.getElementById('nombre_Programa').value;
        var id_Tipo_Programa = document.getElementById('id_Tipo_Programa').value;
        var duracion = document.getElementById('duracion').value;
        $("#contenedor_Programas").load("Most-Programa.php", {
            nombre_Programa: nombre_Programa,
            id_Tipo_Programa: id_Tipo_Programa,
            duracion: duracion
        });
        return true;
    } else {
        return false;
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


