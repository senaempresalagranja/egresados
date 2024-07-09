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
         

              $id=$_REQUEST['id'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Sistema De Informacion Para Los Egresados del Sena ">
  <meta name="keywords" content="HTML,CSS,JavaScript">
  <meta name="author" content="Alexis Espinosa Vidal">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asignar Ficha a programa </title>
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
        <h1 class="titulo-mayuscula">Actualizar Asignacion Ficha </h1>
      </div>
      <div class="col-md-12 text-center">
            <hr></div>  
    </div>
        


        <div class="row">
          

           <div class="col-xs-12 col-lg-7 col-lg-offset-4" data-form-type="formoid" >

            <input type="hidden" value="<?php echo $id ?>" id="id_Programa_Ficha">


           <?php 
         

              include '../../../assets/conexion/conexion.php';   
              $busqueda=" SELECT * FROM `programa_ficha` WHERE id_Programa_Ficha=$id";
              $query=mysqli_query($conexion,$busqueda);
              $fila=mysqli_fetch_row($query);

 ?>

                     <div class="col-xs-12 col-md-7">

                       <div class="form-group">
                         <label class="form-control-label" for="id_Programa">Programa</label>
                         <select class="form-control" id="id_Programa" onclick='validar_Programas()'>
                            <option value="Selecciona" >Selecciona Programa</option>
                            <?php 
                              include '../../../assets/conexion/conexion.php';
                              $query1="SELECT `id_Programa`, `nombre_Programa`,tipo_programa.Tipo, `duracion`, `id_Usuario` FROM `programas` INNER JOIN tipo_programa ON programas.Id_Tipo_Programa=tipo_programa.Id_Tipo_Programa  "; 
                              $resource1=mysqli_query($conexion,$query1);
                                while ($fila1=mysqli_fetch_row($resource1)) {
                                  echo "<option value='$fila1[0]' onclick='validar_Programas()' >$fila1[1] $fila1[2]</option>";
                              }
                            ?>
                          </select>
                       </div>
                      </div>


                     <div class="col-xs-12 col-md-7">

                       <div class="form-group">
                         <label class="form-control-label" for="id_Ficha">Ficha</label>
                         <select class="form-control" id="id_Ficha" onclick='validar_Fichas()'>
                            <option value="Selecciona" >Selecciona Ficha</option>
                            <?php 

      
                              include '../../../assets/conexion/conexion.php';  
                              $query2="SELECT * FROM fichas"; 
                              $resource2=mysqli_query($conexion,$query2);
                                while ($fila2=mysqli_fetch_row($resource2)) {
                                  echo "<option value='$fila2[0]' onclick='validar_Fichas()' >$fila2[1]</option>";
                              }
                            ?>
                          </select>
                       </div>
                      </div>
                   

                   
                     <div class="col-xs-12 col-md-7">

                       <div class="form-group">
                         <label class="form-control-label" for="Fecha_Ingreso">Fecha De Ingreso</label>
                         <input class="form-control" id="Fecha_Ingreso" type="date" onkeyup="validar_Fecha_Ingreso()" value='<?php echo($fila[3]) ?>'>
                       </div>
                      </div>
                   

                   
                     <div class="col-xs-12 col-md-7">

                       <div class="form-group">
                         <label class="form-control-label" for="Fecha_Fin">Fecha Fin</label>
                         <input class="form-control" id="Fecha_Fin" type="date" onkeyup="validar_Fecha_Fin()" value='<?php echo($fila[4]) ?>'>
                       </div>
                      </div>
                   
                    
                    <div class="col-xs-12 col-md-7">

                       <div class="form-group">
                         <label class="form-control-label" for="Matriculados">Matriculados</label>
                         <input class="form-control" id="Matriculados" type="number" onkeyup="validar_Matriculados()" value='<?php echo($fila[5]) ?>'>
                       </div>
                      </div>


                   
                     <div class="col-xs-12 col-md-7">

                       <div class="form-group">
                         <label class="form-control-label" for="Graduados">Graduados</label>
                         <input class="form-control" id="Graduados" type="number" onkeyup="validar_Graduados()" value='<?php echo($fila[6]) ?>'>
                       </div>
                      </div>

        </div>
        <div class="row">
          <div class="col-xs-12  box" >


            <button class="button button--antiman button--inverted-alt Actualizar" type="button" value="Acceder" onclick="actualizar()" ><i class="icon fa fa-refresh"></i><span>Actualizar</span></button>
          </div>
        </div>
      </div>

      
      </div>
      
      <div id="resultado"></div>  

<?php 
echo "<script>
  
  var id_Programa_Ficha='$fila[0]'; 

  var id_Programa=document.getElementById('id_Programa').value='$fila[1]'

  var id_Ficha=document.getElementById('id_Ficha').value='$fila[1]'

</script>";
 ?>
 <?php
      include'../include/scripts.php';
    ?>


      <script> 


function actualizar() {
    if (validar_Programas() == true && validar_Fichas() == true && validar_Fecha_Ingreso() == true && validar_Fecha_Fin() == true && validar_Matriculados() == true && validar_Graduados() == true) {

        var Matriculados = document.getElementById("Matriculados").value;
        var Graduados = document.getElementById("Graduados").value;
     

      if(
(parseInt(document.getElementById("Graduados").value,10)>parseInt(document.getElementById("Matriculados").value,10))
&& !isNaN(parseInt(document.getElementById("Matriculados").value,10))
&& !isNaN(parseInt(document.getElementById("Graduados").value,10))
) {
      
      swal({
            title: 'Error!',
            text: "El numero De Graduados No Puede Ser Mayor a Los Matriculados",
            type: 'error',
            
            confirmButtonColor: '#238276'
        })

      }else{





        var id_Programa_Ficha = document.getElementById("id_Programa_Ficha").value;
        var id_Programa = document.getElementById("id_Programa").value;
        var id_Ficha = document.getElementById("id_Ficha").value;
        var Fecha_Ingreso = document.getElementById("Fecha_Ingreso").value;
        var Fecha_Fin = document.getElementById("Fecha_Fin").value;
        var Matriculados = document.getElementById("Matriculados").value;
        var Graduados = document.getElementById("Graduados").value;

        

        id_Programa = id_Programa.toUpperCase();
        id_Ficha = id_Ficha.toUpperCase();
        $("#resultado").load("actualizar/conex_Actu-Programa_ficha.php", {

            id_Programa_Ficha: id_Programa_Ficha,
            id_Programa: id_Programa,
            id_Ficha: id_Ficha,
            Fecha_Ingreso: Fecha_Ingreso,
            Fecha_Fin: Fecha_Fin,
            Matriculados: Matriculados,
            Graduados: Graduados,

        });
}
    } else {
        swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            // background: '#fff url(../../../assets/img/Huevo3.png)',
            confirmButtonColor: '#ff9800'
        })
    }
}

