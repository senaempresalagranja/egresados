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
  <title>Registrar Egresado</title>
  <?php 
      include'../include/links.php'; 
    ?>
</head>
	<body class="sidebar-mini fixed">
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
              <li><a class="click-pointer"><i class="active-icon fa fa-circle-o"></i>Egresado</a></li>
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
  			<h1 class="titulo-mayuscula">Registro Egresado</h1>
  		</div>
  	</div>


  	<!-- --------------AQUI VIENEN TODOS LAS VENTANAS MODALES------- -->



  	<div id="asignar_ficha_programa" class="modal fade" role="dialog">
  		<div class="modal-dialog modal-lg">

  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4 class="modal-title">Seleccione la Operación a Realizar</h4>
  				</div>
  				<div class="modal-body">

  					<div class="container-fluid">

  						<div class="row box">
                <button class="button button--antiman button--inverted-alt Preterminado" type="button" onclick="mostrar_programa()" value="Agregar Programa de Formacion"><i class="icon fa fa-plus"></i><span> Programa Formación</span></button>

                
                <button class="button button--antiman button--inverted-alt Preterminado" type="button" onclick="mostrar_ficha()" value="Asignar Ficha a Programa de Formacion"><i class="icon fa fa-plus"></i><span>Asignar Ficha Programa</span></button>
              </div>
                
  							<div  id="contenedor_programa_formacion">
  								<div class="col-sm-offset-2">
  								<div class="row">
  									<div class="col-md-10">
                      <div class="form-group">
                      <label class="form-control-label">Programa de Formación</label>
  										<input type="text" name="" class="form-control" id="nuevo_programa_formacion">
                      </div>
  									</div>

  								</div>
  								<div class="row">
                    
  									<div class="col-md-5">
                      <div class="form-group">
  										<label class="form-control-label">Seleccione Tipo de Programa</label>
  										<select name="" class="form-control" id="tipo_programa" onchange="validar_tipo_programa()">
  											<option value="Seleccione">Seleccione</option>
  											<?php 



  											$query="SELECT `Id_Tipo_Programa`, `Tipo` FROM `tipo_programa`";
  											$resource=mysqli_query($conexion,$query);

  											while ($fila=mysqli_fetch_row($resource)) {
  												?>

  												<option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

  												<?php 
  											}

  											?>
  										</select>
                      </div>
  									</div>

  									<div class="col-md-5">
                      <div class="form-group">
  										  <label class="form-control-label">Duración de Programa (Meses)</label>
  										  <input type="number" class="form-control" name="" id="duracion_programa">
                      </div>
  									</div>

  								</div>
  								

  									
  								</div>
                  <div class="row box">

                      <button class="button button--antiman button--inverted-alt Registrar" type="button" value="Agregar Programa de Formacion" onclick="registrar_nuevo_programa()"><i class="icon fa fa-floppy-o"></i><span>Guardar</span></button>  

                    </div>
  							</div>

  							<div id="contenedor_asignar_ficha_programa" >
  								<div class="row">
  									<div class="col-md-4">
  										<label class="form-control-label">Ficha de Formación</label>
  										<select name="" class="form-control" id="ficha_formacion" onchange="validar_ficha_formacion()"></select>
  									</div>

  									<div class="col-md-4" id="contenedor_programas_asignacion"></div>

  								
  								
  									
  									<div class="col-md-4"> 
                      <div class="form-group">
                        <label class="form-control-label" for="">Fecha Ingreso</label> 
                        <input class="form-control" type="date" name="" id="fecha_ingreso">
                      </div>
                    </div>
                  </div> 
                  <div class="row">
  									<div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="">Fecha Fin</label> 
                        <input class="form-control" type="date" name="" id="fecha_fin">
                      </div>
                    </div>
  									<div class="col-md-4"> 
                      <div class="form-group">
                        <label class="form-control-label" for="">Matriculados</label> 
                        <input class="form-control" type="number" name="" id="matriculados">
                      </div>
                    </div>
  									<div class="col-md-4"> 
                      <div class="form-group">
                        <label class="form-control-label" for="">Certificados</label> 	
                        <input class="form-control" type="number" name="" id="graduados">
                      </div>
                    </div>
  								</div>
  								<div class="row">
  									<br>
  									<div class="col-md-12 box">
  										<!-- <input type="button" value="Asignar Ficha a Programa" onclick="registrar_asignacion()" class="btn btn-danger"> -->
                        
                      <button class="button button--antiman button--inverted-alt Registrar" type="button" value="Asignar Ficha a Programa" onclick="registrar_asignacion()"><i class="icon fa fa-floppy-o"></i><span>Guardar</span></button>  

  									</div>
  								</div>

  							</div>

  						</div>

  					</div>
  					<div class="modal-footer ocultar" >
  						<button type="button" class="btn btn-default" id="cerrar_modal_asignacion" data-dismiss="modal">Cerrar</button>
  					</div>
  				</div>

  			</div>
  		</div>

  		<!-- ---------------------------------------------------------------------------------------------------- -->

  		<div id="agregar_ficha" class="modal fade" role="dialog">
  			<div class="modal-dialog modal-md">

  				<!-- Modal content-->
  				<div class="modal-content">
  					<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Agregar Nueva Ficha</h4>
                  </div>
  					<div class="modal-body">


  						<div class="container-fluid">
  							<div class="row">
  								<div class="col-xs-12 col-md-6 col-sm-offset-3">
                    <div class="form-group">
                      <label for=""># de Ficha</label>
                      <input type="number" name="" class="form-control" id="nueva_ficha">
                    </div>
                    
  								</div>
  							</div>
  							<div class="row">
  								
  								<div class="col-md-12 box">
  									<button class="button button--antiman button--inverted-alt Registrar" type="button" value="Agregar Ficha" onclick="registrar_nueva_ficha()"><i class="icon fa fa-floppy-o"></i><span>Guardar</span></button>

  								</div>
  							</div>
  						</div>


  					</div>
  					<div class="modal-footer ocultar">
  						<button type="button" id="cerrar_modal_ficha" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  					</div>
  				</div>

  			</div>
  		</div>

  		<!-- ------------------------------------------------------------------------------------------------------------- -->

  		<div id="crear_empresa" class="modal fade" role="dialog">
  			<div class="modal-dialog modal-md">

  				<!-- Modal content-->
  				<div class="modal-content">
  					<div class="modal-header">
  						<button type="button" class="close" data-dismiss="modal">&times;</button>
  						<h4 class="modal-title">Agregar Nueva Empresa</h4>
  					</div>
  					<div class="modal-body">

  						<div class="container-fluid">
  							<div class="row">
  								<div class="col-md-6">
                    <div class="form-group">
  									<label class="form-control-label" for="">Nit</label>
  									<input type="number" name="" class="form-control" id="Nit_Empresa">
                    </div>
  								</div>

  								<div class="col-md-6">
                    <div class="form-group">
  									<label class="form-control-label" for="">Nombre Empresa</label>
  									<input type="text" name="" class="form-control" id="nombredeempresa">
                    </div>
  								</div>
  							</div>
  							<div class="row">
  								<div class="col-md-12 text-center">
  									<h4 class="help-block">Ubicación EMPRESA</h4>
  									<hr>
  								</div>
  							</div>
  							<div class="row">
  								<div class="col-md-6">
                    <div class="form-group">
  									<label class="form-control-label">Departamento</label>
  									<select name="" id="Id_Departamento_empresa" onchange="validar_departamento_empresa()" class="form-control">
  										<option value="Seleccione">Seleccione</option>
  										<?php 
  										$query="SELECT * FROM `departamentos`";
  										$resource=mysqli_query($conexion,$query);
  										while ($fila=mysqli_fetch_row($resource)) {
  											?>
  											<option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

  											<?php 
  										}

  										?>
  									</select>
                  </div>
  								</div>
  								<div class="col-md-6">
  									<label class="form-control-label">Municipio</label>
  									<div id="" class="form-group">
  										<select id="Id_Municipio_empresa" class="form-control" onchange="validar_municipio_empresa()">
  											<option value="Seleccione">Seleccione</option>
  										</select>		
  									</div>

  								</div>
  							</div>
  							<div class="row box">


                  <button class="button button--antiman button--inverted-alt Registrar" type="button" id="boton_registrar_asociacion_programa_ficha" onclick="registrar_nueva_empresa()" value="Registrar Nueva Empresa"><i class="icon fa fa-edit"></i><span>Guardar</span></button>
  							</div>

  						</div>

  					</div>
  					<div class="modal-footer ocultar">
  						<button type="button" id="cerrar_modal_empresa" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  					</div>
  				</div>

  			</div>
  		</div>

  		<!-- <---------------------------------------------------------------------------------------------->




  		<div id="crear_universidad" class="modal fade" role="dialog">
  			<div class="modal-dialog modal-md">

  				<!-- Modal content-->
  				<div class="modal-content">
  					<div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Agregar Nueva Universidad</h4>
            </div>
  					<div class="modal-body">

  						<div class="container-fluid">
  							<div class="row">
  								<div class="col-md-12">
                    <div class="form-group">
  									  <label for="Nombre_universidad" class="form-control-label">Nombre de la Universidad</label>
  									  <input type="text" class="form-control" id="Nombre_universidad">
                    </div>
  								</div>
  							</div>

  							<div class="row">
  								<div class="col-md-12">
                    <div class="form-group">
  									  <label for="Id_Departamento_universidad" class="form-control-label">Seleccione Departamento</label>
  									  <select name="" id="Id_Departamento_universidad" onchange="validar_departamento_universidad()" class="form-control">
  										  <option value="Seleccione">Seleccione</option>
  										  <?php 
  										  $query="SELECT * FROM `departamentos`";
  										  $resource=mysqli_query($conexion,$query);
  										  while ($fila=mysqli_fetch_row($resource)) {
  											?>
  											<option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

  											<?php 
  										}

  										?>
  									 </select>
                    </div>

  								</div>
  								<div class="col-md-12">
                    <div id="" class="form-group">
                      <label for="Id_Municipio_universidad">Seleccione Municipio</label>
  										<select name="" id="Id_Municipio_universidad" onchange="validar_Id_Municipio_universidad()" class="form-control">
  											<option value="Seleccione">Seleccione</option>
  										</select>		
  									</div>

  								</div>
  							</div>
  							<div class="row box">
  								

                  <button class="button button--antiman button--inverted-alt Registrar" type="button" id="boton_registrar_asociacion_programa_ficha" onclick="registrar_universidad()" value="Registrar Nueva Empresa">
                    <i class="icon fa fa-floppy-o"></i><span>Guardar</span>
                  </button>
                
  							</div>

  							<div id="contenedor_universidad"></div>
  						</div>

  					</div>
  					<div class="modal-footer ocult">
  						<button type="button" id="cerrar_modal_universidad" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  					</div>
  				</div>

  			</div>
  		</div>


  		<!-- --------------AQUI TERMINA TODAS LAS VENTANAS MODALES------------- -->

      <div class="col-xs-12">

        <div class="bs-component">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#Datos-Basicos-Egresados" data-toggle="tab"><i class="icons icon-info8"></i> Datos Básicos</a></li>
            <li><a href="#Datos-Programa-Egresados" data-toggle="tab"><i class="icons icon-earth-globe"></i> Datos Programa</a></li>
            <li><a href="#Datos-EtapaPractica-Egresados" data-toggle="tab"><i class="icons icon-earth-globe"></i> Etapa Practica</a></li>
            <li><a href="#Datos-Situacions-Egresados" data-toggle="tab"><i class="icons icon-earth-globe"></i> Datos Situación</a></li>
            <li><a href="#Se-Contacto" data-toggle="tab"><i class="icons icon-earth-globe"></i>Se Contacto?</a></li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="Datos-Basicos-Egresados">
              <div id="contenedor_datos_basicos">

        <div class="row">
          <br>
          <div class="col-md-12 text-center">
            <h3 class="help-block">Datos Básicos </h3>
            <hr></div>  
          </div>

          <div class="row">
            <div class="col-md-2">
              <label class="form-control-label">Tipo de Documento</label>
              <select name="" id="Tipo_Doc" class="form-control" onchange="validar_Tipo_Doc()">
                <option value="Seleccione">Seleccione</option>
                <option value="TI">TARJETA IDENTIDAD</option>
                <option value="CC">CEDULA DE CIUDADANIA</option>
                <option value="CE">CEDULA EXTRANJERA</option>

              </select>
            </div>
            <div class="col-md-2">
              <label class="form-control-label">Numero Documento</label>
              <input type="number" name="" id="Numero_Documento"  class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-control-label">Nombre Egresado</label>
              <input type="text" name="" id="Nombre_Egresado" class="form-control"></div>

              <div class="col-md-4">
                <label class="form-control-label">Apellido Egresado</label>
                <input type="text" name="" id="Apellido_Egresado" class="form-control"></div>
              </div>
              <div class="row">
                <br>
                <div class="col-md-3">

                  <label class="form-control-label">Departamento Residencia</label>
                  <select name="" id="Id_Departamento" onchange="validar_departamento()" class="form-control">
                    <option value="Seleccione">Seleccione</option>
                    <?php 
                    $query="SELECT * FROM `departamentos`";
                    $resource=mysqli_query($conexion,$query);
                    while ($fila=mysqli_fetch_row($resource)) {
                      ?>
                      <option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

                      <?php 
                    }

                    ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <label class="form-control-label">Municipio Residencia</label>
                  <div id="">
                    <select name="" id="Id_Municipio" onchange="validar_Id_Municipio()" class="form-control">
                      <option value="Seleccione">Seleccione</option>
                    </select>   
                  </div>

                </div>
                <div class="col-md-4">
                  <label class="form-control-label">Correo Electrónico</label>
                  <input type="Text" name="" id="Correo" class="form-control"></div>

                  <div class="col-md-2">
                    <label class="form-control-label">Teléfono Fijo</label>
                    <input type="number" name="" id="Telefono" class="form-control"></div>
                  </div>

                  <div class="row">
                    <br>
                    <div class="col-md-2">
                      <label class="form-control-label">Teléfono Alterno</label>
                      <input type="number" name="" id="Telefono_2" class="form-control"></div>

                      <div class="col-md-2">
                        <label class="form-control-label">Teléfono Celular</label>
                        <input type="number" name="" id="Celular" class="form-control"></div>

                        <div class="col-md-3">
                          <label class="form-control-label">Facebook</label>
                          <input type="text" name="" id="Facebook" class="form-control"></div>

                          <div class="col-md-2">
                            <label class="form-control-label">Sexo</label>
                            <select name="" id="Sexo" onchange="validar_Sexo()" class="form-control">
                              <option value="Seleccione">Seleccione</option>
                              <option value="M">M</option>
                              <option value="F">F</option>
                            </select>
                          </div>

                          <div class="col-md-3">
                            <label class="form-control-label">Fecha de Nacimiento</label>
                            <input type="date" name="" id="fecha_nacimiento" class="form-control" >
                          </div>


                        </div>
                        <div class="row">
                          <br>
                          <div class="col-md-12 box">



