<?php 
include '../conexion_login/inicio_sesion.php';

echo "<script>


var Rol='$fila[1]';


</script>";
$rol=$fila[2];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/sweetalert2.css">
  <link rel="stylesheet" href="../../css/sweetalert2.min.css">
<link rel="stylesheet" href="../../css/menu.css">
<link rel="stylesheet" href="../../css/style.css">




    <!-- <script src="../../js/modernizr.custom.js"></script> -->
  <title>Smart administrator</title>
</head>
<body>

 <nav class="navbar navbar-default no-margin">
    <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header fixed-brand cabecera" >
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="menu-toggle">
                      <span class="icon icon-menu2" aria-hidden="true"></span>
                    </button>
                    <a class="navbar-brand" style="color: white" href="#"><i class="fa fa-rocket fa-4"></i>Smart administrator</a>        
                </div><!-- navbar-header-->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                             <!--    <li class="active"><button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2">
                                 <span class="icon icon-menu" aria-hidden="true"></span>
                                 </button></li> -->
                            </ul>
                </div><!-- bs-example-navbar-collapse-1 -->
    </nav>
    <div id="wrapper" class="">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">

                <li >
                    <a href="../inicio/index.php"><span class="icon  icon-home"><i class=""></i></span> Inicio</a>
                </li>
                <li>
                      <a href="../vender/index.php"><span class="icon   icon-coin-dollar"><i class=""></i></span> Vender</a>
                </li>
                <li>
  <a href="../vender/ventas.php"><span class="icon   icon-cart"><i class=""></i></span> Ventas</a>
                </li>
                           <li >
                    <a href="#"><span class="icon   icon-calendar"></span> Apartados<i class="icon  icon-circle-right"></i></a>
                       <ul class="nav-pills nav-stacked" style="list-style-type: none; display: none;">
                        <li><a href="../apartar/index.php">Apartar</a></li>
                        <li><a href="../apartar/ventas.php">Apartados</a></li>
                 
                    </ul>
                </li>
                <li class="Vendedor">
                    <a href="../productos/productos.php"><span class="icon     icon-glass2"><i class=""></i></span> Productos</a>
                </li>

                <li class="Vendedor">
                    <a href="#"><span class="icon  icon-database"></span>  Catalogos  <i class="icon  icon-circle-right"></i></a>
                       <ul class="nav-pills nav-stacked" style="list-style-type: none; display: none;">
                        <li><a href="../categorias/categorias.php">Categorias</a></li>
                        <!-- <li><a href="#">link2</a></li> -->
                    </ul>
                </li>
                <li class="Vendedor">
                    <a href="#"><span class="icon  icon-stats-bars"></span> Inventario  <i class="icon  icon-circle-right"></i></a>
                       <ul class="nav-pills nav-stacked" style="list-style-type: none; display: none;">
                        <li><a href="../inventario/inventario.php">Inventario</a></li>
                        <li><a href="../abastecer/abastecer.php">Abastecer</a></li>
                        <li><a href="../abastecer/reabastecimientos.php">Abastecimientos</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="#"><span class="icon icon-file-text2"></span> Reportes  <i class="icon  icon-circle-right"></i></a>
                       <ul class="nav-pills nav-stacked" style="list-style-type: none; display: none;">
<li><a href="../reportes/reporte_ventas.php">Ventas</a></li>
                        <li><a href="../reportes/reporte_inventario.php">Inventario</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#"><span class="icon  icon-cogs"></span> Administracion <i class="icon  icon-circle-right"></i></a>
                    <ul class="nav-pills nav-stacked" style="list-style-type: none; display: none;">
                        <li><a href="index.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Copia de Seguridad</a></li>
                         <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Cambiar Contraseña</a></li>
                           <li class="Vendedor"><a href="../configuracion/usuarios.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>Usuarios</a></li>   


                    </ul>
                </li>
                <li>
                    <a href="../conexion_login/cerrar_sesion.php"><span class="icon    icon-switch"><i class=""></i></span> Cerrar Sesion</a>
                </li>
            </ul>
        </div><!-- /#sidebar-wrapper -->
   <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
              
<div class="row">
  <div class="col-md-12">
    
    <h1 class="icon icon-user text-center">Cambiar Constraseña <?php echo "$fila[1]"; ?></h1>
  </div>
