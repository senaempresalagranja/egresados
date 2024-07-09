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
<?php 

include 'Connet.php';

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
      Copia De Seguridad
    </title>
    <?php  include'../include/links.php';  ?>
  </head>
  <body class="sidebar-mini fixed" style="">
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
              <li><a class="click-pointer"><i class="active-icon fa fa-circle-o"></i>Copia De Seguridad</a></li>
              <li><a href="../Registrar/usuarios.php"><i class="fa fa-circle-o"></i> Configurar Usuarios</a></li>
            </ul>
          </li>
          
          <li class=""><a href="../manual_usuario/Manual_De_Usuario_SIE.pdf"><i class="fa fa-book"></i><span>Manual De Usuario</span></a></li>
        </ul>
      </section>
    </aside>
	 
          <!-- Contenido de la pagina -->
          <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="titulo-mayuscula">
            Crear Y restaurar Copia De Seguridad
          </h1>
        </div>
        <div class="col-md-12 text-center">
          <hr/>
        </div>
      </div>
            <div class="row">
              <div class="col-xs-12  col-md-6 col-lg-offset-3 formulario_pequeño" data-form-type="formoid">	
                <div class="col-xs-12  col-md-8 col-lg-offset-2">	
				  <h3 class="text-center titulo_section">Crear Copia de Seguridad</h3>
				</div>

				

				<div class="col-xs-12 box">

                  <button class="button button--antiman button--inverted-alt Registrar" title="Guardar" onclick="backup()" type="button" type="button"><i class="icon fa fa-database"></i><span>Crear Copia De Seguridad</span></button>
                </div>

  			  	<div id="contenedor"></div>

				<div class="col-xs-12  col-md-8 col-lg-offset-2">
				  <h3 class=" text-center titulo_section">Restaurar Copia de seguridad </h3>
				</div>



				<div class="col-xs-12  col-md-8 col-lg-offset-2">
				  <div class="form-group">
					<label class="form-control-label" for="">Seleciona un punto de restauracion</label>

					<select name="restaurar" id="restaurar" class="form-control">
					  <option value="Selecciona" >Selecciona</option>
						<?php
						  $ruta=BACKUP_PATH;
						  if(is_dir($ruta)){
				    		  if($aux=opendir($ruta)){
				        		  while(($archivo = readdir($aux)) !== false){
				            		  if($archivo!="."&&$archivo!=".."){
				                		  $nombrearchivo=str_replace(".sql", "", $archivo);
				                		  $nombrearchivo=str_replace("-", ":", $nombrearchivo);
				                		  $ruta_completa=$ruta.$archivo;
				                		  if(is_dir($ruta_completa)){
				                		  }else{
				                    echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
				                		  }
				            		  }
				        		  }
				        		  closedir($aux);
				    		  }
						  }else{
				    		  echo $ruta." No es ruta válida";
						  }
						?>
					</select>
				  </div>	
			    </div>

			    <div class="col-xs-12 text-center" id="contenedor2">
		          <h3  id="espere" style="font-weight: bold; font-size: 20px"> <i class="icons icon-spinner6 " style="color: #2196f3;"></i> Por favor Espere Restaurando Copia De Seguridad</h3>
				</div>

				
				<div class="col-xs-12 box">

                  <button class="button button--antiman button--inverted-alt Restaurar" title="Guardar" onclick="restaurar()" type="button"><i class="icon fa fa-refresh"></i><span>Restaurar Copia De Seguridad</span></button>
                </div>

			  </div>
		    </div>
	      </div>					

  
	

	<script>






var espere=document.getElementById('espere').style.display='none';
	
function restaurar() {

		var restaurar=document.getElementById('restaurar').value;
	if (restaurar=="Selecciona") {
swal({
  	title: 'Error!',
  	text: "Selecciona Un Punto de Restauracion",
  	type: 'error',
  	confirmButtonColor: '#ff9800'


	})


	}else{
var restaurar=document.getElementById('restaurar').value;
var espere=document.getElementById('espere').style.display='block';
$("#contenedor2").load("Restore.php",{restaurar:restaurar});
		
	}
}

function backup(){


$("#contenedor").load('Backup.php');
}

</script>

<?php include'../include/scripts.php'; ?>

<!-- para bloquear el clic derecho  -->
       <!-- <script>
         $(document).ready(function(){
    $(document).bind("contextmenu", function(e){
        return false;
    });
});

         
       </script>


para bloquear la combinacion de teclas
       <script>
         $(document).ready(function(){
    $(document).bind("keydown","Ctrl+shift+i", function(e){
        return false;
    });
});
	
	
         
    </script> -->
<?php
}
	else
{
	echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../../index.php?Acceso Denegado'</script>";
} 
?>
</body>	
</html>