<button class="button button--antiman button--inverted-alt Registrar" type="button" id="boton_registrar_egresado" onclick="registrar_datos_basicos()" value="REGISTRAR EGRESADO"><i class="icon fa fa-floppy-o "></i><span>Guardar</span></button>


<button class="button button--antiman button--inverted-alt Actualizar" type="button" id="boton_actualizar_egresado" onclick="actualizar_datos_basicos()" value="ACTUALIZAR EGRESADO"><i class="icon fa fa-refresh"></i><span>Actualizar</span></button>




                          </div>
                        </div>

                      </div>

            </div>
            <div class="tab-pane fade " id="Datos-Programa-Egresados">
              <div id="contenedor_datos_programa">
                        <div class="row">
                          <br>
                          <div class="col-md-12 text-center">
                            <h3 class="help-block">Datos Programa formación</h3>
                            <hr></div>  
                          </div>  
                          <div class="row">
                          
                            <div class="col-md-2">
                              <label for="Numero_Ficha"># de Ficha</label>
                              <div class="input-group">
                                <input type="number" name="" id="Numero_Ficha" aria-describedby="basic-addon2" class="form-control">

                                <span class="input-group-addon" style="cursor: pointer" onclick="copiar()"  data-toggle="modal" data-target="#agregar_ficha"  title="Agregar Nueva Ficha"><i class="fa fa-plus"></i></span>


                              </div>  

                            </div>

                            <div class="col-md-6">
                              <label for="Nombre_Programa">Programa De Formación</label>
                              <div class="input-group">
                                <input type="button" name="" id="Nombre_Programa" class="form-control">
                                <span class="input-group-addon" style="cursor: pointer" onclick="copiar1()"  data-toggle="modal" data-target="#asignar_ficha_programa"  title="Asignar Ficha a Programa"><i class="fa fa-plus"></i></span>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label class="form-control-label">Fecha Certificación</label>
                              <input type="date" name="" id="fecha_certificacion" class="form-control" ></div>


                            </div>

                            <div class="col-xs-12 box">
                              


<button class="button button--antiman button--inverted-alt Registrar" type="button" id="boton_registrar_asociacion_programa_ficha"  onclick="registrar_asociacion_egresado_ficha()" value="REGISTRAR ASOCIACION"><i class="icon fa fa-floppy-o"></i><span>Guardar</span></button>

<button class="button button--antiman button--inverted-alt Actualizar" type="button" id="boton_actualizar_asociacion_programa_ficha"  onclick="actualizar_asociacion_egresado_ficha()" value="ACTUALIZAR ASOCIACION"><i class="icon fa fa-refresh"></i><span>Actualizar</span></button>

                            </div>

                            <div class="row">
                              <div class="col-md-12 text-center">
                                <h3 class="help-block">Programas De Formación Realizados</h3>
                                <hr>
                              </div>
                            </div>

                            <!-- <div class="row">
                              <div class="col-md-2"><b># FICHA</b></div>
                              <div class="col-md-4"><b>PROGRAMA FORMACION</b></div>
                              <div class="col-md-3"><b>FECHA DE CERTIFICACION</b></div>
                              <div class="col-md-1"></div>



                            </div>
                            <div id="contenedor_programas_realizados_egresados" style="width: 100%; height: 150px;  ">
                          
                            </div> -->

                            <div class="row">
        
          
            <table class="table">
              <thead>
                <tr>
                  <!-- <th class="col-xs-9">Departamento</th><th class="col-xs-3">Actualizar</th> -->
                  <th>
                    # Ficha
                  </th>
                  <th >
                    Programa De Formación 
                  </th>
                  <th >
                    Fecha Certificación
                  </th>
                  <th >
                    Actualizar
                  </th>
                 <!--  <th class="col-xs-2">
                    Matriculados
                  </th>s
                  <th class="col-xs-2">
                    Graduados
                  </th> -->
                  <!-- <th class="col-xs-1">
                    Actualizar
                  </th> -->
                </tr>
              </thead>
              <tbody id="contenedor_programas_realizados_egresados">
              </tbody>
            </table>
          
       
      </div> 
                          </div>

            </div>
            <div class="tab-pane fade" id="Datos-EtapaPractica-Egresados">
              <div id="contenedor_tipo_etapa_practica">

                            <div class="row">
                              <br>
                              <div class="col-md-12 text-center">
                                <h3 class="help-block">Datos Etapa Practica</h3>
                                <hr></div>  
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <label for="Id_Tipo_Etapa_Practica">Tipo Etapa Practica</label>
                                  <select name="" id="Id_Tipo_Etapa_Practica" class="form-control" onchange="validar_tipo_etapa_practica()">
                                    <option value="Seleccione">Seleccione</option>
                                    <?php 
                                    $query="SELECT `Id_Tipo_Etapa_Practica`, `Nombre_Etapa` FROM `tipo_etapa_practica`";
                                    $resource=mysqli_query($conexion,$query);
                                    while ($fila=mysqli_fetch_row($resource)) {
                                      ?>
                                      <option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

                                      <?php 
                                    }

                                    ?>
                                  </select>
                                </div>
                                <div id="nombre_empresa">
                                  <div class="form-group">
                                  <label for="id_empresa_etapa" class="form-control-label">Seleccione Empresa</label>
                                  <div class="input-group">
                                    
                                    <select name="" class="form-control" id="id_empresa_etapa" onchange="validar_id_empresa_etapa()">
                                      <option value="Seleccione">Seleccione</option>
                                      <?php 
                                      $query="SELECT `id_Empresa`, `Nombre_Empresa`, `Nit_Empresa` FROM `empresa`";
                                      $resource=mysqli_query($conexion,$query);
                                      while ($fila=mysqli_fetch_row($resource)) {
                                        ?>
                                        <option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

                                        <?php 
                                      }

                                      ?>
                                    </select>
                                    <span class="input-group-addon" style="cursor: pointer"   data-toggle="modal" data-target="#crear_empresa"  title="Crear Empresa"><i class="fa fa-plus"></i></span>
                                  </div>
                                  </div>


                                </div>

                                <div class="col-md-4" id="nombre_proyecto">
                                  <div class="form-group">
                                  <label for="Nombre_del_Proyecto" class="form-control-label">Nombre del Proyecto</label>
                                  <input type="text" name="" class="form-control" id="Nombre_del_Proyecto">
                                  </div>
                                </div>



                              </div>
                                  <div class="row">
                              <br>



<button class="button button--antiman button--inverted-alt Registrar" type="button" id="boton_registrar_asociacion_etapa_practica" onclick="registrar_asociacion_etapa_practica_egresado()" value="REGISTRAR ASOCIACION"><i class="icon fa fa-floppy-o"></i><span>Guardar </span></button>




<button class="button button--antiman button--inverted-alt Actualizar" type="button" id="boton_actualizar_asociacion_etapa_practica" onclick="actualizar_asociacion_etapa_practica_egresado()" value="ACTUALIZAR ASOCIACION"><i class="icon fa fa-refresh"></i><span>Actualizar </span></button>
                            </div>
                                <div class="row">
                              <div class="col-md-12 text-center">
                                <h3 class="help-block">Etapas Practicas Realizadas</h3>
                                <hr>
                              </div>
                            </div>

                          


                            <div class="row">
        
      
     

              
  <table class="table">
    <thead>
      <tr>
        <th>Programa Formación</th>
        <th>Tipo Etapa Practica</th>
        <th>Detalles</th>
        <th>Actualizar</th>
      </tr>
    </thead>
    <tbody id="contenedor_etapas_realizadas_egresados">
      
    </tbody>
  </table>

