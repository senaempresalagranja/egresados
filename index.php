<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Sistema de informacion para la asistencia de tecnoparque">
  <meta name="keywords" content="HTML,CSS,JavaScript">
  <meta name="author" content="Alexis Espinosa Vidal">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIE - Sistema De Informacion Para Egresados</title>
  <link rel="shortcut icon" href="assets/img/SIE.png">
  <link rel="stylesheet" href="assets/css/components.css">
</head>
  <body class="body_margin" id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" style="margin-top: 0;">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a> -->
            </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
            <li class="hidden">
              <a class="page-scroll" href="#page-top"></a>
            </li>

            <li>
                <a class="page-scroll click-pointer"  onclick="Iniciar_sesion()">Iniciar Sesión</a>
            </li>

            <li>
                <a class="page-scroll click-pointer"  onclick="Instructores_Asesores()">Instructores Asesores</a>
            </li>

            <li>
                <a class="page-scroll click-pointer"  onclick="Aprendices_Desarrolladores()">Aprendices Desarrolladores</a>
            </li>

          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

    <div class="modal fade" id="Iniciar_sesion" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="caja-inicio-sesion">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <img class="logo-inicio-sesion" src="assets/img/user.png" >
            <h3 class="caja-inicio-sesion-titulo">Iniciar Sesión</h3>
          </div>


          <div class="modal-body">
            <form role="form" action="assets/conexion/sesion.php" method="post" id="formulario_login" autocomplete="off">
              <div class="form-group ">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                  <label class="form-control-label" for="usuario"><i class="fa fa-user"></i> Usuario</label>
                  <input class="form-control" type="text" name="usuario" id="usuario">
                </div>
              </div>

              <div class="form-group ">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                  <label class="form-control-label  " for="contrasena"> <i class="fa fa-key"></i> Contraseña</label>
                  <input class="form-control" type="password" name="contrasena" id="contrasena">
                </div>
              </div>

              <div class="modal-footer">
                <div class="col-xs-12" id="contenedor_login" style="text-align: center;"></div>
                <div class="box col-xs-12 ">

                  

                  <button class="button button--antiman button--inverted-alt Preterminado" value="Acceder" type="button" onclick="acceder()">
            <i class="icon fa fa-sign-in">
            </i>
            <span>
              Iniciar Sesion
            </span>
          </button>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="Instructores_Asesores" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h1 class="modal-title icon  icon-pen">  Instructores Asesores</h1>

      </div>
      <div class="modal-body">
        <div class="row">

<div class="col-md-12">
<div style=" overflow-y: auto; ">
  

<!-- <h3 style="text-align: center;">Ingenieros De Sistemas</h3> -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Titulo</th>
            <th>Universidad</th>
            <th>Especialización/Maestría</th>
            <th>Universidad</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Daniel Cardenas Lozano</td>
            <td>Ingeniero De Sistemas</td>
            <td>Antonio Nariño</td>
            <td>Auditoria De Sistemas</td>
            <td>Antonio Nariño</td>

        </tr>
        <tr>
            <td>Cindy Carolina Gamez Avila</td>
            <td>Ingeniera Agrícola </td>
            <td>Universidad Nacional</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Pablo Alejandro Hoyos  </td>
            <td>Contador Publico, Administrador De Empresas </td>
            <td>Universidad De Ibagué, Unad</td>
            <td>Derecho Comercial Y Financiero</td>
            <td>Universidad Católica De Colombia </td>
        </tr>


    </tbody>
</table>






</div>
</div>
</div>  

  
      </div>
         
   </div>
</div>

</div>


<div class="modal fade" id="Aprendices_Desarrolladores" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           <h1 class="modal-title icon  icon-pen">  Aprendices Desarrolladores </h1>

      </div>
      <div class="modal-body">
        <div class="row">

<div class="col-md-12">
<div style=" overflow-y: auto; ">
  

<!-- <h3 style="text-align: center;">Ingenieros De Sistemas</h3> -->