</div>


<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
          <div class="form-group">
          <br><br>
          <label for="dirreccion">Contraseña Actual</label>
          <div id="elemento_contraseña_actual">
            <input type="password" placeholder="Contraseña" name="contraseña_actual"  class="form-control filestyle"  id="contraseña_actual">
            <span class=""></span>
          </div>

        </div>
        </div>
</div>




<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="form-group">
          <label for="dirreccion">Contraseña Nueva</label>
          <div id="elemento_contraseña_nueva">
            <input type="password" name="contraseña_nueva"  class="form-control filestyle"  id="contraseña_nueva">
            <span class=""></span>
          </div>

        </div>
        </div>
</div>
     
  <div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
 <div class="form-group">
          <label for="dirreccion">Repita Contraseña</label>
          <div id="elemento_repita_contraseña">
            <input type="password" name="repita_contraseña"  class="form-control filestyle"  id="repita_contraseña">
            <span class=""></span>
          </div>

        </div>
        </div>
</div>

<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">

<input type="button" value="Actualizar" onclick="actualizar()" class="btn btn-primary form-control">
        </div>
</div>



</div>



    




       
 








<div class="col-md-12" id="contenedor">
  


</div>

                <span id="transmark" style="display: none; width: 0px; height: 0px;"></span>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

</body>
<style>
    .Productos{
        color: white;
        background:#23c5e2;
        border-radius: 5px;
    }

    .Productos a{
        /*background: #06a2c1;*/
text-decoration: none;
color: white;

    }

        .Productos .contenedor{
        background: #06a2c1;
text-decoration: none;
color: white;
margin: 0;
position: relative;



    }

        .Categorias{
        color: white;
        background:#f12b4c;
        border-radius: 5px;
    }

    .Categorias a{
        /*background: #06a2c1;*/
text-decoration: none;
color: white;

    }

        .Categorias .contenedor_categorias{
        background: #b73e52;
text-decoration: none;
color: white;
margin: 0;
position: relative;



    }

</style>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/jquery.js"></script>
  <script src="../../js/sweetalert2.js"></script>
  <script src="../../js/sweetalert2.min.js"></script>
   <script src="../../js/menu.js"></script>

</html>

<script>
$(document).ready(function(){
    $(document).bind("contextmenu", function(e){
        return false;
    });
});

$(document).ready(inicio);

function contraseña_igual() {


var contraseña_nueva=document.getElementById('contraseña_nueva').value;
var repita_contraseña=document.getElementById('repita_contraseña').value;


if (contraseña_nueva==repita_contraseña) {

return true;


}else{


return false;


}



}


function actualizar() {

if (validar_contraseña_actual()==true && validar_contraseña_nueva()==true && validar_repita_contraseña()==true) {


if (contraseña_igual()==true) { 



var contraseña_actual=document.getElementById('contraseña_actual').value;
var contraseña_nueva=document.getElementById('contraseña_nueva').value;
$('#contenedor').load('actualizar_contrasena.php',{Rol:Rol,contraseña_actual:contraseña_actual,contraseña_nueva:contraseña_nueva});



}else{

swal("ERROR","Contraseñas Diferentes","error");
var contraseña_nueva=document.getElementById('contraseña_nueva').value='';
var repita_contraseña=document.getElementById('repita_contraseña').value='';


}


}else{
  swal("ERROR","Algunos Campos Estan Vacios o Incorrectos Porfavor Reviselos","error");


}
}
  

function inicio() {



$('#usuario').keyup(validar_usuario);
$("#contraseña_actual").keyup(validar_contraseña_actual);
$("#contraseña_nueva").keyup(validar_contraseña_nueva);
$("#repita_contraseña").keyup(validar_repita_contraseña);
$(document).keyup(contraseña_igual);  
}