</div>

                            </div>

            </div>
            <div class="tab-pane fade" id="Datos-Situacions-Egresados">
              <div id="contenedor_situacion_laboral">

                              <div class="row">
                                <br>
                                <div class="col-md-12 text-center">
                                  <h3 class="help-block">Datos Situación Laboral Actual</h3>
                                  <hr></div>  
                                </div>


                                <div class="row">

                                  <div class="col-md-3">
                                    <div class="form-group">
                                    
                                    <label for="Id_Situacion">Situación Laboral</label>
                                    <select name="" id="Id_Situacion" class="form-control" onchange="validar_situcion_laboral()">
                                      <option value="Seleccione">Seleccione</option>
                                      <?php 
                                      $query="SELECT `Id_Situacion`, `Nombre_Situacion` FROM `situacion`";
                                      $resource=mysqli_query($conexion,$query);
                                      while ($fila=mysqli_fetch_row($resource)) {
                                        ?>
                                        <option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

                                        <?php 
                                      }

                                      ?>
                                    </select>
                                  </div>
                                  </div>

                                  <div  id="estudiando">
                                    
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label class="form-control-label">Nombre Carrera</label>
                                        <input type="text" class="form-control" name="" id="nombre_carrera">
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                      <label class="form-control-label">Universidad</label>
                                      <div class="input-group">
                                        <select name="" class="form-control" id="id_universidad" onchange="validar_id_universidad()">
                                          <option value="Seleccione">Seleccione</option>
                                          <?php 
                                          $query="SELECT `Id_universidad`, `Nombre_universidad`FROM `universidades`";
                                          $resource=mysqli_query($conexion,$query);
                                          while ($fila=mysqli_fetch_row($resource)) {
                                            ?>
                                            <option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

                                            <?php 
                                          }

                                          ?>
                                        </select>
                                        <span class="input-group-addon" style="cursor: pointer"   data-toggle="modal" data-target="#crear_universidad"  title="Crear Universidad"><i class="fa fa-plus"></i></span>
                                      </div>
                                    </div>
                                    </div>
                                  </div>

                                  <div id="trabajando">
                                    <div class="col-md-3" id="">
                                      <div class="form-group">
                                      
                                      <label class="form-control-label">Empresa </label>
                                      <div class="input-group">
                                        
                                        <select name="" class="form-control" id="id_empresa" onchange="validar_id_empresa()">
                                          <option value="Seleccione">Seleccione</option>
                                          <?php 
                                          $query="SELECT `id_Empresa`, `Nombre_Empresa`, `Nit_Empresa` FROM `empresa`";
                                          $resource=mysqli_query($conexion,$query);
                                          while ($fila=mysqli_fetch_row($resource)) {
                                            ?>
                                            <option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

                                            <?php 
                                          }

                                          ?>
                                        </select>
                                        <span class="input-group-addon" style="cursor: pointer"   data-toggle="modal" data-target="#crear_empresa"  title="Crear Empresa"><i class="fa fa-plus"></i></span>
                                      </div>

                                    </div>
                                  </div>

                                    <div class="col-md-3" id="">
                                      <div class="form-group">
                                        <label class="form-control-label">Función Que Desempeña </label>
                                        <input type="text" class="form-control" name="" id="Funcion_Desempeña">
                                      </div>  
                                    </div>
                                    <div class="col-md-3" id="">
                                      <div class="form-group">
                                      <label class="form-control-label">La función que desempeña tiene Relación Con Su Programa De Formación</label>
                                      <select name="" class="form-control" id="relacion_programa" onchange="validar_relacion_programa()">
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                      </select>
                                    </div>
                                    </div>
                                  </div>

                                </div>
                                <div class="row" id="trabajando1">
                                  <br>
                                  <div class="col-md-3">
                                    <label class="form-control-label">Salario</label>
                                    <input class="form-control" type="number" name="" id="salario" value="0">
                                  </div>

                                  <div class="col-md-3">
                                    <label class="form-control-label">Intensidad Horaria</label>
                                    <select name="" id="intensidad_horaria" onchange="validar_intensidad_horaria()" class="form-control">
                                      <option value="Selecciona">Selecciona</option>
                                      <option value="Medio">Medio Tiempo</option>
                                      <option value="Completo">Tiempo Completo</option>
                                      <option value="Horas">Por Horas</option>
                                    </select>
                                  </div>
                                </div>

                                                                 <div class="row">
                              <br>



<button class="button button--antiman button--inverted-alt Registrar" type="button" id="boton_registrar_asociacion_situacion_laboral" onclick="registrar_asociacion_situacion_laboral_egresado()" value="REGISTRAR SITUACION"><i class="icon fa fa-floppy-o"></i><span>Guardar</span></button>



<button class="button button--antiman button--inverted-alt Actualizar" type="button" id="boton_actualizar_asociacion_situacion_laboral" onclick="actualizar_asociacion_situacion_laboral_egresado()" value="ACTUALIZAR SITUACION"><i class="icon fa fa-refresh"></i><span>Actualizar</span></button>


                            </div>
                                 <div class="row">
                              <div class="col-md-12 text-center">
                                <h3 class="help-block">Situaciones Laborales</h3>
                                <hr>
                              </div>
                            </div>
<!--
                            <div class="row">
                              <div class="col-md-3"><b>SITUACION</b></div>
                              <div class="col-md-3"><b>LUGAR</b></div>
                              <div class="col-md-3"><b>DETALLES</b></div>
                              <div class="col-md-1"></div>
                            </div>

                            <div id="contenedor_situaciones_laborales_realizadas" style="width: 100%; height: 150px;  ">
                          
                            </div> -->

<table class="table">
    <thead>
      <tr>
         <th>Situación</th>
        <th>Lugar</th>
        <th>Detalles</th>
      </tr>
    </thead>
    <tbody id="contenedor_situaciones_laborales_realizadas">
      
    </tbody>
  </table>
                              </div>


        

            </div>
            <div class="tab-pane fade" id="Se-Contacto">
              <div id="contenedor_contactado">

    <div class="row ">
    <br>

    <div class="col-md-12 text-center">
                                  <h3 class="help-block">Egresado Contactado</h3>
                                  <hr></div>  
                                </div>
    <div class="col-md-5">
      <label class="form-control-label" >Egresado Fue Contactado?</label>
      <select name="" id="contactado" class="form-control" onchange="validar_contactado()">
        <option value="Seleccione">Seleccione</option>
        <option value="Si">Si</option>
        <option value="No">No</option>
      </select>
    </div>

    <div class="row">
                              <br>



<button class="button button--antiman button--inverted-alt Registrar" type="button" id="boton_registrar_contactado" onclick="registrar_contactado()" value="REGISTRAR"><i class="icon fa fa-floppy-o"></i><span>Guardar</span></button>


                        <div id="conetendor_contacr"></div>
                            </div>
  </div>
</div>

            </div>
          </div>
        </div>
                  
      </div>




  		


  													</div>


  												</div>
  												<script src="../../../assets/js/bootstrap.min.js"></script>
  												<script src="../../../assets/js/jquery-3.2.1.min.js"></script>
  												<div id="contenedor"></div>

  												<script>

function registrar_contactado() {
    
    var contactado=document.getElementById("contactado").value;
    $("#conetendor_contacr").load("registrar_contactado.php",{contactado:contactado,id_egresado:id_egresado})
  }

  function registrar_asociacion_situacion_laboral_egresado() {
    
    if (validar_situcion_laboral()==true) {


      var Id_Situacion=document.getElementById("Id_Situacion").value;

      if (Id_Situacion==3) {

        if (validar_nombre_carrera()==true && validar_id_universidad()==true) {


// DATOS SITUACION
var Id_Situacion=document.getElementById("Id_Situacion").value;
var nombre_carrera=document.getElementById("nombre_carrera").value;
var id_universidad=document.getElementById("id_universidad").value;


var id_empresa=document.getElementById("id_empresa").value;
var Funcion_Desempeña=document.getElementById("Funcion_Desempeña").value;
var relacion_programa=document.getElementById("relacion_programa").value;
var salario=document.getElementById("salario").value;
var intensidad_horaria=document.getElementById("intensidad_horaria").value;


$("#contenedor_situaciones_laborales_realizadas").load("registrar_asociacion_situacion_laboral_egresado.php",{Id_Situacion:Id_Situacion,nombre_carrera:nombre_carrera,id_universidad:id_universidad,id_empresa:id_empresa,Funcion_Desempeña:Funcion_Desempeña,relacion_programa:relacion_programa,salario:salario,intensidad_horaria:intensidad_horaria,id_egresado:id_egresado});

}else{

  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
}

}else if (Id_Situacion==2) {

// AQUI VALIDO CUANDO LA SITUACION LABORAL ES trabajando
// ---------------------------------------------------------------
if (validar_id_empresa()==true && validar_Funcion_Desempeña()==true && validar_relacion_programa()==true && validar_intensidad_horaria()==true) {

// if (validar_id_empresa()==true && validar_Funcion_Desempeña()==true && validar_relacion_programa()==true && validar_salario()==true && validar_intensidad_horaria()==true) {


// DATOS SITUACION
var Id_Situacion=document.getElementById("Id_Situacion").value;
var nombre_carrera=document.getElementById("nombre_carrera").value;
var id_universidad=document.getElementById("id_universidad").value;


var id_empresa=document.getElementById("id_empresa").value;
var Funcion_Desempeña=document.getElementById("Funcion_Desempeña").value;
var relacion_programa=document.getElementById("relacion_programa").value;
var salario=document.getElementById("salario").value;
var intensidad_horaria=document.getElementById("intensidad_horaria").value;



$("#contenedor_situaciones_laborales_realizadas").load("registrar_asociacion_situacion_laboral_egresado.php",{Id_Situacion:Id_Situacion,nombre_carrera:nombre_carrera,id_universidad:id_universidad,id_empresa:id_empresa,Funcion_Desempeña:Funcion_Desempeña,relacion_programa:relacion_programa,salario:salario,intensidad_horaria:intensidad_horaria,id_egresado:id_egresado});

}else{
  // swal("ERROR", "Agunos Campos Estan vacios o Incorrectos",'error');
  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
}


}else{
// DATOS SITUACION
var Id_Situacion=document.getElementById("Id_Situacion").value;
var nombre_carrera=document.getElementById("nombre_carrera").value;
var id_universidad=document.getElementById("id_universidad").value;


var id_empresa=document.getElementById("id_empresa").value;
var Funcion_Desempeña=document.getElementById("Funcion_Desempeña").value;
var relacion_programa=document.getElementById("relacion_programa").value;
var salario=document.getElementById("salario").value;
var intensidad_horaria=document.getElementById("intensidad_horaria").value;



$("#contenedor_situaciones_laborales_realizadas").load("registrar_asociacion_situacion_laboral_egresado.php",{Id_Situacion:Id_Situacion,id_egresado:id_egresado});

}

}else{
  // swal("ERROR", "Agunos Campos Estan vacios o Incorrectos",'error');


  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
}


}

function situaciones_laborales_realizadas() {
  $('#contenedor_situaciones_laborales_realizadas').load('mostrar_situaciones_laborales_realizadas.php',{id_egresado:id_egresado});
}

function actualizar_asociacion_etapa_practica_egresado() {
  
  var Id_Tipo_Etapa_Practica=document.getElementById("Id_Tipo_Etapa_Practica").value;
  var id_empresa_etapa=document.getElementById("id_empresa_etapa").value;
  var Nombre_del_Proyecto=document.getElementById("Nombre_del_Proyecto").value;
  $("#contenedor").load("actualizar_asociacion_etapa_practica_egresado.php",{Id_Tipo_Etapa_Practica:Id_Tipo_Etapa_Practica,id_empresa_etapa:id_empresa_etapa,Nombre_del_Proyecto:Nombre_del_Proyecto,Id_asociacion_egresados_etapa_practica:Id_asociacion_egresados_etapa_practica})
}

function registrar_asociacion_etapa_practica_egresado() {
  
  // DATOS ETAPA PRACTICA
  var Id_Tipo_Etapa_Practica=document.getElementById("Id_Tipo_Etapa_Practica").value;
  var id_empresa_etapa=document.getElementById("id_empresa_etapa").value;
  var Nombre_del_Proyecto=document.getElementById("Nombre_del_Proyecto").value;

  $("#contenedor").load("registrar_asociacion_etapa_practica_egresado.php",{Id_Tipo_Etapa_Practica:Id_Tipo_Etapa_Practica,id_empresa_etapa:id_empresa_etapa,Nombre_del_Proyecto:Nombre_del_Proyecto,Id_asociacion_egresados:Id_asociacion_egresados})
}


function mostrar_etapas_practicas_egresados() {
  
  $("#contenedor_etapas_realizadas_egresados").load("mostrar_etapas_realizadas.php",{id_egresado:id_egresado});

}


