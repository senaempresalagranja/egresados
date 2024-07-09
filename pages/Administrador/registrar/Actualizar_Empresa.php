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
  <title>Actualizar Empresa</title>
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
            <h1 class="titulo-mayuscula">
              Actualizar Empresa
            </h1>
          </div>
          <div class="col-md-12 text-center">
            <hr/>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-lg-7 col-lg-offset-4" data-form-type="formoid">

            <div class='col-xs-12 col-md-7'>
              <div class='form-group'>
                <label class='form-control-label' for='Nombre_Empresa'>Nombre Empresa </label>
                <input  class='form-control' onkeyup='validar_Ficha()' id='Nombre_Empresa' type='text' value='<?php echo($fila[1]) ?>'>
                </div>
              </div>

              <div class='col-xs-12 col-md-7'>
                <div class='form-group'>
                  <label class='form-control-label' for='Nit_Empresa'>Nit Empresa </label>
                  <input  class='form-control' onkeyup='validar_Ficha()' id='Nit_Empresa' type='text' value='<?php echo($fila[2]) ?>'>
                </div>
              </div>

              <div class="col-xs-12 col-md-7">
                <div class="form-group">
                  <label class="form-control-label" for="id_Departamento">Departamento</label>
                  <select class="form-control" id="id_Departamento" onclick="mostrar_municipio()">
                    <option value="Selecciona" >Selecciona Departamento</option>
                    <?php 
                      // include '../../../assets/conexion/conexion.php';
                      $query1="SELECT * FROM departamentos "; 
                      $resource1=mysqli_query($conexion,$query1);
                        while ($fila1=mysqli_fetch_row($resource1)) {
                          echo "<option value='$fila1[0]'>$fila1[1]</option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-xs-12 col-md-7">
                <div class="form-group" id="contenedor_municipio">
                  <label class="form-control-label" for="id_Municipio">Municipio</label>
                  <select class="form-control" id="id_Municipio">
                    <option value="Selecciona">Selecciona Municipio</option>
                    <?php 
                      // include '../../../assets/conexion/conexion.php';
                      $query="SELECT * FROM `municipios` ";
                      $resource=mysqli_query($conexion,$query);
                      while ($fila=mysqli_fetch_row($resource)) {
                      echo"<option value= '$fila[0]' onchange='validar_Municipio()'>$fila[2]</option>";
                      }
                    ?>
                  </select>

                  <?php 
                    $id=$_REQUEST['id'];

                    // include '../../../assets/conexion/conexion.php'; //conexion a la base de datos 
                    $busqueda=" SELECT `id_Empresa`, `Nombre_Empresa`, `Nit_Empresa`, departamentos.id_Departamento,municipios.id_Municipio FROM `empresa` INNER JOIN municipios ON empresa.id_Municipio=municipios.id_Municipio INNER JOIN departamentos ON municipios.id_Departamento=departamentos.id_Departamento WHERE id_Empresa=$id";
              
                    $query=mysqli_query($conexion,$busqueda);
                    $fila=mysqli_fetch_row($query);

                      echo "<script>
                      var id_Empresa='$fila[0]'; 
                      var Nombre_Empresa=document.getElementById('Nombre_Empresa').value='$fila[1]';
                      var Nit_Empresa=document.getElementById('Nit_Empresa').value='$fila[2]';
                      var id_Departamento=document.getElementById('id_Departamento').value='$fila[3]';
                      var id_Municipio=document.getElementById('id_Municipio').value='$fila[4]';
                      </script>";
                  ?>  
                </div>
              </div>
            </div> 
          </div>
        <div class="row">
          <div class="col-xs-12  box" >
            <button class="button button--antiman button--inverted-alt Actualizar" value="Acceder" onclick="actualizar()"><i class="icon fa fa-refresh"></i><span>Actualizar</span></button>
          </div>
        </div>
      </div>

      
      <div id="resultado"></div>  


      
      <script> 

function mostrar_municipio() {
var id_Departamento=document.getElementById('id_Departamento').value;

$("#contenedor_municipio").load("mostrar_municipio1.php",{id_Departamento:id_Departamento})

}


function actualizar() {
    // if (validar_Nombre_Empresa() == true && validar_Municipio() == true && validar_Nit_Empresa() == true) {

      if (validar_Nombre_Empresa() == true && validar_Municipio() == true ) {
        

        var Nombre_Empresa = document.getElementById("Nombre_Empresa").value;
        var id_Municipio = document.getElementById("id_Municipio").value;
        var Nit_Empresa = document.getElementById("Nit_Empresa").value;
        Nombre_Empresa = Nombre_Empresa.toUpperCase();

        $("#resultado").load("actualizar/conex_Actu-Empresa.php", {

            id_Empresa: id_Empresa,
            Nombre_Empresa: Nombre_Empresa,
            id_Municipio: id_Municipio,
            Nit_Empresa: Nit_Empresa,
        });
    } else {
        swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
    }
}

$(document).ready(inicio);

function inicio() {

    
    $("#Nombre_Empresa").keyup(validar_Nombre_Empresa);
    $("#id_Municipio").keyup(validar_Municipio);
    $("#Nit_Empresa").keyup(validar_Nit_Empresa);
}



function validar_Nombre_Empresa() {
    var Nombre_Empresa = document.getElementById("Nombre_Empresa").value;
    if (Nombre_Empresa.length == 0) {
        var Nombre_Empresa = document.getElementById("Nombre_Empresa").style.border = "2px solid red";
        return false;
    } else {
        var Nombre_Empresa = document.getElementById("Nombre_Empresa").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Municipio() {
    var id_Municipio = document.getElementById("id_Municipio").value;
    if (id_Municipio == "Selecciona") {
        var id_Municipio = document.getElementById("id_Municipio").style.border = "2px solid red";
        return false;
    } else {
        var id_Municipio = document.getElementById("id_Municipio").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Nit_Empresa() {
    var Nit_Empresa = document.getElementById("Nit_Empresa").value;
    if (Nit_Empresa.length == 0) {
        var Nit_Empresa = document.getElementById("Nit_Empresa").style.border = "2px solid red";
        return false;
    } else {
        var Nit_Empresa = document.getElementById("Nit_Empresa").style.border = "2px solid #4caf50";
        return true;
    }
} 

   </script>

    <?php 
echo "<script>
  

  var id_Departamento=document.getElementById('id_Departamento').value='$fila[3]';
mostrar_municipio();
</script>";
 ?>        

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