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
        <h1 class="logoa">Sistema de Información para Egresados</h1 > 
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
              <li><a href="../Registrar/Reg-Asignar_Programa-Ficha.php"><i class="fa fa-circle-o"></i>Asignación Ficha a Programa</a></li>

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
              <li><a class="click-pointer"><i class="active-icon fa fa-circle-o"></i>Asignación Ficha a Programa</a></li>
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
        <h1 class="titulo-mayuscula">Consultar Asignación Ficha</h1>
      </div>
      <div class="col-md-12 text-center">
            <!-- <h3 class="help-block">DATOS BASICOS EGRESADO</h3> -->
            <hr></div>  
    </div>
      <form action="" id="formulario" method="POST" class="" autocomplete="off">
  
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="">Programa</label>
              <input type="text" class="form-control" name="id_Programa" id="id_Programa">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="">Ficha</label>
              <input type="number" class="form-control" name="id_Ficha" id="id_Ficha">
            </div>  
          </div>
      
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="">Fecha_Ingreso</label>
              <input type="date" class="form-control" name="Fecha_Ingreso" id="Fecha_Ingreso">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label class="form-control-label" for="">Fecha_Fin</label>
              <input type="date" class="form-control" name="Fecha_Fin" id="Fecha_Fin">
            </div>
          </div>


        </div>
  
        <div class="row">

          
          <div class="col-xs-12 box">
            <button class="button button--antiman button--inverted-alt PDF" type="button" value="Exportar pdf" onclick="exportar_pdf()"><i class="icon fa fa-file-pdf-o"></i><span>PDF</span></button>

            <button class="button button--antiman button--inverted-alt Excel" type="button" value="Exportar excel" onclick="exportar_excel()"><i class="icon fa fa-file-excel-o"></i><span>Excel</span></button>

          </div>

        </div>  

        <!-- <div class="row">
          <div class="col-md-2"><b>Programa</b></div>
          <div class="col-md-2"><b>Ficha</b></div>
          <div class="col-md-2"><b>Fecha De Ingreso</b></div>
          <div class="col-md-2"><b>Fecha Fin</b></div>
          <div class="col-md-2"><b>Matriculados</b></div>
          <div class="col-md-2"><b>Graduados</b></div>
        </div> -->
      </form>
      
      <div class="row">
          <div class=" panel panel-default ">
            <table class="table table-fixed">
              <thead>
                <tr>
                  <!-- <th class="col-xs-9">Departamento</th><th class="col-xs-3">Actualizar</th> -->
                  <th class="col-xs-2">
                    Programa
                  </th>
                  <th class="col-xs-2">
                    Ficha
                  </th>
                  <th class="col-xs-2">
                    Fecha Ingreso
                  </th>
                  <th class="col-xs-2">
                    Fecha Fin
                  </th>
                  <th class="col-xs-2">
                    Matriculados
                  </th>
                  <th class="col-xs-2">
                    Certificados
                  </th>
                  <!-- <th class="col-xs-1">
                    Actualizar
                  </th> -->
                </tr>
              </thead>
              <tbody id="contenedor_Programas">
              </tbody>
            </table>
          </div>
        </div>


      <div id="contenedor_Programas" class="col-xs-12 " style="height: 60%;    overflow-y: auto;"></div>
    </div>


  </body>
  <?php
      include'../include/scripts.php';
    ?>
<script>
function exportar_pdf() {
    if (enviar() == true) {
        var formulario = document.getElementById('formulario').action = '../exportar/exportar_Pdf/Expor_PDF-Asignacion_Ficha.php';
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
        var formulario = document.getElementById('formulario').action = '../exportar/exportar_excel/Export_Excel-Asignacion_Ficha.php';
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
    $("#id_Programa").keyup(enviar);
    $("#id_Ficha").keyup(enviar);
    $("#Fecha_Ingreso").keyup(enviar);
    $("#Fecha_Fin").keyup(enviar);
}

function validar_id_Programa() {
    var id_Programa = document.getElementById('id_Programa').value;
    id_Programa = id_Programa.toUpperCase();
    if (id_Programa == null || id_Programa.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(id_Programa)) {
        var id_Programa = document.getElementById('id_Programa').style.border = "2px solid red"
        return false;
    } else if (id_Programa.length > 50) {
        var id_Programa = document.getElementById('id_Programa').style.border = "2px solid red";
        return false;
    } else {
        var id_Programa = document.getElementById('id_Programa').style.border = "2px solid  #4caf50";
        var id_Programa = document.getElementById('id_Programa').value;
        return true;
    }
}

function validar_id_Ficha() {
    var id_Ficha = document.getElementById('id_Ficha').value;
    id_Ficha = id_Ficha.toUpperCase();
    if (id_Ficha == null || id_Ficha.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(id_Ficha)) {
        var id_Ficha = document.getElementById('id_Ficha').style.border = "2px solid red"
        return false;
    } else if (id_Ficha.length > 50) {
        var id_Ficha = document.getElementById('id_Ficha').style.border = "2px solid red";
        return false;
    } else {
        var id_Ficha = document.getElementById('id_Ficha').style.border = "2px solid  #4caf50";
        var id_Ficha = document.getElementById('id_Ficha').value;
        return true;
    }
}


function validar_Fecha_Ingreso() {
  
  var Fecha_Ingreso=document.getElementById("Fecha_Ingreso").value;
  var Fecha_Ingreso=new Date(Fecha_Ingreso);
  if (Fecha_Ingreso=="Invalid Date") {
    var Fecha_Ingreso=document.getElementById("Fecha_Ingreso").style.border="2px solid red";
    return false;
  }else{

    var Fecha_Ingreso=document.getElementById("Fecha_Ingreso").style.border="2px solid  #4caf50";
    return true;
  }
}

function validar_Fecha_Fin() {
    var Fecha_Fin=document.getElementById("Fecha_Fin").value;
  var Fecha_Fin=new Date(Fecha_Fin);
  if (Fecha_Fin=="Invalid Date") {
    var Fecha_Fin=document.getElementById("Fecha_Fin").style.border="2px solid red";
    return false;
  }else{

    var Fecha_Fin=document.getElementById("Fecha_Fin").style.border="2px solid  #4caf50";
    return true;
  }
}


function enviar() {
    if (validar_id_Programa() == true || validar_id_Ficha() == true || validar_Fecha_Ingreso() == true || validar_Fecha_Fin() == true) {
        var id_Programa = document.getElementById('id_Programa').value;
        var id_Ficha = document.getElementById('id_Ficha').value;
        var Fecha_Ingreso = document.getElementById('Fecha_Ingreso').value;
        var Fecha_Fin = document.getElementById('Fecha_Fin').value;
        $("#contenedor_Programas").load("Most-Programa_Ficha.php", {
            id_Programa: id_Programa,
            id_Ficha: id_Ficha,
            Fecha_Ingreso: Fecha_Ingreso,
            Fecha_Fin: Fecha_Fin
        });
        return true;
    } else {
        return false;
    }
}

// $('#Fecha_Ingreso').datepicker({
//         format: "yyyy/mm/dd",
//         autoclose: true,
//         todayHighlight: true,
//         language: 'es'
//       });

// $('#Fecha_Fin').datepicker({
//         format: "dd/mm/yyyy",

//         autoclose: true,
//         todayHighlight: true,
//         language: 'es'
//       });
</script>

  <?php

}
else
{
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../index.php?Acceso Denegado'</script>";
}  
?>
</html>