function actualizar_asociacion_egresado_ficha() {
  
  if (validar_Numero_Ficha()==true && validar_programa_formacion==true &&  validar_fecha_certificacion()==true) {


    var fecha_certificacion=document.getElementById("fecha_certificacion").value;


    $("#contenedor").load("actualizar_asociacion_egresado_ficha.php",{Id_asociacion_egresados:Id_asociacion_egresados,id_egresado:id_egresado,id_programa_ficha:id_programa_ficha,fecha_certificacion:fecha_certificacion})



  }else{

    // swal("Llene Todos los campos",'','error');
    swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })

  }


}                            

function registrar_asociacion_egresado_ficha() {
  
  if (validar_Numero_Ficha()==true && validar_programa_formacion==true &&  validar_fecha_certificacion()==true) {


    var fecha_certificacion=document.getElementById("fecha_certificacion").value;


    $("#contenedor").load("registrar_asociacion_egresado_ficha.php",{id_egresado:id_egresado,id_programa_ficha:id_programa_ficha,fecha_certificacion:fecha_certificacion})



  }else{

    // swal("Llene Todos los campos",'','error');
    swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })

  }


}



function mostrar_programas_realizados() {

  $('#contenedor_programas_realizados_egresados').load('mostrar_programas_realizados.php',{id_egresado:id_egresado});
}


function registrar_datos_basicos() {
  
  if (validar_Tipo_Doc()==true && validar_Numero_Documento()==true && validar_Nombre_Egresado()==true && validar_Apellido_Egresado()==true &&  validar_Id_Municipio()==true && validar_Sexo()==true) {

    // && validar_fecha_nacimiento()==true

  // DATOS APRENDIZ
  var Tipo_Doc=document.getElementById("Tipo_Doc").value;
  var Numero_Documento=document.getElementById("Numero_Documento").value;
  var Nombre_Egresado=document.getElementById("Nombre_Egresado").value;
  var Apellido_Egresado=document.getElementById("Apellido_Egresado").value;
  var Id_Municipio=document.getElementById("Id_Municipio").value;
  var Correo=document.getElementById("Correo").value;
  var Telefono=document.getElementById("Telefono").value;
  var Telefono_2=document.getElementById("Telefono_2").value;
  var Celular=document.getElementById("Celular").value;
  var Facebook=document.getElementById("Facebook").value;
  var Sexo=document.getElementById("Sexo").value;
  var fecha_nacimiento=document.getElementById("fecha_nacimiento").value;

  $("#contenedor").load("registrar_datos_basicos.php",{Tipo_Doc:Tipo_Doc,Numero_Documento:Numero_Documento,Nombre_Egresado:Nombre_Egresado,Apellido_Egresado:Apellido_Egresado,Id_Municipio:Id_Municipio,Correo:Correo,Telefono:Telefono,Telefono_2:Telefono_2,Celular:Celular,Facebook:Facebook,Sexo:Sexo,fecha_nacimiento:fecha_nacimiento});

}else{

  // swal("Llene Todos los campos",'','error')
  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })

}
}


function actualizar_datos_basicos() {
  
  if (validar_Tipo_Doc()==true && validar_Numero_Documento()==true && validar_Nombre_Egresado()==true && validar_Apellido_Egresado()==true &&  validar_Id_Municipio()==true && validar_Sexo()==true) {

  // DATOS APRENDIZ
  var Tipo_Doc=document.getElementById("Tipo_Doc").value;
  var Numero_Documento=document.getElementById("Numero_Documento").value;
  var Nombre_Egresado=document.getElementById("Nombre_Egresado").value;
  var Apellido_Egresado=document.getElementById("Apellido_Egresado").value;
  var Id_Municipio=document.getElementById("Id_Municipio").value;
  var Correo=document.getElementById("Correo").value;
  var Telefono=document.getElementById("Telefono").value;
  var Telefono_2=document.getElementById("Telefono_2").value;
  var Celular=document.getElementById("Celular").value;
  var Facebook=document.getElementById("Facebook").value;
  var Sexo=document.getElementById("Sexo").value;
  var fecha_nacimiento=document.getElementById("fecha_nacimiento").value;

  $("#contenedor").load("actualizar_datos_basicos.php",{id_egresado:id_egresado,Tipo_Doc:Tipo_Doc,Numero_Documento:Numero_Documento,Nombre_Egresado:Nombre_Egresado,Apellido_Egresado:Apellido_Egresado,Id_Municipio:Id_Municipio,Correo:Correo,Telefono:Telefono,Telefono_2:Telefono_2,Celular:Celular,Facebook:Facebook,Sexo:Sexo,fecha_nacimiento:fecha_nacimiento});

}else{

  // swal("Llene Todos los campos",'','error')

  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
}


}

function mostrar_datos_basicos() {
  

  var contenedor_datos_basicos=document.getElementById("contenedor_datos_basicos").style.display="block";
  var contenedor_datos_programa=document.getElementById("contenedor_datos_programa").style.display="block";
  var contenedor_tipo_etapa_practica=document.getElementById("contenedor_tipo_etapa_practica").style.display="block";
  var contenedor_situacion_laboral=document.getElementById("contenedor_situacion_laboral").style.display="block";
  var contenedor_contactado=document.getElementById("contenedor_contactado").style.display="block";
}

function mostrar_datos_programa() {
  

  var contenedor_datos_programa=document.getElementById("contenedor_datos_programa").style.display="block";
  var contenedor_datos_basicos=document.getElementById("contenedor_datos_basicos").style.display="block";
  var contenedor_tipo_etapa_practica=document.getElementById("contenedor_tipo_etapa_practica").style.display="block";
  var contenedor_situacion_laboral=document.getElementById("contenedor_situacion_laboral").style.display="block";
  var contenedor_contactado=document.getElementById("contenedor_contactado").style.display="block";
}


function mostrar_etapa_practica() {
  

  var contenedor_tipo_etapa_practica=document.getElementById("contenedor_tipo_etapa_practica").style.display="block";
  var contenedor_datos_basicos=document.getElementById("contenedor_datos_basicos").style.display="block";
  var contenedor_datos_programa=document.getElementById("contenedor_datos_programa").style.display="block";
  var contenedor_situacion_laboral=document.getElementById("contenedor_situacion_laboral").style.display="block";
  var contenedor_contactado=document.getElementById("contenedor_contactado").style.display="block";
}

function mostrar_datos_situacion() {
  

  var contenedor_situacion_laboral=document.getElementById("contenedor_situacion_laboral").style.display="block";
  var contenedor_datos_basicos=document.getElementById("contenedor_datos_basicos").style.display="block";
  var contenedor_datos_programa=document.getElementById("contenedor_datos_programa").style.display="block";
  var contenedor_tipo_etapa_practica=document.getElementById("contenedor_tipo_etapa_practica").style.display="block";
  var contenedor_contactado=document.getElementById("contenedor_contactado").style.display="block";
}

function mostrar_contactado() {
  

  var contenedor_contactado=document.getElementById("contenedor_contactado").style.display="block";
  var contenedor_datos_basicos=document.getElementById("contenedor_datos_basicos").style.display="block";
  var contenedor_datos_programa=document.getElementById("contenedor_datos_programa").style.display="block";
  var contenedor_tipo_etapa_practica=document.getElementById("contenedor_tipo_etapa_practica").style.display="block";
  var contenedor_situacion_laboral=document.getElementById("contenedor_situacion_laboral").style.display="block";
}
function inicio() {
 var contenedor_datos_basicos=document.getElementById("contenedor_datos_basicos").style.display="block";
 var contenedor_datos_programa=document.getElementById("contenedor_datos_programa").style.display="block";
 var contenedor_tipo_etapa_practica=document.getElementById("contenedor_tipo_etapa_practica").style.display="block";
 var contenedor_situacion_laboral=document.getElementById("contenedor_situacion_laboral").style.display="block";
 var contenedor_contactado=document.getElementById("contenedor_contactado").style.display="block";

 var boton_registrar_egresado=document.getElementById('boton_registrar_egresado').style.display='block';
 var boton_actualizar_egresado=document.getElementById('boton_actualizar_egresado').style.display='none';
 var boton_actualizar_asociacion_programa_ficha=document.getElementById('boton_actualizar_asociacion_programa_ficha').style.display='none';

 var boton_registrar_asociacion_etapa_practica=document.getElementById("boton_registrar_asociacion_etapa_practica").style.display='block';
 var boton_actualizar_asociacion_etapa_practica=document.getElementById("boton_actualizar_asociacion_etapa_practica").style.display='none';

 var boton_registrar_asociacion_situacion_laboral=document.getElementById("boton_registrar_asociacion_situacion_laboral").style.display='block';
 var boton_actualizar_asociacion_situacion_laboral=document.getElementById("boton_actualizar_asociacion_situacion_laboral").style.display='none';


 
 $("#nombre_carrera").keyup(validar_nombre_carrera);
 $("#Nombre_universidad").keyup(validar_Nombre_universidad);  
 $("#salario").keyup(validar_salario);
 $("#Funcion_Desempeña").keyup(validar_Funcion_Desempeña);  
 $("#Nombre_del_Proyecto").keyup(validar_Nombre_del_Proyecto);
 $("#fecha_nacimiento").keyup(validar_fecha_nacimiento);
 $("#Apellido_Egresado").keyup(validar_Apellido_Egresado);
 $("#Nombre_Egresado").keyup(validar_Nombre_Egresado);
 $("#Numero_Documento").keyup(validar_Numero_Documento);
 $("#fecha_certificacion").keyup(validar_fecha_certificacion);
 $("#Nit_Empresa").keyup(validar_Nit_Empresa);  
 $("#Nombre_del_Proyecto").keyup(validar_Nombre_del_Proyecto);
 $("#nombredeempresa").keyup(validar_nombre_empresa);
 $("#matriculados").keyup(validar_matriculados);
 $("#nuevo_programa_formacion").keyup(validar_nombre_programa);
 $("#graduados").keyup(validar_graduados);
 $("#contenedor_programas_asignacion").load("select_pograma.php");
 $("#Numero_Ficha").keyup(validar_Numero_Ficha);
 $("#nueva_ficha").keyup(validar_nueva_ficha);
 $("#nuevo_programa_formacion").keyup(validar_nuevo_programa);
 $("#duracion_programa").keyup(validar_duracion_programa);


}
var contenedor_programa_formacion=document.getElementById('contenedor_programa_formacion').style.display='none';
var contenedor_asignar_ficha_programa=document.getElementById('contenedor_asignar_ficha_programa').style.display='none';
var trabajando1=document.getElementById("trabajando1").style.display="none";
var nombre_empresa=document.getElementById('nombre_empresa').style.display='none';
var nombre_proyecto=document.getElementById('nombre_proyecto').style.display='none';
var estudiando=document.getElementById("estudiando").style.display="none";
var trabajando=document.getElementById("trabajando").style.display="none";


function mostrar_programa() {
  var contenedor_programa_formacion=document.getElementById('contenedor_programa_formacion').style.display='block';
  var contenedor_asignar_ficha_programa=document.getElementById('contenedor_asignar_ficha_programa').style.display='none';
}

function mostrar_ficha() {
  var contenedor_asignar_ficha_programa=document.getElementById('contenedor_asignar_ficha_programa').style.display='block';
  var contenedor_programa_formacion=document.getElementById('contenedor_programa_formacion').style.display='none';
}

$(document).ready(inicio);