function validar_usuario () {
      var usuario=document.getElementById('usuario').value;
      if(usuario==null  || usuario.length==0 || /[\\^"'<>;ç`,-_ª%&¿¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(usuario)){
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_usuario").attr("class", "form-group has-error  has-feedback");
        $("#usuario").parent().children("span").text("").show();
        $("#usuario").parent().append('<span id="icono_texto" class="icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else if (isNaN(usuario)==false) {
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_usuario").attr("class", "form-group has-error has-feedback");
        $("#usuario").parent().children("span").text("").show();
        $("#usuario").parent().append('<span id="icono_texto" class="icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else if (usuario.length>30) {
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_usuario").attr("class", "form-group has-error has-feedback");
        $("#usuario").parent().children("span").text("").show();
        $("#usuario").parent().append('<span id="icono_texto" class=" icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else{


        $("#usuario").parent().children("span").text("").show();
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_usuario").attr("class", "form-group has-success has-feedback");
        $("#usuario").parent().append('<span id="icono_texto" class=" icon  icon-checkmark form-control-feedback"></span>');

        return true;
      }

}



    

 function validar_contraseña_actual () {

      var contraseña_actual=document.getElementById('contraseña_actual').value;
      if(contraseña_actual==null  || contraseña_actual.length==0 || /^\s+$/.test(contraseña_actual)){
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_contraseña_actual").attr("class", "form-group has-error  has-feedback");
        $("#contraseña_actual").parent().children("span").text("").show();
        $("#contraseña_actual").parent().append('<span id="icono_texto" class="icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else if (contraseña_actual.length>70) {
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_contraseña_actual").attr("class", "form-group has-error has-feedback");
        $("#contraseña_actual").parent().children("span").text("").show();
        $("#contraseña_actual").parent().append('<span id="icono_texto" class=" icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else{


        $("#email").parent().children("span").text("").show();
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_contraseña_actual").attr("class", "form-group has-success has-feedback");
        $("#contraseña_actual").parent().append('<span id="icono_texto" class=" icon  icon-checkmark form-control-feedback"></span>');

        return true;
      }

}


 function validar_contraseña_nueva () {

      var contraseña_nueva=document.getElementById('contraseña_nueva').value;
      if(contraseña_nueva==null  || contraseña_nueva.length==0 || /^\s+$/.test(contraseña_nueva)){
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_contraseña_nueva").attr("class", "form-group has-error  has-feedback");
        $("#contraseña_nueva").parent().children("span").text("").show();
        $("#contraseña_nueva").parent().append('<span id="icono_texto" class="icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else if (contraseña_nueva.length>70) {
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_contraseña_nueva").attr("class", "form-group has-error has-feedback");
        $("#contraseña_nueva").parent().children("span").text("").show();
        $("#contraseña_nueva").parent().append('<span id="icono_texto" class=" icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else{


        $("#contraseña_nueva").parent().children("span").text("").show();
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_contraseña_nueva").attr("class", "form-group has-success has-feedback");
        $("#contraseña_nueva").parent().append('<span id="icono_texto" class=" icon  icon-checkmark form-control-feedback"></span>');

        return true;
      }

}



function validar_repita_contraseña () {


      var repita_contraseña=document.getElementById('repita_contraseña').value;
      if(repita_contraseña==null  || repita_contraseña.length==0 || /^\s+$/.test(repita_contraseña)){
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_repita_contraseña").attr("class", "form-group has-error  has-feedback");
        $("#repita_contraseña").parent().children("span").text("").show();
        $("#repita_contraseña").parent().append('<span id="icono_texto" class="icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else if (repita_contraseña.length>70) {
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_repita_contraseña").attr("class", "form-group has-error has-feedback");
        $("#repita_contraseña").parent().children("span").text("").show();
        $("#repita_contraseña").parent().append('<span id="icono_texto" class=" icon icon-cancel-circle form-control-feedback"></span>');
        return false;

      }else{


        $("#repita_contraseña").parent().children("span").text("").show();
        $("#icono_texto").remove();//ACA ES PAFRA QUE NO SE REPITA LOS ICONOS CON EL ID DEL ESPAN QUE CREO CON EL OCONO
        $("#elemento_repita_contraseña").attr("class", "form-group has-success has-feedback");
        $("#repita_contraseña").parent().append('<span id="icono_texto" class=" icon  icon-checkmark form-control-feedback"></span>');

        return true;
      }

}




</script>

     <?php 
if ($rol=="Vendedor") {
   ?>


<style>
    .vendedor{

        display: none;
    }
</style>

   <?php 
}

 ?>



</body>


</html>