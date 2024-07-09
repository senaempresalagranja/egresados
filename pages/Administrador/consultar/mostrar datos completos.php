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
  <title>Consultar Egresados</title>
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
        <h1 class="titulo-mayuscula">Consultar Egresados</h1>
      </div>
      <div class="col-md-12 text-center">
            <!-- <h3 class="help-block">DATOS BASICOS EGRESADO</h3> -->
            <hr></div>  
    </div>
<?php 

$id_egresado=$_REQUEST['id_egresado']; 
include '../../../assets/conexion/conexion.php';

$res=mysqli_query($conexion,"SELECT `id_Egresado`, `Tipo_Documento`, `Numero_Documento`, `Nombre_Aprendiz`, `Apellidos_Aprendiz`, departamentos.nombre_Departamento,municipios.nombre_Municipio, `Correo_Electronico`, `Telefono_Fijo`, `Telefono_Alterno`, `Telefono_Celular`, `Facebook`, `Sexo`, `Fecha_Nacimiento`, `Ultima_Actualizacion`, `id_Usuario` FROM `egresados` inner JOIN municipios ON egresados.id_Municipio=municipios.id_Municipio INNER JOIN departamentos ON municipios.id_Departamento=departamentos.id_Departamento where id_Egresado=$id_egresado"); 
while ($reg=mysqli_fetch_row($res)) {
  // echo "$reg[3] $reg[4] datos basicos todos  <br>";



  echo "<div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <section class='invoice'>
                <div class='row'>
                  <div class='col-xs-12'>
                    <h2 class='page-header'><i class='fa fa-globe'></i> Información De Egresado</h2>
                  </div>
                </div>
                <div class='row invoice-info'>

                  <div class='col-xs-4'>
                    <b>Nombre:</b>  $reg[3] 
                    <br>
                    <b>Apellido:</b>  $reg[4]
                    <br>
                    <b>N°Documento:</b> $reg[1]. $reg[2]
                    <br>
                    <b>Fecha De Nacimiento:</b> $reg[13]
                    <br>
                    <b>Sexo:</b> $reg[12]
                  </div>

          <div class='col-xs-4'>
                    <b>Departamento:</b>  $reg[5]
                    <br><b>Municipio:</b>  $reg[6]
               
                  </div>

                  <div class='col-xs-4'>
                    <b>Correo Electrónico:</b>  $reg[7]
                    <br><b>Teléfono Fijo:</b>  $reg[8]
                    <br><b>Teléfono Alterno:</b>  $reg[9]
                    <br><b>Teléfono Celular:</b>  $reg[10]
                    <br><b>Facebook:</b>  $reg[11]
                  <br>";
                
  $id_egresado=$reg[0];
$res1=mysqli_query($conexion,"SELECT `id_contactado`, `id_Egresado`, `contactado`, `actualizacion` FROM `contactacion`
    WHERE id_Egresado=$id_egresado ");
  while ($reg1=mysqli_fetch_row($res1)) {
    
    echo "  <br><b>Contactado:</b> $reg1[2]
                 </div>
               </div>";

    
  } 

  $res1=mysqli_query($conexion,"SELECT `Id_asociacion_egresados`,programas.nombre_Programa, fichas.numero_Ficha, `FechaCertificacion` FROM `asociacion_egresados` 
    INNER JOIN programa_ficha ON asociacion_egresados.id_Programa_Ficha= programa_ficha.id_Programa_Ficha
    INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa 
    INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha 
    WHERE asociacion_egresados.id_Egresado=$id_egresado GROUP BY asociacion_egresados.Id_asociacion_egresados");
  while ($reg1=mysqli_fetch_row($res1)) {
    $id_asociacion_egresado=$reg1[0];

     echo "<div class='col-md-12 text-center'>
                                <h3 class='help-block'>Programa De Formacion</h3>
                                
                              </div>";

    echo "

      <div class='row'>
                  <div class='col-xs-12 table-responsive'>
                    <table class='table table-striped'>
                      <thead>
                        <tr>
                          <th># Ficha</th>
                          <th>Programa De Formación</th>
                          <th>Fecha Certificación</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>$reg1[2]</td>
                          <td>$reg1[1]</td>
                          <td>$reg1[3]</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
      

    ";




  

    $res2=mysqli_query($conexion,"SELECT `Id_Etapa_Practica_Egresado`, `Id_asociacion_egresados`, empresa.Nombre_Empresa, tipo_etapa_practica.Nombre_Etapa, `Nombre_Proyecto`, `Ultima_Actualizacion` FROM `etapa_practica_egresado`

INNER JOIN empresa on etapa_practica_egresado.Id_Etapa_Practica_Egresado=empresa.id_Empresa

INNER JOIN tipo_etapa_practica ON etapa_practica_egresado.Id_Etapa_Practica_Egresado=tipo_etapa_practica.Id_Tipo_Etapa_Practica

     WHERE `Id_asociacion_egresados`=$id_asociacion_egresado");

    echo "<div class='col-md-12 text-center'>
                                <h3 class='help-block'>Etapa Practica</h3>
                                
                              </div>";

    while ($reg2=mysqli_fetch_row($res2)) {
    // aqui valido si nombre proyecto es null osea que es tipo empresa
      if ($reg2[4]==null && $reg2[2]!=null) {
// echo "aqui imprimo no es un proyecto productivo alexix lo unico que tiene que hacer e hacer iner join a tipo de etapa y empresa pero todo en el mismo orden";

        // echo " empresa $reg2[2] y tipo de etapa $reg2[3] <br>";

        echo "

      <div class='row'>
                  <div class='col-xs-12 table-responsive'>
                    <table class='table table-striped'>
                      <thead>
                        <tr>
                          
                          <th>Tipo Etapa Practica</th>
                          <th>Detalles</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                       
                          <td>$reg2[3]</td>
                          <td>$reg2[2]</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
      

    ";


// aqui valido si es un tipo que no tiene ni empresa ni proyecto como monitorias
      }else if($reg2[4]==null && $reg2[2]==null){

        // echo "tipo etapa es= $reg2[3] <br>";

        echo "

      <div class='row'>
                  <div class='col-xs-12 table-responsive'>
                    <table class='table table-striped'>
                      <thead>
                        <tr>
                          
                          <th>Tipo Etapa Practica</th>
                          <th>Detalles</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                       
                          <td>$reg2[3]</td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
      

    ";

      }else{

        // echo "proyecto productivo $reg2[4] <br>";

        echo "

      <div class='row'>
                  <div class='col-xs-12 table-responsive'>
                    <table class='table table-striped'>
                      <thead>
                        <tr>
                          
                          <th>Tipo Etapa Practica</th>
                          <th>Detalles</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                       
                          <td>proyecto productivo</td>
                          <td>$reg2[4]</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
      

    ";

      }

    }
  }

  $res1=mysqli_query($conexion,"SELECT `Id_Situacion` FROM `asociacion_situacion_laboral` WHERE `id_Egresado`=$id_egresado");

  // echo "siatuaciones de esa persona  <hr>"; 
   echo "<div class='col-md-12 text-center'>
                                <h3 class='help-block'>Situación Laboral</h3>
                                
                              </div>";
  while ($reg1=mysqli_fetch_row($res1)) {
    if ($reg1[0]==1) {

      echo "Desempleado  aqui la fecha <br>";

    }else if ($reg1[0]==3){

      // echo "estudiando";

      $res2=mysqli_query($conexion,"SELECT `Id_Estudiando_Egresado`, `id_Egresado`, universidades.Nombre_universidad, `Nombre_Carrera`, `Ultima_Actualizacion` FROM `estudiando_egresado` INNER JOIN universidades ON estudiando_egresado.Id_universidad=universidades.Id_universidad WHERE `id_Egresado`=$id_egresado");
      while ($reg2=mysqli_fetch_row($res2)) {

        // echo " carrera=$reg2[3] aquin la fecha <br>";

        echo "

      <div class='row'>
                  <div class='col-xs-12 table-responsive'>
                    <table class='table table-striped'>
                      <thead>
                        <tr>
                          <th>Situacion</th>
                          <th>Lugar</th>
                          <th>Detalles</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                       
                          <td>Estudiando</td>
                          <td>$reg2[2]</td>
                          <td>$reg2[3]</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
      

    ";

      }
    }else{

        // echo "trabajando";

      $res2=mysqli_query($conexion,"SELECT `Id_Trabajando_Egresado`, `id_Egresado`, empresa.Nombre_Empresa, `Funcion_Desempena`, `Funcion_Relacion_Programa`, `Salario`, `Intensidad_Horaria`, `Ultima_Actualizacion` FROM `trabajando_egresado` INNER JOIN empresa ON trabajando_egresado.id_Empresa=empresa.id_Empresa WHERE `id_Egresado`=$id_egresado");
      while ($reg2=mysqli_fetch_row($res2)) {

        // echo " trabajando=$reg2[3] aquin la fecha <br>";

         echo "

      <div class='row'>
                  <div class='col-xs-12 table-responsive'>
                    <table class='table table-striped'>
                      <thead>
                        <tr>
                          <th>Situación</th>
                          <th>Empresa</th>
                          <th>Función Que Desempeña </th>
                          <th>Tiene que ver con el Programa</th>
                          <th>Salario </th>
                          <th>Intensidad Horaria  </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                       
                          <td>Trabajando</td>
                          <td>$reg2[2]</td>
                          <td>$reg2[3]</td>
                          <td>$reg2[4]</td>
                          <td>$reg2[5]</td>
                          <td>$reg2[6]</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
      

    ";

      }
      
    }
  }

}

?>



<!-- <div class='row'>
          <div class='col-md-12'>
            <div class='card'>
              <section class='invoice'>
                <div class='row'>
                  <div class='col-xs-12'>
                    <h2 class='page-header'><i class='fa fa-globe'></i> Información De Egresado</h2>
                  </div>
                </div>
                <div class='row invoice-info'>

                  <div class='col-xs-4'>
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

          <div class='col-xs-4'>
                    <b>Departamento:</b> <?php echo $fila[13] ?>
                    <br><b>Municipio:</b> <?php echo $fila[12] ?>
               
                  </div>

                  <div class='col-xs-4'>
                    <b>Correo Electrónico:</b> <?php echo $fila[5] ?>
                    <br><b>Teléfono Fijo:</b> <?php echo $fila[6] ?>
                    <br><b>Teléfono Alterno:</b> <?php echo $fila[7] ?>
                    <br><b>Teléfono Celular:</b> <?php echo $fila[8] ?>
                    <br><b>Facebook:</b> <?php echo $fila[9] ?>
                  <br>
                  <br><b>Contactado:</b> <?php echo $fila[14] ?>
                  </div>
                  
                </div> -->
                <!-- <div class='row'>
                  <div class='col-xs-12 table-responsive'>
                    <table class='table table-striped'>
                      <thead>
                        <tr>
                          <th>Qty</th>
                          <th>Product</th>
                          <th>Serial #</th>
                          <th>Description</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Call of Duty</td>
                          <td>455-981-221</td>
                          <td>El snort testosterone trophy driving gloves handsome</td>
                          <td>$64.50</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Need for Speed IV</td>
                          <td>247-925-726</td>
                          <td>Wes Anderson umami biodiesel</td>
                          <td>$50.00</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Monsters DVD</td>
                          <td>735-845-642</td>
                          <td>Terry Richardson helvetica tousled street art master</td>
                          <td>$10.70</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Grown Ups Blue Ray</td>
                          <td>422-568-642</td>
                          <td>Tousled lomo letterpress</td>
                          <td>$25.99</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div> -->
              </section>
            </div>
          </div>
        </div> 




      

    


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