function enviar() {
  if (validar_Numero_Ficha()==true && validar_programa_formacion==true &&  validar_fecha_certificacion()==true && validar_Tipo_Doc()==true && validar_Numero_Documento()==true && validar_Nombre_Egresado()==true && validar_Apellido_Egresado()==true &&  validar_Id_Municipio()==true && validar_Sexo()==true && validar_fecha_nacimiento()==true && validar_tipo_etapa_practica()==true) {

   var Id_Tipo_Etapa_Practica=document.getElementById("Id_Tipo_Etapa_Practica").value;

// AQUI COMIENZO A VALIDAR LO DEL TIPO DE ETAPA PRACTICA
// ------------------------------------------------------------------------------
if (Id_Tipo_Etapa_Practica==1 || Id_Tipo_Etapa_Practica==3) {

  if (validar_id_empresa_etapa()==true) {
// AQUI COMIENZO A VALIDAR LO DE SITUACION LABORAL CUANDO ES TRUE LA VALIDACION DE TIPO DE TAPA
// --------------------------------------------------------------------------------------------



// AQUI COMIENZO A VALIDAR LA SITUACION LABORAL
// ----------------------------------------------------------------------------------------------
if (validar_situcion_laboral()==true) {


  var Id_Situacion=document.getElementById("Id_Situacion").value;
// AQUI VALIDO SI LA SITUACION LABORAL ES ESTUDIANDO
if (Id_Situacion==3) {

  if (validar_nombre_carrera()==true && validar_id_universidad()==true) {

    if (validar_contactado()==true) {
// AQUI SE ENVIA EL PARA REGISTRAR
// -----------------------------------------------------------------------


// DATOS PROGRAMA FORMACION
var fecha_certificacion=document.getElementById("fecha_certificacion").value;

// DATOS APRENDIZ
var Tipo_Doc=document.getElementById("Tipo_Doc").value;
var Numero_Documento=document.getElementById("Numero_Documento").value;
var Nombre_Egresado=document.getElementById("Nombre_Egresado").value;
var Apellido_Egresado=document.getElementById("Apellido_Egresado").value;
var Id_Municipio=document.getElementById("Id_Municipio").value;
var Correo=document.getElementById("Correo").value;
var Telefono=document.getElementById("Telefono").value;
var Telefono_2=document.getElementById("Telefono_2").value;
var Celular=document.getElementById("Celular").value;
var Facebook=document.getElementById("Facebook").value;
var Sexo=document.getElementById("Sexo").value;
var fecha_nacimiento=document.getElementById("fecha_nacimiento").value;

// DATOS ETAPA PRACTICA
var Id_Tipo_Etapa_Practica=document.getElementById("Id_Tipo_Etapa_Practica").value;
var id_empresa_etapa=document.getElementById("id_empresa_etapa").value;
var Nombre_del_Proyecto=document.getElementById("Nombre_del_Proyecto").value;

// DATOS SITUACION
var Id_Situacion=document.getElementById("Id_Situacion").value;
var nombre_carrera=document.getElementById("nombre_carrera").value;
var id_universidad=document.getElementById("id_universidad").value;
var contactado=document.getElementById("contactado").value;

var id_empresa=document.getElementById("id_empresa").value;
var Funcion_Desempeña=document.getElementById("Funcion_Desempeña").value;
var relacion_programa=document.getElementById("relacion_programa").value;
var salario=document.getElementById("salario").value;
var intensidad_horaria=document.getElementById("intensidad_horaria").value;


$("#contenedor_enviar").load("regitrar_egresado.php",{id_programa_ficha:id_programa_ficha,fecha_certificacion:fecha_certificacion,Tipo_Doc:Tipo_Doc,Numero_Documento:Numero_Documento,Nombre_Egresado:Nombre_Egresado,Apellido_Egresado:Apellido_Egresado,Id_Municipio:Id_Municipio,Sexo:Sexo,fecha_nacimiento:fecha_nacimiento,Id_Tipo_Etapa_Practica:Id_Tipo_Etapa_Practica,id_empresa_etapa:id_empresa_etapa,Id_Situacion:Id_Situacion,nombre_carrera:nombre_carrera,id_universidad:id_universidad,contactado:contactado,Correo:Correo,Telefono:Telefono,Telefono_2:Telefono_2,Celular:Celular,Facebook:Facebook,Nombre_del_Proyecto:Nombre_del_Proyecto,id_empresa:id_empresa,Funcion_Desempeña:Funcion_Desempeña,relacion_programa:relacion_programa,salario:salario,intensidad_horaria:intensidad_horaria});

}else{

  // swal("ERROR", "Agunos Campos Estan vacios o Incorrectos",'error');
  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
}

}else{

  // swal("ERROR", "Agunos Campos Estan vacios o Incorrectos",'error');
  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
}

}else{

// AQUI VALIDO CUANDO LA SITUACION LABORAL ES trabajando
// ---------------------------------------------------------------
if (validar_id_empresa()==true && validar_Funcion_Desempeña()==true && validar_relacion_programa()==true && validar_salario()==true && validar_intensidad_horaria()==true) {

  if (validar_contactado()==true) {

// AQUI ABAJO ES PARA ENVIAR EL FORMULARIO
// --------------------------------------------------------------------------------------------

// DATOS PROGRAMA FORMACION
var fecha_certificacion=document.getElementById("fecha_certificacion").value;

// DATOS APRENDIZ
var Tipo_Doc=document.getElementById("Tipo_Doc").value;
var Numero_Documento=document.getElementById("Numero_Documento").value;
var Nombre_Egresado=document.getElementById("Nombre_Egresado").value;
var Apellido_Egresado=document.getElementById("Apellido_Egresado").value;
var Id_Municipio=document.getElementById("Id_Municipio").value;
var Correo=document.getElementById("Correo").value;
var Telefono=document.getElementById("Telefono").value;
var Telefono_2=document.getElementById("Telefono_2").value;
var Celular=document.getElementById("Celular").value;
var Facebook=document.getElementById("Facebook").value;
var Sexo=document.getElementById("Sexo").value;
var fecha_nacimiento=document.getElementById("fecha_nacimiento").value;

// DATOS ETAPA PRACTICA
var Id_Tipo_Etapa_Practica=document.getElementById("Id_Tipo_Etapa_Practica").value;
var id_empresa_etapa=document.getElementById("id_empresa_etapa").value;
var Nombre_del_Proyecto=document.getElementById("Nombre_del_Proyecto").value;

// DATOS SITUACION
var Id_Situacion=document.getElementById("Id_Situacion").value;
var nombre_carrera=document.getElementById("nombre_carrera").value;
var id_universidad=document.getElementById("id_universidad").value;
var contactado=document.getElementById("contactado").value;

var id_empresa=document.getElementById("id_empresa").value;
var Funcion_Desempeña=document.getElementById("Funcion_Desempeña").value;
var relacion_programa=document.getElementById("relacion_programa").value;
var salario=document.getElementById("salario").value;
var intensidad_horaria=document.getElementById("intensidad_horaria").value;


$("#contenedor_enviar").load("regitrar_egresado.php",{id_programa_ficha:id_programa_ficha,fecha_certificacion:fecha_certificacion,Tipo_Doc:Tipo_Doc,Numero_Documento:Numero_Documento,Nombre_Egresado:Nombre_Egresado,Apellido_Egresado:Apellido_Egresado,Id_Municipio:Id_Municipio,Sexo:Sexo,fecha_nacimiento:fecha_nacimiento,Id_Tipo_Etapa_Practica:Id_Tipo_Etapa_Practica,id_empresa_etapa:id_empresa_etapa,Id_Situacion:Id_Situacion,nombre_carrera:nombre_carrera,id_universidad:id_universidad,contactado:contactado,Correo:Correo,Telefono:Telefono,Telefono_2:Telefono_2,Celular:Celular,Facebook:Facebook,Nombre_del_Proyecto:Nombre_del_Proyecto,id_empresa:id_empresa,Funcion_Desempeña:Funcion_Desempeña,relacion_programa:relacion_programa,salario:salario,intensidad_horaria:intensidad_horaria});

}else{
  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })

}



}else{
  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
}


}


}else{

  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
};

}else{

  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
}
}else{

// AQUI COMIUENZO A VALIDAR LO DE PROYECTO PRODUCTIVO
// ------------------------------------------------------------------------------------------------
if (validar_Nombre_del_Proyecto()==true) {
// AQUI COMIENZO A VALIDAR LO DE SITUACION LABORAL CUANDO ES TRUE LA VALIDACION DE TIPO DE TAPA
// ------------------------------------------------------------------------------------------------

// AQUI COMIENZO A VALIDAR LA SITUACION LABORAL
// ----------------------------------------------------------------------------------------------
if (validar_situcion_laboral()==true) {


  var Id_Situacion=document.getElementById("Id_Situacion").value;
// AQUI VALIDO SI LA SITUACION LABORAL ES ESTUDIANDO
if (Id_Situacion==3) {

  if (validar_nombre_carrera()==true && validar_id_universidad()==true) {

    if (validar_contactado()==true) {

// AQUI ABAJO ES PARA ENVIAR EL FORMULARIO
// --------------------------------------------------------------------------------------------

// DATOS PROGRAMA FORMACION
var fecha_certificacion=document.getElementById("fecha_certificacion").value;

// DATOS APRENDIZ
var Tipo_Doc=document.getElementById("Tipo_Doc").value;
var Numero_Documento=document.getElementById("Numero_Documento").value;
var Nombre_Egresado=document.getElementById("Nombre_Egresado").value;
var Apellido_Egresado=document.getElementById("Apellido_Egresado").value;
var Id_Municipio=document.getElementById("Id_Municipio").value;
var Correo=document.getElementById("Correo").value;
var Telefono=document.getElementById("Telefono").value;
var Telefono_2=document.getElementById("Telefono_2").value;
var Celular=document.getElementById("Celular").value;
var Facebook=document.getElementById("Facebook").value;
var Sexo=document.getElementById("Sexo").value;
var fecha_nacimiento=document.getElementById("fecha_nacimiento").value;

// DATOS ETAPA PRACTICA
var Id_Tipo_Etapa_Practica=document.getElementById("Id_Tipo_Etapa_Practica").value;
var id_empresa_etapa=document.getElementById("id_empresa_etapa").value;
var Nombre_del_Proyecto=document.getElementById("Nombre_del_Proyecto").value;

// DATOS SITUACION
var Id_Situacion=document.getElementById("Id_Situacion").value;
var nombre_carrera=document.getElementById("nombre_carrera").value;
var id_universidad=document.getElementById("id_universidad").value;
var contactado=document.getElementById("contactado").value;

var id_empresa=document.getElementById("id_empresa").value;
var Funcion_Desempeña=document.getElementById("Funcion_Desempeña").value;
var relacion_programa=document.getElementById("relacion_programa").value;
var salario=document.getElementById("salario").value;
var intensidad_horaria=document.getElementById("intensidad_horaria").value;


$("#contenedor_enviar").load("regitrar_egresado.php",{id_programa_ficha:id_programa_ficha,fecha_certificacion:fecha_certificacion,Tipo_Doc:Tipo_Doc,Numero_Documento:Numero_Documento,Nombre_Egresado:Nombre_Egresado,Apellido_Egresado:Apellido_Egresado,Id_Municipio:Id_Municipio,Sexo:Sexo,fecha_nacimiento:fecha_nacimiento,Id_Tipo_Etapa_Practica:Id_Tipo_Etapa_Practica,id_empresa_etapa:id_empresa_etapa,Id_Situacion:Id_Situacion,nombre_carrera:nombre_carrera,id_universidad:id_universidad,contactado:contactado,Correo:Correo,Telefono:Telefono,Telefono_2:Telefono_2,Celular:Celular,Facebook:Facebook,Nombre_del_Proyecto:Nombre_del_Proyecto,id_empresa:id_empresa,Funcion_Desempeña:Funcion_Desempeña,relacion_programa:relacion_programa,salario:salario,intensidad_horaria:intensidad_horaria});

}else{
  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
  
}


}else{

  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
}

}else{

// AQUI VALIDO CUANDO LA SITUACION LABORAL ES trabajando
// ---------------------------------------------------------------
if (validar_id_empresa()==true && validar_Funcion_Desempeña()==true && validar_relacion_programa()==true && validar_salario()==true && validar_intensidad_horaria()==true) {

  if (validar_contactado()==true) {

// AQUI ABAJO ES PARA ENVIAR EL FORMULARIO
// --------------------------------------------------------------------------------------------

// DATOS PROGRAMA FORMACION
var fecha_certificacion=document.getElementById("fecha_certificacion").value;

// DATOS APRENDIZ
var Tipo_Doc=document.getElementById("Tipo_Doc").value;
var Numero_Documento=document.getElementById("Numero_Documento").value;
var Nombre_Egresado=document.getElementById("Nombre_Egresado").value;
var Apellido_Egresado=document.getElementById("Apellido_Egresado").value;
var Id_Municipio=document.getElementById("Id_Municipio").value;
var Correo=document.getElementById("Correo").value;
var Telefono=document.getElementById("Telefono").value;
var Telefono_2=document.getElementById("Telefono_2").value;
var Celular=document.getElementById("Celular").value;
var Facebook=document.getElementById("Facebook").value;
var Sexo=document.getElementById("Sexo").value;
var fecha_nacimiento=document.getElementById("fecha_nacimiento").value;

// DATOS ETAPA PRACTICA
var Id_Tipo_Etapa_Practica=document.getElementById("Id_Tipo_Etapa_Practica").value;
var id_empresa_etapa=document.getElementById("id_empresa_etapa").value;
var Nombre_del_Proyecto=document.getElementById("Nombre_del_Proyecto").value;

// DATOS SITUACION
var Id_Situacion=document.getElementById("Id_Situacion").value;
var nombre_carrera=document.getElementById("nombre_carrera").value;
var id_universidad=document.getElementById("id_universidad").value;
var contactado=document.getElementById("contactado").value;

var id_empresa=document.getElementById("id_empresa").value;
var Funcion_Desempeña=document.getElementById("Funcion_Desempeña").value;
var relacion_programa=document.getElementById("relacion_programa").value;
var salario=document.getElementById("salario").value;
var intensidad_horaria=document.getElementById("intensidad_horaria").value;


$("#contenedor_enviar").load("regitrar_egresado.php",{id_programa_ficha:id_programa_ficha,fecha_certificacion:fecha_certificacion,Tipo_Doc:Tipo_Doc,Numero_Documento:Numero_Documento,Nombre_Egresado:Nombre_Egresado,Apellido_Egresado:Apellido_Egresado,Id_Municipio:Id_Municipio,Sexo:Sexo,fecha_nacimiento:fecha_nacimiento,Id_Tipo_Etapa_Practica:Id_Tipo_Etapa_Practica,id_empresa_etapa:id_empresa_etapa,Id_Situacion:Id_Situacion,nombre_carrera:nombre_carrera,id_universidad:id_universidad,contactado:contactado,Correo:Correo,Telefono:Telefono,Telefono_2:Telefono_2,Celular:Celular,Facebook:Facebook,Nombre_del_Proyecto:Nombre_del_Proyecto,id_empresa:id_empresa,Funcion_Desempeña:Funcion_Desempeña,relacion_programa:relacion_programa,salario:salario,intensidad_horaria:intensidad_horaria});


}else{
  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
  
}

}else{
  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
}


}


}else{

  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
};

}else{

  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })  
}


}


}else{

  swal({
            title: 'Error!',
            text: "Algunos Campos Están Vacíos O Incorrectos",
            type: 'error',
            confirmButtonColor: '#238276'
        })
}

}