$(document).ready(inicio);

function inicio() {
    
    
    $("#id_Programa").keyup(validar_Programas);
    $("#id_Ficha").keyup(validar_Fichas);
    $("#Fecha_Ingreso").keyup(validar_Fecha_Ingreso);
    $("#Fecha_Fin").keyup(validar_Fecha_Fin);
    $("#Matriculados").keyup(validar_Matriculados);
    $("#Graduados").keyup(validar_Graduados)



}




function validar_Programas() {
    var id_Programa = document.getElementById("id_Programa").value;
    if (id_Programa == "Selecciona") {
        var id_Programa = document.getElementById("id_Programa").style.border = "2px solid red";
        return false;
    } else {
        var id_Programa = document.getElementById("id_Programa").style.border = "2px solid #4caf50";
        return true;
    }
}


function validar_Fichas() {
    var id_Ficha = document.getElementById("id_Ficha").value;
    if (id_Ficha == "Selecciona") {
        var id_Ficha = document.getElementById("id_Ficha").style.border = "2px solid red";
        return false;
    } else {
        var id_Ficha = document.getElementById("id_Ficha").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Fecha_Ingreso() {
    var Fecha_Ingreso = document.getElementById("Fecha_Ingreso").value;
    var Fecha_Ingreso = new Date(Fecha_Ingreso);
    // alert(Fecha_Ingreso)
    if (Fecha_Ingreso.length == 0) {
        var Fecha_Ingreso = document.getElementById("Fecha_Ingreso").style.border = "2px solid red";
        return false;
    } else if (Fecha_Ingreso == "Invalid Date") {
        var Fecha_Ingreso = document.getElementById("Fecha_Ingreso").style.border = "2px solid red";
    } else {
        var Fecha_Ingreso = document.getElementById("Fecha_Ingreso").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Fecha_Fin() {
    var Fecha_Fin = document.getElementById("Fecha_Fin").value;
    var Fecha_Fin = new Date(Fecha_Fin);
    // alert(Fecha_Fin)
    if (Fecha_Fin.length == 0) {
        var Fecha_Fin = document.getElementById("Fecha_Fin").style.border = "2px solid red";
        return false;
    } else if (Fecha_Fin == "Invalid Date") {
        var Fecha_Fin = document.getElementById("Fecha_Fin").style.border = "2px solid red";
    } else {
        var Fecha_Fin = document.getElementById("Fecha_Fin").style.border = "2px solid #4caf50";
        return true;
    }
}


function validar_Matriculados() {
    var Matriculados = document.getElementById("Matriculados").value;
    if (Matriculados.length == 0) {
        var Matriculados = document.getElementById("Matriculados").style.border = "2px solid red";
        return false;
    } else {
        var Matriculados = document.getElementById("Matriculados").style.border = "2px solid #4caf50";
        return true;
    }
}


function validar_Graduados() {
    var Graduados = document.getElementById("Graduados").value;
    if (Graduados.length == 0) {
        var Graduados = document.getElementById("Graduados").style.border = "2px solid red";
        return false;
    } else {
        var Graduados = document.getElementById("Graduados").style.border = "2px solid #4caf50";
        return true;
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