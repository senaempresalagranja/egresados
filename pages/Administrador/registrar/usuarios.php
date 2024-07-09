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
      Usuarios
    </title>
    <?php  include'../include/links.php';  ?>
  </head>
  <body class="sidebar-mini fixed" style="">
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
              <li><a class="click-pointer"><i class="active-icon fa fa-circle-o"></i>Configurar Usuarios</a></li>
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
            Configurar Usuarios
          </h1>
        </div>
        <div class="col-md-12 text-center">
          <hr/>
        </div>
      </div>



      <div class="row">
        <div class="col-xs-12  box" data-form-type="formoid">
          <button class="button button--antiman button--inverted-alt Preterminado" type="button" value="Acceder" onclick="registrar_Empresa()">
            <i class="icon fa fa-edit">
            </i>
            <span>
              Registrar
            </span>
          </button>
        </div>
      </div>


      <div class="modal fade" id="registrar_Empresa" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
              <h4 class="modal-title">
                Registrar Usuario
              </h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                  <div class="form-group">
                    <label class="form-control-label" for="Nombre_Empresa">
                      Usuario
                    </label>
                    <input type="text" name="" id="usuario"  class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                  <div class="form-group">
                    <label class="form-control-label" for="Nit_Empresa">
                      Nombre Del Usuario
                    </label>
                    <input type="text" name="" id="nombre_usuario"  class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                  <div class="form-group">
                    <label class="form-control-label" for="id_Departamento">
                      Rol
                    </label>
                    <select name="rol" class="form-control" id="rol" onclick="validar_rol()">
                      <option value="Selecciona">Selecciona</option>
                      <option   value="ADMINISTRADOR">ADMINISTRADOR</option>
                      <option value="CENTRO">CENTRO</option>
 
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                  <div class="form-group" id="contenedor_municipio">
                    <label class="form-control-label" for="id_Municipio">
                      Contraseña
                    </label>
                    <input type="password" class="form-control" name="" id="contraseña">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                  <div class="form-group" id="contenedor_municipio">
                    <label class="form-control-label" for="id_Municipio">
                      Repita Contraseña
                    </label>
                    <input type="password" class="form-control" name="" id="contraseña_repita">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 box">

                  <button class="button button--antiman button--inverted-alt Registrar" type="button" value="Crear Usuario" onclick="crear_usuario()"><i class="icon fa fa-floppy-o"></i><span>Guardar</span></button>
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
                 function registrar_Empresa() {
          $("#registrar_Empresa").modal("show");
      }
            </script>


<!-- <div class="row">
    <div class="col-md-3"><h3>Usuario</h3></div>
    <div class="col-md-3"><h3>Rol</h3></div>
    <div class="col-md-1"></div>


</div>
<div class="container-fluid" style="height: 80%;">
    

<?php 





$query="SELECT  `nombre_Usuario`,`rol`, `usuario`, `id_Usuario` FROM `usuarios` ";
$resource=mysqli_query($conexion,$query);
while ($fila=mysqli_fetch_row($resource)) {

?>
<div class="row" style="border-bottom: 2px solid black; padding: 5px;">
    <div class="col-md-3"> <?php echo "$fila[0]"; ?></div>
    <div class="col-md-3"> <?php echo "$fila[1]"; ?></div>
    <div class="col-md-1">
    
    <form action="editar_usuario.php" method="post">
        <input type="hidden" name="id_usuario" value="<?php echo "$fila[3]"; ?>">
<button type="submit" class="btn btn-primary" title="Editar Usuario">
Editar
</button>

    </form>    

    </div>



</div>
<?php 

}
 ?>
</div>
 -->



      <div class="container" id="Contenedor_Recargar">
        <div class="row">
          <div class="col-xs-12 col-md-8 col-lg-offset-2 ">
            <h3>Lista De Usuarios</h3>
            <div class="">
              <table class="table ">

                <thead>
                  <tr>
                    <th class="col-xs-4">
                    Usuario
                    </th>
                    <th class="col-xs-4">
                    Nombre Usuario
                    </th>
                    <th class="col-xs-2">
                    Rol
                    </th>
                    <th class="col-xs-2">
                    Actualizar
                    </th>
                  </tr>
                </thead>
                <tbody id="Filtar-Datos">
                  <?php 





$query="SELECT  `nombre_Usuario`,`rol`, `usuario`, `id_Usuario` FROM `usuarios` ";
$resource=mysqli_query($conexion,$query);
while ($fila=mysqli_fetch_row($resource)) {

?>
<tr >
    <td class=""> <?php echo "$fila[0]"; ?></td>
    <td class=""> <?php echo "$fila[2]"; ?></td>
    <td class=""> <?php echo "$fila[1]"; ?></td>
    <td class="">
    
    <form action="editar_usuario.php" method="post">
        <input type="hidden" name="id_usuario" value="<?php echo "$fila[3]"; ?>">
<button class='boton-ver' type='submit' value='ver mas'><i class='fa fa-refresh'></i></button>

    </form>    

    </td>



</tr>
<?php 

}
 ?>
                </tbody>
              </table>
            </div>  
          </div>
        </div>
      </div>


<div id="contenedor"></div>

        <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
            </div>

<?php
      include'../include/scripts.php';
    ?>
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
  var contraseña=document.getElementById('contraseña').style.border="2px solid red"
        return false;

      }else if (contraseña.length>50) {
var contraseña=document.getElementById('contraseña').style.border="2px solid red"
        return false;

      } else{
var contraseña=document.getElementById('contraseña').style.border="2px solid green"

      return true;
      } 

}

function validar_contraseña_repita() {
   var contraseña_repita=document.getElementById('contraseña_repita').value;
      if(contraseña_repita==null  || contraseña_repita.length==0){
  var contraseña_repita=document.getElementById('contraseña_repita').style.border="2px solid red"
        return false;

      }else if (contraseña_repita.length>50) {
var contraseña_repita=document.getElementById('contraseña_repita').style.border="2px solid red"
        return false;

      } else{
var contraseña_repita=document.getElementById('contraseña_repita').style.border="2px solid green"

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

      var contraseña_repita=document.getElementById('contraseña_repita').style.border="2px solid red";
      var contraseña=document.getElementById('contraseña').style.border="2px solid red";
}

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
var usuario=document.getElementById('usuario').style.border="2px solid green"

      return true;
      } 

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
var nombre_usuario=document.getElementById('nombre_usuario').style.border="2px solid green"

      return true;
      } 

  }


  function validar_rol() {
      var rol=document.getElementById("rol").value;
  if (rol=="Selecciona") {

var rol=document.getElementById('rol').style.border="2px solid red";
return false

  }else{
var rol=document.getElementById('rol').style.border="2px solid green";
return true
  }
  }



</script>



        <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
            </div>


  </body>
  
  <?php

}
else
{
  echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../index.php?Acceso Denegado'</script>";
}  
?>
</html>