function registrar_universidad() {

  if (validar_Nombre_universidad()==true && validar_Id_Municipio_universidad()==true) {

    var Nombre_universidad=document.getElementById("Nombre_universidad").value;
    var Id_Municipio_universidad=document.getElementById("Id_Municipio_universidad").value;

    $("#contenedor_universidad").load("resitrar_nueva_universidad.php",{Nombre_universidad:Nombre_universidad,Id_Municipio_universidad:Id_Municipio_universidad});

  }

}


function validar_departamento_empresa() {
  
  var Id_Departamento_empresa=document.getElementById("Id_Departamento_empresa").value;

  if (Id_Departamento_empresa=="Seleccione") {

    var Id_Departamento_empresa=document.getElementById("Id_Departamento_empresa").style.border="2px solid red";
    return false;

  }else{
    Id_Departamento_empresa=document.getElementById("Id_Departamento_empresa").style.border="2px solid #4caf50";
    var Id_Departamento_empresa=document.getElementById("Id_Departamento_empresa").value;
    $("#Id_Municipio_empresa").load("mostrar_municipio__empresa.php",{Id_Departamento_empresa:Id_Departamento_empresa});
    return true;

  }

}

function validar_departamento_universidad() {
  var Id_Departamento_universidad=document.getElementById("Id_Departamento_universidad").value;

  if (Id_Departamento_universidad=="Seleccione") {

    var Id_Departamento_universidad=document.getElementById("Id_Departamento_universidad").style.border="2px solid red";
    return false;

  }else{
    Id_Departamento_universidad=document.getElementById("Id_Departamento_universidad").style.border="2px solid #4caf50";
    var Id_Departamento_universidad=document.getElementById("Id_Departamento_universidad").value;
    $("#Id_Municipio_universidad").load("mostrar_municipio__universidad.php",{Id_Departamento_universidad:Id_Departamento_universidad});
    return true;

  } 

}







function validar_departamento() {
  
  var Id_Departamento=document.getElementById("Id_Departamento").value;

  if (Id_Departamento=="Seleccione") {

    var Id_Departamento=document.getElementById("Id_Departamento").style.border="2px solid red";
    return false;

  }else{
    Id_Departamento=document.getElementById("Id_Departamento").style.border="2px solid #4caf50";
    var Id_Departamento=document.getElementById("Id_Departamento").value;
    $("#Id_Municipio").load("mostrar_municipio.php",{Id_Departamento:Id_Departamento});
    return true

  }

}


function validar_tipo_programa() {
  
  var tipo_programa=document.getElementById("tipo_programa").value;

  if (tipo_programa=="Seleccione") {

    var tipo_programa=document.getElementById("tipo_programa").style.border="2px solid red";
    return false;

  }else{
    tipo_programa=document.getElementById("tipo_programa").style.border="2px solid #4caf50";
    return true;

  }

}

function validar_Nombre_universidad() {
  
  var Nombre_universidad=document.getElementById('Nombre_universidad').value;
  Nombre_universidad=Nombre_universidad.toUpperCase();
  if(Nombre_universidad==null  || Nombre_universidad.length==0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Nombre_universidad)){
    var Nombre_universidad=document.getElementById('Nombre_universidad').style.border="2px solid red"
    return false;

  }else if (isNaN(Nombre_universidad)==false) {
    var Nombre_universidad=document.getElementById('Nombre_universidad').style.border="2px solid red"
    return false;

  }else if (Nombre_universidad.length>50) {
    var Nombre_universidad=document.getElementById('Nombre_universidad').style.border="2px solid red";
    return false;

  }else{
    var Nombre_universidad=document.getElementById('Nombre_universidad').style.border="2px solid #4caf50";

    return true;
  }
}



function copiar() {
  
  var Numero_Ficha=document.getElementById('Numero_Ficha').value;
  var nueva_ficha=document.getElementById('nueva_ficha').value=Numero_Ficha;
}


function copiar1() {
  
  var Numero_Ficha=document.getElementById('Numero_Ficha').value;
// var ficha_formacion=document.getElementById('Numero_Ficha').value;

$("#ficha_formacion").load("buscar_ficha.php",{Numero_Ficha:Numero_Ficha})
}







// -----------VALIDACIONES ---------------------------------
function validar_Numero_Ficha () {

  var Numero_Ficha=document.getElementById('Numero_Ficha').value;

  if(Numero_Ficha==null  || Numero_Ficha.length==0 || /^\s+$/.test(Numero_Ficha)|| Numero_Ficha<0){

    var Numero_Ficha=document.getElementById('Numero_Ficha').style.border="2px solid red";

    return false;

  }
  else if (isNaN(Numero_Ficha)) {
    var Numero_Ficha=document.getElementById('Numero_Ficha').style.border="2px solid red";
    return false;
  }else {

    var Numero_Ficha=document.getElementById('Numero_Ficha').style.border="2px solid #4caf50";
    var Numero_Ficha=document.getElementById('Numero_Ficha').value;

    $("#contenedor").load("buscar_programa.php",{Numero_Ficha:Numero_Ficha})
    return true;
  }

}

function validar_nueva_ficha () {

  var nueva_ficha=document.getElementById('nueva_ficha').value;

  if(nueva_ficha==null  || nueva_ficha.length==0 || /^\s+$/.test(nueva_ficha)|| nueva_ficha<0){

    var nueva_ficha=document.getElementById('nueva_ficha').style.border="2px solid red";

    return false;

  }
  else if (isNaN(nueva_ficha)) {
    var nueva_ficha=document.getElementById('nueva_ficha').style.border="2px solid red";
    return false;
  }else {

    var nueva_ficha=document.getElementById('nueva_ficha').style.border="2px solid #4caf50";

    return true;
  };

}

function validar_duracion_programa() {

  var duracion_programa=document.getElementById('duracion_programa').value;

  if(duracion_programa==null  || duracion_programa.length==0 || /^\s+$/.test(duracion_programa)|| duracion_programa<0){

    var duracion_programa=document.getElementById('duracion_programa').style.border="2px solid red";

    return false;

  }
  else if (isNaN(duracion_programa)) {
    var duracion_programa=document.getElementById('duracion_programa').style.border="2px solid red";
    return false;
  }else {

    var duracion_programa=document.getElementById('duracion_programa').style.border="2px solid #4caf50";

    return true;
  };

}

function validar_matriculados () {

  var matriculados=document.getElementById('matriculados').value;

  if(matriculados==null  || matriculados.length==0 || /^\s+$/.test(matriculados)|| matriculados<0){

    var matriculados=document.getElementById('matriculados').style.border="2px solid red";

    return false;

  }
  else if (isNaN(matriculados)) {
    var matriculados=document.getElementById('matriculados').style.border="2px solid red";
    return false;
  }else {

    var matriculados=document.getElementById('matriculados').style.border="2px solid #4caf50";

    return true;
  }

}

function validar_graduados () {

  var graduados=document.getElementById('graduados').value;

  if(graduados==null  || graduados.length==0 || /^\s+$/.test(graduados)|| graduados<0){

    var graduados=document.getElementById('graduados').style.border="2px solid red";

    return false;

  }
  else if (isNaN(graduados)) {
    var graduados=document.getElementById('graduados').style.border="2px solid red";
    return false;
  }else {

    var graduados=document.getElementById('graduados').style.border="2px solid #4caf50";

    return true;
  }

}

function registrar_nueva_ficha() {

  if (validar_nueva_ficha()==true) {
    var nueva_ficha=document.getElementById('nueva_ficha').value;

    $("#contenedor").load("registrar_nueva_ficha.php",{nueva_ficha:nueva_ficha});


  };
}

function registrar_nuevo_programa() {
  if (validar_nombre_programa()==true && validar_tipo_programa()==true && validar_duracion_programa()==true ) {

    var nuevo_programa_formacion=document.getElementById("nuevo_programa_formacion").value;
    var tipo_programa=document.getElementById("tipo_programa").value;
    var duracion_programa=document.getElementById('duracion_programa').value;
    nuevo_programa_formacion=nuevo_programa_formacion.toUpperCase();
    $("#contenedor").load("registrar_nuevo_programa.php",{nuevo_programa_formacion:nuevo_programa_formacion,tipo_programa:tipo_programa,duracion_programa:duracion_programa});

  }else{

    swal("Error","Algunos Campos Estan vacios o incorrectos porfavor reviselos","error");
  }
}


function validar_nuevo_programa() {
  var nuevo_programa_formacion=document.getElementById("nuevo_programa_formacion").value;
  nuevo_programa_formacion=nuevo_programa_formacion.toUpperCase();
  return true;



}

