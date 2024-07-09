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
  <title>Consultar Empresa</title>
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
              <li><a href="Cons-Programa.php"><i class="fa fa-circle-o"></i>Programas De Formación </a></li>
              <li><a href="Cons-Asignacion_ficha.php"><i class="fa fa-circle-o"></i>Asignación Ficha a Programa</a></li>
              <li><a href="Cons-Universidades.php"><i class="fa fa-circle-o"></i> Universidades</a></li>
              <li><a class="click-pointer"><i class="active-icon fa fa-circle-o"></i>Empresas</a></li>
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
        <h1 class="titulo-mayuscula">Consultar Empresa</h1>
      </div>
      <div class="col-md-12 text-center">
            <!-- <h3 class="help-block">DATOS BASICOS EGRESADO</h3> -->
            <hr></div>  
    </div> 
      <form action="" id="formulario" method="POST" autocomplete="off">
  
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="">Nombre Empresa</label>
              <input type="text" class="form-control" name="Nombre_Empresa" id="Nombre_Empresa">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="">Nit Empresa</label>
              <input type="number" class="form-control" name="Nit_Empresa" id="Nit_Empresa">
            </div>  
          </div>
      
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="">Departamento</label>
              <input type="text" class="form-control" name="nombre_Departamento" id="nombre_Departamento">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="">Municipio</label>
              <input type="text" class="form-control" name="municipio" id="municipio">
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
          <div class="col-xs-12 col-md-8 col-lg-offset-2 ">
            <div class="panel panel-default">
              <table class="table table-fixed">
                <thead>
                  <tr>
                    <th class="col-xs-4">
                    Empresa
                    </th>
                    <th class="col-xs-2">
                    Nit
                    </th>
                    <th class="col-xs-3">
                    Departamento
                    </th>
                    <th class="col-xs-3">
                    Municipio
                    </th>

                  </tr>
                </thead>
                <tbody id="contenedor_Empresas">
                </tbody>
              </table>
            </div>  
          </div>
        </div>
      </form>
     <!--  <div id="contenedor_Empresas" class="col-xs-12 " style="height: 60%;    overflow-y: auto;"></div> -->
    </div>


  </body>
  <?php
      include'../include/scripts.php';
    ?>
<script>
function exportar_pdf() {
    if (enviar() == true) {
        var formulario = document.getElementById('formulario').action = '../exportar/exportar_Pdf/Expor_PDF-Empresas.php';
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
        var formulario = document.getElementById('formulario').action = '../exportar/exportar_excel/Export_Excel-Empresas.php';
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
    $("#Nombre_Empresa").keyup(enviar);
    $("#Nit_Empresa").keyup(enviar);
    $("#municipio").keyup(enviar);
    $("#nombre_Departamento").keyup(enviar);
}

function validar_Nombre_Empresa() {
    var Nombre_Empresa = document.getElementById('Nombre_Empresa').value;
    Nombre_Empresa = Nombre_Empresa.toUpperCase();
    if (Nombre_Empresa == null || Nombre_Empresa.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Nombre_Empresa)) {
        var Nombre_Empresa = document.getElementById('Nombre_Empresa').style.border = "2px solid red"
        return false;
    } else if (Nombre_Empresa.length > 50) {
        var Nombre_Empresa = document.getElementById('Nombre_Empresa').style.border = "2px solid red";
        return false;
    } else {
        var Nombre_Empresa = document.getElementById('Nombre_Empresa').style.border = "2px solid #4caf50";
        var Nombre_Empresa = document.getElementById('Nombre_Empresa').value;
        return true;
    }
}

function validar_Nit_Empresa() {
    var Nit_Empresa = document.getElementById('Nit_Empresa').value;
    Nit_Empresa = Nit_Empresa.toUpperCase();
    if (Nit_Empresa == null || Nit_Empresa.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Nit_Empresa)) {
        var Nit_Empresa = document.getElementById('Nit_Empresa').style.border = "2px solid red"
        return false;
    } else if (Nit_Empresa.length > 50) {
        var Nit_Empresa = document.getElementById('Nit_Empresa').style.border = "2px solid red";
        return false;
    } else {
        var Nit_Empresa = document.getElementById('Nit_Empresa').style.border = "2px solid #4caf50";
        var Nit_Empresa = document.getElementById('Nit_Empresa').value;
        return true;
    }
}

function validar_municipio() {
    var municipio = document.getElementById('municipio').value;
    municipio = municipio.toUpperCase();
    if (municipio == null || municipio.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(municipio)) {
        var municipio = document.getElementById('municipio').style.border = "2px solid red"
        return false;
    } else if (municipio.length > 50) {
        var municipio = document.getElementById('municipio').style.border = "2px solid red";
        return false;
    } else {
        var municipio = document.getElementById('municipio').style.border = "2px solid #4caf50";
        var municipio = document.getElementById('municipio').value;
        return true;
    }
}

function validar_nombre_Departamento() {
    var nombre_Departamento = document.getElementById('nombre_Departamento').value;
    nombre_Departamento = nombre_Departamento.toUpperCase();
    if (nombre_Departamento == null || nombre_Departamento.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nombre_Departamento)) {
        var nombre_Departamento = document.getElementById('nombre_Departamento').style.border = "2px solid red"
        return false;
    } else if (nombre_Departamento.length > 50) {
        var nombre_Departamento = document.getElementById('nombre_Departamento').style.border = "2px solid red";
        return false;
    } else {
        var nombre_Departamento = document.getElementById('nombre_Departamento').style.border = "2px solid #4caf50";
        var nombre_Departamento = document.getElementById('nombre_Departamento').value;
        return true;
    }
}

function enviar() {
    if (validar_Nombre_Empresa() == true || validar_Nit_Empresa() == true || validar_municipio() == true || validar_nombre_Departamento() == true) {
        var Nombre_Empresa = document.getElementById('Nombre_Empresa').value;
        var Nit_Empresa = document.getElementById('Nit_Empresa').value;
        var municipio = document.getElementById('municipio').value;
        var nombre_Departamento = document.getElementById('nombre_Departamento').value;
        $("#contenedor_Empresas").load("Most-Empresa.php", {
            Nombre_Empresa: Nombre_Empresa,
            Nit_Empresa: Nit_Empresa,
            municipio: municipio,
            nombre_Departamento: nombre_Departamento
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