<!-- <h3 style="text-align: center;">Aprendizes Desarrolladores</h3>
<h4 style="text-align: center;">SIE</h4> -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tecnologo</th>
            <th>Ficha</th>
            <th>Año</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            
            <td>Joaquin Stiven Reyes Roa</td>
            <td>Tecnologo En Análisis y Desarrollo De Sistemas De Información</td>
            <td>1096123</td>
            <td>2016</td>

        </tr>
        <tr>
            <td>Alexi Espinosa Vidal</td>
            <td>Tecnologo En Análisis y Desarrollo De Sistemas De Información</td>
            <td>1096123</td>
            <td>2016</td>
        </tr>
       


    </tbody>
</table>



</div>
</div>
</div>  

  
      </div>
         
   </div>
</div>

</div>

    <!-- particles.js container -->
    <div id="particles-js"></div>

    <div class="center-div">


    <div class="texto_banner">
      <div class="logo">
        <img src="assets/img/SIE.png" style="width: 30%; margin-bottom: 20px;">
      </div>

      <h1>Sistema de Informacion para Egresados</1>
    </div>


    </div>



    <script src="assets/js/particles.min.js"></script>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>

    function Iniciar_sesion() {
    $("#Iniciar_sesion").modal("show");
}


function Instructores_Asesores() {
    $("#Instructores_Asesores").modal("show");
}

function Aprendices_Desarrolladores() {
    $("#Aprendices_Desarrolladores").modal("show");
}
//

function acceder() {
  var usuario=document.getElementById("usuario").value;
  var contrasena=document.getElementById("contrasena").value;

  $("#contenedor_login").load("assets/conexion/login.php", {usuario:usuario, contrasena:contrasena})
}






/* ---- particles.js config ---- */

particlesJS("particles-js", {
    "particles": {
        "number": {
            "value": 120,
            "density": {
                "enable": true,
                "value_area": 800
            }
        },
        "color": {
            "value": "#238276"
        },
        "shape": {
            "type": "circle",
            "polygon": {
                "nb_sides": 350
            },
        },
        "size": {
            "value": 2,
            "random": true,
            "anim": {
                "enable": false,
                "speed": 140,
                "size_min": 0.1,
                "sync": false
            }
        },
        "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#238276",
            "opacity": 0.4,
            "width": 1
        },
        "move": {
            "enable": true,
            "speed": 6,
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
                "enable": false,
                "rotateX": 600,
                "rotateY": 1200
            }
        }
    },
    "retina_detect": true
});
    </script>

    <style>
      body {
    width: 100%;
    height: 100%;
}

html {
    width: 100%;
    height: 100%;
}

@media(min-width:767px) {
    .navbar {
        padding: 20px 0;
        -webkit-transition: background .5s ease-in-out,padding .5s ease-in-out;
        -moz-transition: background .5s ease-in-out,padding .5s ease-in-out;
        transition: background .5s ease-in-out,padding .5s ease-in-out;
    }

    .top-nav-collapse {
        padding: 0;
    }
}




    </style>

    <style>
    .modal-footer{
      padding: 0;
      border-top: 0px solid transparent;
    }

      .intro-section {
    height: 100%;
    padding-top: 15em;
    padding-bottom:  18.4em;
    text-align: center;
    background: url(assets/img/wallhaven-355806.jpg);
    background-repeat: no-repeat;
    background-position: center;
}
.title{
  font-size: 10em;
  color: #fff;
  text-shadow: 0 7px 1px rgba(0, 0, 0, 0.35);
}
.sub_title{
  font-size: 2em;
  color: #fff;
}

.caja-inicio-sesion{
  margin: 1em 1em 0 1em ;
  text-align:center;
}
.logo-inicio-sesion{
  width: 10em;
}

.caja-inicio-sesion-titulo{
  margin: 0;
}


.navbar-default .navbar-nav>li>a {
    color: #fff;
    font-size: 16px;
}

.navbar-default {
    background-color: #238276;
    border-color: rgba(231, 231, 231, 0);
}

.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover{
    color: #fff;
    background-color: #fc7323;
}

.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
    color: #fff;
    background-color: transparent;
}










/*a {
  display: inline-block;
  margin: 0 5px;
  color: #fff;
}*/

    </style>
  </body>
</html>