function validar_ficha_formacion() {
  var ficha_formacion=document.getElementById("ficha_formacion").value;
  if (ficha_formacion=="Seleccione") {

    var ficha_formacion=document.getElementById("ficha_formacion").style.border="2px solid red";
    return false;

  }else{
    ficha_formacion=document.getElementById("ficha_formacion").style.border="2px solid #4caf50";
    return true

  }

}

function validar_programa_asignacion() {
  var programa_asignacion=document.getElementById("programa_asignacion").value;
  if (programa_asignacion=="Seleccione") {

    var programa_asignacion=document.getElementById("programa_asignacion").style.border="2px solid red";
    return false;

  }else{
    programa_asignacion=document.getElementById("programa_asignacion").style.border="2px solid #4caf50";
    return true

  }

}

function validar_fecha_ingreso() {
  var fecha_ingreso=document.getElementById("fecha_ingreso").value;
  fecha_ingreso=new Date(fecha_ingreso);

  if (fecha_ingreso=="Invalid Date") {
    var fecha_ingreso=document.getElementById("fecha_ingreso").style.border="2px solid red";
    return false;
  }else{

    var fecha_ingreso=document.getElementById("fecha_ingreso").style.border="2px solid #4caf50";
    return true;
  }
}

function validar_fecha_fin() {
  var fecha_fin=document.getElementById("fecha_fin").value;
  fecha_fin=new Date(fecha_fin);

  if (fecha_fin=="Invalid Date") {
    var fecha_fin=document.getElementById("fecha_fin").style.border="2px solid red";
    return false;
  }else{

    var fecha_fin=document.getElementById("fecha_fin").style.border="2px solid #4caf50";
    return true;
  }
}


function registrar_asignacion() {

  if (validar_programa_asignacion()==true && validar_fecha_ingreso()==true && validar_fecha_fin()==true && validar_matriculados()==true && validar_graduados()==true ) {
    var matriculados=document.getElementById("matriculados").value;
    var graduados=document.getElementById("graduados").value;

    if(
(parseInt(document.getElementById("graduados").value,10)>parseInt(document.getElementById("matriculados").value,10))
&& !isNaN(parseInt(document.getElementById("matriculados").value,10))
&& !isNaN(parseInt(document.getElementById("graduados").value,10))
) {
      // swal('ERROR','GRADUADOS NO PUEDE SER MAYOR A LOS MATRICULADOS','error');

      swal({
            title: 'Error!',
            text: "El numero De Certificados No Puede Ser Mayor Al De Los Matriculados",
            type: 'error',
            confirmButtonColor: '#238276'
        })

    }else{

      var programa_asignacion=document.getElementById("programa_asignacion").value;
      var ficha_formacion=document.getElementById("ficha_formacion").value;
      var fecha_ingreso=document.getElementById("fecha_ingreso").value;
      var fecha_fin=document.getElementById("fecha_fin").value;


      $("#contenedor").load("registrar_asignacion.php",{programa_asignacion:programa_asignacion,ficha_formacion:ficha_formacion,matriculados:matriculados,graduados:graduados,fecha_ingreso:fecha_ingreso,fecha_fin:fecha_fin})

    }
  }else{

    swal("Error","Seleccione Todos los Campos","error");
  }

}


function validar_tipo_etapa_practica() {
  
  var Id_Tipo_Etapa_Practica=document.getElementById("Id_Tipo_Etapa_Practica").value;

  if (Id_Tipo_Etapa_Practica=="Seleccione") {
    var nombre_empresa=document.getElementById("nombre_empresa").style.display="none";

    var nombre_proyecto=document.getElementById("nombre_proyecto").style.display="none";
    var Id_Tipo_Etapa_Practica=document.getElementById("Id_Tipo_Etapa_Practica").style.border="2px solid red";
    return false;

  }else if (Id_Tipo_Etapa_Practica==1){

    var Id_Tipo_Etapa_Practica=document.getElementById("Id_Tipo_Etapa_Practica").style.border="2px solid #4caf50";
    var nombre_empresa=document.getElementById("nombre_empresa").style.display="block";
    var nombre_proyecto=document.getElementById("nombre_proyecto").style.display="none";

    return true;

  }else if(Id_Tipo_Etapa_Practica==3){
    var Id_Tipo_Etapa_Practica=document.getElementById("Id_Tipo_Etapa_Practica").style.border="2px solid #4caf50";
    var nombre_empresa=document.getElementById("nombre_empresa").style.display="block";
    var nombre_proyecto=document.getElementById("nombre_proyecto").style.display="none";

    return true;

  }else if(Id_Tipo_Etapa_Practica==5){
    var Id_Tipo_Etapa_Practica=document.getElementById("Id_Tipo_Etapa_Practica").style.border="2px solid #4caf50";
    var nombre_empresa=document.getElementById("nombre_empresa").style.display="none";

    var nombre_proyecto=document.getElementById("nombre_proyecto").style.display="block";
    return true;

  }else{

    var Id_Tipo_Etapa_Practica=document.getElementById("Id_Tipo_Etapa_Practica").style.border="2px solid #4caf50";
    var nombre_empresa=document.getElementById("nombre_empresa").style.display="none";

    var nombre_proyecto=document.getElementById("nombre_proyecto").style.display="none";
    return true;
  }
}

function validar_nombre_programa () {
  var nuevo_programa_formacion=document.getElementById('nuevo_programa_formacion').value;
  nuevo_programa_formacion=nuevo_programa_formacion.toUpperCase();
  if(nuevo_programa_formacion==null  || nuevo_programa_formacion.length==0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nuevo_programa_formacion)){
    var nuevo_programa_formacion=document.getElementById('nuevo_programa_formacion').style.border="2px solid red"
    return false;

  }else if (isNaN(nuevo_programa_formacion)==false) {
    var nuevo_programa_formacion=document.getElementById('nuevo_programa_formacion').style.border="2px solid red"
    return false;

  }else if (nuevo_programa_formacion.length>50) {
    var nuevo_programa_formacion=document.getElementById('nuevo_programa_formacion').style.border="2px solid red";
    return false;

  }else{
    var nuevo_programa_formacion=document.getElementById('nuevo_programa_formacion').style.border="2px solid #4caf50";

    return true;
  }

}

function validar_nombre_empresa () {
  var nombredeempresa=document.getElementById('nombredeempresa').value;
  nombredeempresa=nombredeempresa.toUpperCase();
  if(nombredeempresa==null  || nombredeempresa.length==0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nombredeempresa)){
    var nombredeempresa=document.getElementById('nombredeempresa').style.border="2px solid red"
    return false;

  }else if (isNaN(nombredeempresa)==false) {
    var nombredeempresa=document.getElementById('nombredeempresa').style.border="2px solid red"
    return false;

  }else if (nombredeempresa.length>50) {
    var nombredeempresa=document.getElementById('nombredeempresa').style.border="2px solid red";
    return false;

  }else{
    var nombredeempresa=document.getElementById('nombredeempresa').style.border="2px solid #4caf50";

    return true;
  }

}

function validar_Nombre_del_Proyecto() {
  Nombre_del_Proyecto=document.getElementById("Nombre_del_Proyecto").value;
  Nombre_del_Proyecto=Nombre_del_Proyecto.toUpperCase();
  if(Nombre_del_Proyecto==null  || Nombre_del_Proyecto.length==0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Nombre_del_Proyecto)){
    var Nombre_del_Proyecto=document.getElementById('Nombre_del_Proyecto').style.border="2px solid red"
    return false;

  }else if (isNaN(Nombre_del_Proyecto)==false) {
    var Nombre_del_Proyecto=document.getElementById('Nombre_del_Proyecto').style.border="2px solid red"
    return false;

  }else if (Nombre_del_Proyecto.length>50) {
    var Nombre_del_Proyecto=document.getElementById('Nombre_del_Proyecto').style.border="2px solid red";
    return false;

  }else{
    var Nombre_del_Proyecto=document.getElementById('Nombre_del_Proyecto').style.border="2px solid #4caf50";

    return true;
  }
}

function validar_situcion_laboral() {
  var Id_Situacion=document.getElementById("Id_Situacion").value;

  if (Id_Situacion=="Seleccione") {
    var estudiando=document.getElementById("estudiando").style.display="none";
    var trabajando=document.getElementById("trabajando").style.display="none";
    var trabajando1=document.getElementById("trabajando1").style.display="none";
    var Id_Situacion=document.getElementById("Id_Situacion").style.boder="2px solid red";
    return false;
  }else if(Id_Situacion==3){
    var Id_Situacion=document.getElementById("Id_Situacion").style.boder="2px solid #4caf50";
    var estudiando=document.getElementById("estudiando").style.display="block";
    var trabajando=document.getElementById("trabajando").style.display="none";
    var trabajando1=document.getElementById("trabajando1").style.display="none";
    return true;
  }else if(Id_Situacion==2){
    var Id_Situacion=document.getElementById("Id_Situacion").style.boder="2px solid #4caf50";
    var estudiando=document.getElementById("estudiando").style.display="none";
    var trabajando=document.getElementById("trabajando").style.display="block";
    var trabajando1=document.getElementById("trabajando1").style.display="block";
    return true;
  }else{

    var Id_Situacion=document.getElementById("Id_Situacion").style.boder="2px solid #4caf50";
    var estudiando=document.getElementById("estudiando").style.display="none";
    var trabajando=document.getElementById("trabajando").style.display="none";
    var trabajando1=document.getElementById("trabajando1").style.display="none";
    return true;
  }
}

function validar_Nit_Empresa() {

  var Nit_Empresa=document.getElementById('Nit_Empresa').value;

  if(Nit_Empresa==null  || Nit_Empresa.length==0 || /^\s+$/.test(Nit_Empresa)|| Nit_Empresa<0){

    var Nit_Empresa=document.getElementById('Nit_Empresa').style.border="2px solid red";

    return false;

  }
  else if (isNaN(Nit_Empresa)) {
    var Nit_Empresa=document.getElementById('Nit_Empresa').style.border="2px solid red";
    return false;
  }else {

    var Nit_Empresa=document.getElementById('Nit_Empresa').style.border="2px solid #4caf50";
    var Nit_Empresa=document.getElementById('Nit_Empresa').value;

    $("#contenedor").load("buscar_programa.php",{Nit_Empresa:Nit_Empresa})
    return true;
  }

}


function validar_nombre_carrera() {
  
  var nombre_carrera=document.getElementById('nombre_carrera').value;
  nombre_carrera=nombre_carrera.toUpperCase();
  if(nombre_carrera==null  || nombre_carrera.length==0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(nombre_carrera)){
    var nombre_carrera=document.getElementById('nombre_carrera').style.border="2px solid red"
    return false;

  }else if (isNaN(nombre_carrera)==false) {
    var nombre_carrera=document.getElementById('nombre_carrera').style.border="2px solid red"
    return false;

  }else if (nombre_carrera.length>50) {
    var nombre_carrera=document.getElementById('nombre_carrera').style.border="2px solid red";
    return false;

  }else{
    var nombre_carrera=document.getElementById('nombre_carrera').style.border="2px solid #4caf50";

    return true;
  }

}

function validar_municipio_empresa() {
  var Id_Municipio_empresa=document.getElementById('Id_Municipio_empresa').value;

  if (Id_Municipio_empresa=="Seleccione") {
    var Id_Municipio_empresa=document.getElementById("Id_Municipio_empresa").style.border="2px solid red";
    return false;

  }else{

    var Id_Municipio_empresa=document.getElementById("Id_Municipio_empresa").style.border="2px solid #4caf50";
    return true;
  }

}

