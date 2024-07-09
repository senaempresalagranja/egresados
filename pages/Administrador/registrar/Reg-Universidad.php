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
      Registrar Universidad
    </title>
    <?php  include'../include/links.php';  ?>
  </head>
  <body class="sidebar-mini fixed" style="">
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
              <li><a href="egresados.php"><i class="fa fa-circle-o"></i>Egresado</a></li>
              <li><a href="Reg-Programa.php"><i class="fa fa-circle-o"></i>Programa de Formación</a></li>
              <li><a href="Reg-Ficha.php"><i class="fa fa-circle-o"></i>Ficha</a></li>
              <li><a href="Reg-Asignar_Programa-Ficha.php"><i class="fa fa-circle-o"></i>Asignación Ficha a Programa</a></li>

              <li><a class="click-pointer"><i class="active-icon fa fa-circle-o"></i>Universidades</a></li>
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
            Registrar Universidad
          </h1>
        </div>
        <div class="col-md-12 text-center">
          <hr/>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12  box" data-form-type="formoid">
          <button class="button button--antiman button--inverted-alt Preterminado" type="button" value="Acceder" onclick="registrar_Universidad()">
            <i class="icon fa fa-edit">
            </i>
            <span>
              Registrar
            </span>
          </button>
        </div>
      </div>
      <div class="modal fade" id="registrar_Universidad" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 class="modal-title">
                Registrar Universidad
              </h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                  <div class="form-group">
                    <label class="form-control-label" for="nombre_universidad">
                      Nombre Universidad
                    </label>
                    <input type="text" name="" id="nombre_universidad" class="form-control"  />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                  <div class="form-group">
                    <label class="form-control-label" for="Id_Departamento_universidad">
                      Departamento
                    </label>
                    <select id="Id_Departamento_universidad" onchange="validar_departamento_universidad()" class="form-control">
                      <option value="Seleccione">
                        Seleccione
                      </option>
                      <?php  $query="SELECT * FROM `departamentos`"; $resource=mysqli_query($conexion,$query); while ($fila=mysqli_fetch_row($resource)) { ?>
                      <option value="       <?php echo $fila[0] ?> ">
                        <?php echo $fila[1] ?>
                      </option>
                      <?php  } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                  <div class="form-group">
                    <label class="form-control-label" for="Fecha_Ingreso">
                      Municipio
                    </label>
                    <select name="" id="Id_Municipio_universidad" onchange="validar_Id_Municipio_universidad()" class="form-control">
                      <option value="Seleccione">
                        Seleccione
                      </option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 box">
                  <button class="button button--antiman button--inverted-alt Registrar" type="button"  value="REGISTRAR" onclick="registrar()">
                    <i class="icon fa fa-floppy-o">
                    </i>
                    <span>
                      Guardar
                    </span>
                  </button>
                </div>
              </div>
            </div>
            <div class="modal-footer ocult">
              <button type="button" id="cerrar_ficha" class="btn btn-default" data-dismiss="modal">
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
      <script>
                 function registrar_Universidad() {
          $("#registrar_Universidad").modal("show");
      }
            </script>
      <div class="row" style="margin-bottom: 20px">
        <div class="col-xs-12 col-md-4 col-lg-offset-4">
          <div class="input-group">
            <span class="input-group-addon">
              <span class="fa fa-search" aria-hidden="true">
              </span>
            </span>
            <input type="text" class="form-control" name="Traer_Universidades" id="Traer_Universidades" placeholder="Buscar "/>
          </div>
        </div>
      </div>
      <div class="container" id="Contenedor_Recargar">
        <div class="row">
          <div class="col-xs-12 col-md-8 col-lg-offset-2">
            <div class="panel panel-default">
              <table class="table table-fixed">
                <thead>
                  <tr>
                    <th class="col-xs-4">
                      Universidad
                    </th>
                    <th class="col-xs-4">
                      Departamento
                    </th>
                    <th class="col-xs-2">
                      Municipio
                    </th>
                    <th class="col-xs-2">
                      Actualizar
                    </th>
                  </tr>
                </thead>
                <tbody id="Filtar-Datos">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div id="contenedor">
      </div>
    </body>
    <?php include'../include/scripts.php'; ?>
    <script>

$(document).ready(inicio);

function inicio() {
$("#nombre_universidad").keyup(validar_nombre_universidad)
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
var nombre_universidad=document.getElementById('nombre_universidad').style.border="2px solid green";

      return true;
      }
}



function registrar() {
  if (validar_nombre_universidad()==true && validar_Id_Municipio_universidad()==true) {
var Id_Municipio_universidad=document.getElementById("Id_Municipio_universidad").value;
var nombre_universidad=document.getElementById("nombre_universidad").value;
$("#contenedor").load("conexion/Conex_Reg-Universidad.php",{nombre_universidad:nombre_universidad,Id_Municipio_universidad:Id_Municipio_universidad})
    
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

      var Id_Municipio_universidad=document.getElementById("Id_Municipio_universidad").style.border="2px solid green";
      return true;
    }
}

function validar_departamento_universidad() {
  var Id_Departamento_universidad=document.getElementById("Id_Departamento_universidad").value;

if (Id_Departamento_universidad=="Seleccione") {

var Id_Departamento_universidad=document.getElementById("Id_Departamento_universidad").style.border="2px solid red";
return false;

}else{
Id_Departamento_universidad=document.getElementById("Id_Departamento_universidad").style.border="2px solid green";
var Id_Departamento_universidad=document.getElementById("Id_Departamento_universidad").value;
$("#Id_Municipio_universidad").load("mostrar_municipio__universidad.php",{Id_Departamento_universidad:Id_Departamento_universidad});
return true;

} 

}

</script>

<script>

$(document).ready(inicio);

function inicio() {
    $("#Traer_Universidades").keyup(enviar);

}

function validar_Traer_Universidades() {
    var Traer_Universidades = document.getElementById('Traer_Universidades').value;
    Traer_Universidades = Traer_Universidades.toUpperCase();
    if (Traer_Universidades == null || Traer_Universidades.length == 0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Traer_Universidades)) {
        var Traer_Universidades = document.getElementById('Traer_Universidades').style.border = "2px solid red"
        return false;
    } else if (Traer_Universidades.length > 50) {
        var Traer_Universidades = document.getElementById('Traer_Universidades').style.border = "2px solid red";
        return false;
    } else {
        var Traer_Universidades = document.getElementById('Traer_Universidades').style.border = "2px solid #4caf50";
        var Traer_Universidades = document.getElementById('Traer_Universidades').value;
        return true;
    }
}


function enviar() {
    if (validar_Traer_Universidades() == true) {
        var Traer_Universidades = document.getElementById('Traer_Universidades').value;

        $("#Filtar-Datos").load("Filtar-Universidad.php", {
            Traer_Universidades: Traer_Universidades,
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