function validar_Id_Municipio() {
  var Id_Municipio=document.getElementById('Id_Municipio').value;

  if (Id_Municipio=="Seleccione") {
    var Id_Municipio=document.getElementById("Id_Municipio").style.border="2px solid red";
    return false;

  }else{

    var Id_Municipio=document.getElementById("Id_Municipio").style.border="2px solid #4caf50";
    return true;
  }
}





function validar_Id_Municipio_universidad() {
  
  var Id_Municipio_universidad=document.getElementById('Id_Municipio_universidad').value;

  if (Id_Municipio_universidad=="Seleccione") {
    var Id_Municipio_universidad=document.getElementById("Id_Municipio_universidad").style.border="2px solid red";
    return false;

  }else{

    var Id_Municipio_universidad=document.getElementById("Id_Municipio_universidad").style.border="2px solid #4caf50";
    return true;
  }
}


function validar_id_universidad() {
  
  var id_universidad=document.getElementById('id_universidad').value;

  if (id_universidad=="Seleccione") {
    var id_universidad=document.getElementById("id_universidad").style.border="2px solid red";
    return false;

  }else{

    var id_universidad=document.getElementById("id_universidad").style.border="2px solid #4caf50";
    return true;
  }

}




function validar_Tipo_Doc() {
  var Tipo_Doc=document.getElementById('Tipo_Doc').value;

  if (Tipo_Doc=="Seleccione") {
    var Tipo_Doc=document.getElementById("Tipo_Doc").style.border="2px solid red";
    return false;

  }else{

    var Tipo_Doc=document.getElementById("Tipo_Doc").style.border="2px solid #4caf50";
    return true;
  }


}

function validar_intensidad_horaria() {

  var intensidad_horaria=document.getElementById('intensidad_horaria').value;

  if (intensidad_horaria=="Selecciona") {
    var intensidad_horaria=document.getElementById("intensidad_horaria").style.border="2px solid red";
    return false;

  }else{

    var intensidad_horaria=document.getElementById("intensidad_horaria").style.border="2px solid #4caf50";
    return true;
  }
  

}


function validar_Sexo() {
  var Sexo=document.getElementById('Sexo').value;

  if (Sexo=="Seleccione") {
    var Sexo=document.getElementById("Sexo").style.border="2px solid red";
    return false;

  }else{

    var Sexo=document.getElementById("Sexo").style.border="2px solid #4caf50";
    return true;
  } 
}


function validar_salario() {
  
  var salario=document.getElementById('salario').value;

  if(salario==null  || salario.length==0 || /^\s+$/.test(salario)|| salario<0){

    var salario=document.getElementById('salario').style.border="2px solid red";

    return false;

  }
  else if (isNaN(salario)) {
    var salario=document.getElementById('salario').style.border="2px solid red";
    return false;
  }else {

    var salario=document.getElementById('salario').style.border="2px solid #4caf50";

    return true;
  }
}

function validar_id_empresa_etapa() {
  var id_empresa_etapa=document.getElementById('id_empresa_etapa').value;

  if (id_empresa_etapa=="Seleccione") {
    var id_empresa_etapa=document.getElementById("id_empresa_etapa").style.border="2px solid red";
    return false;

  }else{

    var id_empresa_etapa=document.getElementById("id_empresa_etapa").style.border="2px solid #4caf50";
    return true;
  }

}

function validar_contactado(){

  var contactado=document.getElementById('contactado').value;

  if (contactado=="Seleccione") {
    var contactado=document.getElementById("contactado").style.border="2px solid red";
    return false;

  }else{

    var contactado=document.getElementById("contactado").style.border="2px solid #4caf50";
    return true;
  }
}

function validar_id_empresa() {
  
  var id_empresa=document.getElementById('id_empresa').value;

  if (id_empresa=="Seleccione") {
    var id_empresa=document.getElementById("id_empresa").style.border="2px solid red";
    return false;

  }else{

    var id_empresa=document.getElementById("id_empresa").style.border="2px solid #4caf50";
    return true;
  }

}


function validar_fecha_certificacion() {
  
  var fecha_certificacion=document.getElementById("fecha_certificacion").value;
  var fecha_certificacion=new Date(fecha_certificacion);
  if (fecha_certificacion=="Invalid Date") {
    var fecha_certificacion=document.getElementById("fecha_certificacion").style.border="2px solid red";
    return false;
  }else{

    var fecha_certificacion=document.getElementById("fecha_certificacion").style.border="2px solid #4caf50";
    return true;
  }



}


function validar_fecha_nacimiento() {
  
  var fecha_nacimiento=document.getElementById("fecha_nacimiento").value;
  var fecha_nacimiento=new Date(fecha_nacimiento);
  if (fecha_nacimiento=="Invalid Date") {
    var fecha_nacimiento=document.getElementById("fecha_nacimiento").style.border="2px solid red";
    return false;
  }else{

    var fecha_nacimiento=document.getElementById("fecha_nacimiento").style.border="2px solid #4caf50";
    return true;
  }


}


function validar_Numero_Documento() {

  var Numero_Documento=document.getElementById('Numero_Documento').value;

  if(Numero_Documento==null  || Numero_Documento.length==0 || /^\s+$/.test(Numero_Documento)|| Numero_Documento<0){

    var Numero_Documento=document.getElementById('Numero_Documento').style.border="2px solid red";

    return false;

  }
  else if (isNaN(Numero_Documento)) {
    var Numero_Documento=document.getElementById('Numero_Documento').style.border="2px solid red";
    return false;
  }else {

    var Numero_Documento=document.getElementById('Numero_Documento').style.border="2px solid #4caf50";
    var Numero_Documento=document.getElementById('Numero_Documento').value;
    $("#contenedor").load("mostrar_egresado.php",{Numero_Documento:Numero_Documento});
    return true;
  }


}


function validar_Nombre_Egresado() {
  var Nombre_Egresado=document.getElementById('Nombre_Egresado').value;
  Nombre_Egresado=Nombre_Egresado.toUpperCase();
  if(Nombre_Egresado==null  || Nombre_Egresado.length==0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Nombre_Egresado)){
    var Nombre_Egresado=document.getElementById('Nombre_Egresado').style.border="2px solid red"
    return false;

  }else if (isNaN(Nombre_Egresado)==false) {
    var Nombre_Egresado=document.getElementById('Nombre_Egresado').style.border="2px solid red"
    return false;

  }else if (Nombre_Egresado.length>50) {
    var Nombre_Egresado=document.getElementById('Nombre_Egresado').style.border="2px solid red";
    return false;

  }else{
    var Nombre_Egresado=document.getElementById('Nombre_Egresado').style.border="2px solid #4caf50";

    return true;
  }
}

function validar_Nombre_del_Proyecto() {
  var Nombre_del_Proyecto=document.getElementById('Nombre_del_Proyecto').value;
  Nombre_del_Proyecto=Nombre_del_Proyecto.toUpperCase();
  if(Nombre_del_Proyecto==null  || Nombre_del_Proyecto.length==0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Nombre_del_Proyecto)){
    var Nombre_del_Proyecto=document.getElementById('Nombre_del_Proyecto').style.border="2px solid red"
    return false;

  }else if (isNaN(Nombre_del_Proyecto)==false) {
    var Nombre_del_Proyecto=document.getElementById('Nombre_del_Proyecto').style.border="2px solid red"
    return false;

  }else if (Nombre_del_Proyecto.length>50) {
    var Nombre_del_Proyecto=document.getElementById('Nombre_del_Proyecto').style.border="2px solid red";
    return false;

  }else{
    var Nombre_del_Proyecto=document.getElementById('Nombre_del_Proyecto').style.border="2px solid #4caf50";

    return true;
  } 

}

function validar_Apellido_Egresado() {
  
  var Apellido_Egresado=document.getElementById('Apellido_Egresado').value;
  Apellido_Egresado=Apellido_Egresado.toUpperCase();
  if(Apellido_Egresado==null  || Apellido_Egresado.length==0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Apellido_Egresado)){
    var Apellido_Egresado=document.getElementById('Apellido_Egresado').style.border="2px solid red"
    return false;

  }else if (isNaN(Apellido_Egresado)==false) {
    var Apellido_Egresado=document.getElementById('Apellido_Egresado').style.border="2px solid red"
    return false;

  }else if (Apellido_Egresado.length>50) {
    var Apellido_Egresado=document.getElementById('Apellido_Egresado').style.border="2px solid red";
    return false;

  }else{
    var Apellido_Egresado=document.getElementById('Apellido_Egresado').style.border="2px solid #4caf50";

    return true;
  }
}


function validar_Funcion_Desempeña() {
  var Funcion_Desempeña=document.getElementById('Funcion_Desempeña').value;
  Funcion_Desempeña=Funcion_Desempeña.toUpperCase();
  if(Funcion_Desempeña==null  || Funcion_Desempeña.length==0 || /[\\^"'<>;ç`,_ª%&¿°¨Ç¡º#~¬€$.*+?=!:|\\/()\[\]{}]/.test(Funcion_Desempeña)){
    var Funcion_Desempeña=document.getElementById('Funcion_Desempeña').style.border="2px solid red"
    return false;

  }else if (isNaN(Funcion_Desempeña)==false) {
    var Funcion_Desempeña=document.getElementById('Funcion_Desempeña').style.border="2px solid red"
    return false;

  }else if (Funcion_Desempeña.length>50) {
    var Funcion_Desempeña=document.getElementById('Funcion_Desempeña').style.border="2px solid red";
    return false;

  }else{
    var Funcion_Desempeña=document.getElementById('Funcion_Desempeña').style.border="2px solid #4caf50";

    return true;
  } 

}

function validar_relacion_programa() {
  var relacion_programa=document.getElementById('relacion_programa').value;

  if (relacion_programa=="Seleccione") {
    var relacion_programa=document.getElementById("relacion_programa").style.border="2px solid red";
    return false;

  }else{

    var relacion_programa=document.getElementById("relacion_programa").style.border="2px solid #4caf50";
    return true;
  }
}

function registrar_nueva_empresa() {

  if (validar_nombre_empresa()==true && validar_municipio_empresa()==true ) {
    var Nit_Empresa=document.getElementById('Nit_Empresa').value;
    var nombredeempresa=document.getElementById('nombredeempresa').value;
    var Id_Municipio_empresa=document.getElementById('Id_Municipio_empresa').value;

    // if (validar_Nit_Empresa()==true && validar_nombre_empresa()==true && validar_municipio_empresa()==true ) {
    // var Nit_Empresa=document.getElementById('Nit_Empresa').value;
    // var nombredeempresa=document.getElementById('nombredeempresa').value;
    // var Id_Municipio_empresa=document.getElementById('Id_Municipio_empresa').value;


    $("#contenedor").load("registrar_nueva_empresa.php",{Nit_Empresa:Nit_Empresa,nombredeempresa:nombredeempresa,Id_Municipio_empresa:Id_Municipio_empresa});
  };
}
</script>


<script src="../../../assets/js/jquery-3.2.1.min.js"></script>    
<script src="../../../assets/js/bootstrap.min.js"></script> 
</body>
<?php
include'../include/scripts.php';
?>

<!-- <script>
  $('#fecha_nacimiento').datepicker({
        format: "yyyy/mm/dd",
        autoclose: true,
        todayHighlight: true,
        language: 'es'
      });

  $('#fecha_certificacion').datepicker({
        format: "yyyy/mm/dd",
        autoclose: true,
        todayHighlight: true,
        language: 'es'
      });

  $('#fecha_ingreso').datepicker({
        format: "yyyy/mm/dd",
        autoclose: true,
        todayHighlight: true,
        language: 'es'
      });

  $('#fecha_fin').datepicker({
        format: "yyyy/mm/dd",
        autoclose: true,
        todayHighlight: true,
        language: 'es'
      });
</script> -->
<?php

}
else
{
	echo "<script type='text/javascript'>alert('Acceso Denegado');location='../../../index.php?Acceso Denegado'</script>";
}  
?>
</html>


