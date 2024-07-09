<?php 

include '../../../assets/conexion/conexion.php';
session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 

$id_egresado=$_POST["id_egresado"];

// DATOS PROGRAMA FORMACION
$id_programa_ficha=$_POST["id_programa_ficha"];
$fecha_certificacion=$_POST["fecha_certificacion"];

// DATOS APRENDIZ
$Tipo_Doc=$_POST["Tipo_Doc"];
$Numero_Documento=$_POST["Numero_Documento"];
$Nombre_Egresado=$_POST["Nombre_Egresado"];
$Apellido_Egresado=$_POST["Apellido_Egresado"];
$Id_Municipio=$_POST["Id_Municipio"];
$Correo=$_POST["Correo"];
$Telefono=$_POST["Telefono"];
$Telefono_2=$_POST["Telefono_2"];
$Celular=$_POST["Celular"];
$Facebook=$_POST["Facebook"];
$Sexo=$_POST["Sexo"];
$fecha_nacimiento=$_POST["fecha_nacimiento"];


// DATOS ETAPA PRACTICA
$Id_Tipo_Etapa_Practica=$_POST["Id_Tipo_Etapa_Practica"];
$id_empresa_etapa=$_POST["id_empresa_etapa"];
$Nombre_del_Proyecto=$_POST["Nombre_del_Proyecto"];

// DATOS SITUACION ACTUAL

$Id_Situacion=$_POST["Id_Situacion"];
$nombre_carrera=$_POST["nombre_carrera"];
$id_universidad=$_POST["id_universidad"];
$contactado=$_POST["contactado"];
$id_empresa=$_POST["id_empresa"];
$Funcion_Desempeña=$_POST["Funcion_Desempeña"];
$relacion_programa=$_POST["relacion_programa"];
$salario=$_POST["salario"];
$intensidad_horaria=$_POST["intensidad_horaria"];

			$query="SELECT  `Id_Situacion` from egresados WHERE `id_Egresado`=$id_egresado";
			$resource=mysqli_query($conexion,$query);
			$fila=mysqli_fetch_row($resource);

			$situacion_actual=$fila[0];

$query="UPDATE `egresados` SET `id_Programa_Ficha`=$id_programa_ficha,`FechaCertificacion`='$fecha_certificacion',`id_Tipo_Documento`='$Tipo_Doc',`Numero_Documento`=$Numero_Documento,`Nombre_Aprendiz`='$Nombre_Egresado',`Apellidos_Aprendiz`='$Apellido_Egresado',`id_Municipio`=$Id_Municipio,`Correo_Electronico`='$Correo',`Telefono_Fijo`=$Telefono,`Telefono_Alterno`=$Telefono_2,`Telefono_Celular`=$Celular,`Facebook`='$Facebook',`Sexo`='$Sexo',`Fecha_Nacimiento`='$fecha_nacimiento',`Id_Situacion`=$Id_Situacion,`id_Tipo_Etapa_Practica`=$Id_Tipo_Etapa_Practica,`Fecha_Ultima_Actualizacion`=NOW(),`Contactado`='$contactado'WHERE id_Egresado=$id_egresado";

$resource=mysqli_query($conexion,$query);

if ($resource==true) {

// TIPO DE ETAPA PRACTICA
// -------------------------------------------------------------------------------------------------

// AQUI VALIDO SI ES UNA EMPRESA
	if ($Id_Tipo_Etapa_Practica==1 || $Id_Tipo_Etapa_Practica==3) {


$query="UPDATE `etapa_practica_egresado` SET `id_Empresa`=$id_empresa_etapa,`Nombre_Proyecto`=NULL WHERE id_Egresado=$id_egresado";

$resource=mysqli_query($conexion,$query);


// AQUI VALIDO LA SITUACION ACTUAL
// --------------------------------------------------------------------------------------------
		if ($resource==true) {




// COMPARO SI HAY ALGUN CAMBIO DE SITUACION
// ------------------------------------------------------------------------

			if ($situacion_actual==$Id_Situacion) {

// AQUI VOY SOLAMENTE A ACTUALIZAR
// ------------------------------------------------------------------------

// VALIDO TRABAJANDO
// ----------------------------------------------------------------------------------------------------
				if ($Id_Situacion==2) {

					$query="UPDATE `trabajando_egresado` SET `id_Empresa`=$id_empresa,`Funcion_Desempena`='$Funcion_Desempeña',`Funcion_Relacion_Programa`='$relacion_programa',`Salario`=$salario,`Intensidad_Horaria`='$intensidad_horaria' WHERE `id_Egresado`=$id_egresado";
					$resource=mysqli_query($conexion,$query);

// AQUI SE TERMINA DE ACTUALIZAR TODO
					if ($resource==true) {
						echo "<script>
						swal('Actualizacion Exitosa','','success');
// window.location.href = 'index.php';
						</script>";
					}else{
						echo "<script>

						swal('Egresado No Actualizado','','error')
						</script>";	
					}


// VALIDO ESTUDIANDO
// ----------------------------------------------------------------------------------------------------	
				}else if ($Id_Situacion==3) {

					$query="UPDATE `estudiando_egresado` SET `Id_universidad`=$id_universidad,`Nombre_Carrera`='$nombre_carrera' WHERE `id_Egresado`=$id_egresado";
					$resource=mysqli_query($conexion,$query);

// AQUI SE TERMINA DE ACTUALIZAR TODO
					if ($resource==true) {
						echo "<script>
						swal('Actualizacion Exitosa','','success');
// window.location.href = 'index.php';
						</script>";
					}else{
						echo "<script>

						swal('Egresado No Actualizado','','error')
						</script>";
					}

				}



// AQUI ABAJO LO QUE HAGO ES ELIMINAR EL REGISTRO EXISTENTE Y CREAR UNO DE LA OTRA TABLA COMO LA SITUACION CAMBIO
// -----------------------------------------------------------------------------------------------------
			}else {

// VALIDO TRABAJANDO
// ----------------------------------------------------------------------------------------------------
				if ($Id_Situacion==2) {

					$query="DELETE FROM `estudiando_egresado` WHERE `id_Egresado`=$id_egresado";
					$resource=mysqli_query($conexion,$query);

					$query="INSERT INTO `trabajando_egresado`(`id_Egresado`, `id_Empresa`, `Funcion_Desempena`, `Funcion_Relacion_Programa`, `Salario`, `Intensidad_Horaria`) VALUES ($id_egresado,$id_empresa,'$Funcion_Desempeña','$relacion_programa',$salario,'$intensidad_horaria')";
					$resource=mysqli_query($conexion,$query);

// AQUI SE TERMINA DE ACTUALIZAR TODO
					if ($resource==true) {
						echo "<script>
						swal('Actualizacion Exitosa','','success');
window.location.href = 'index.php';
						</script>";
					}else{
						echo "<script>

						swal('Egresado No Actualizado','','error')
						</script>";
					}


// VALIDO ESTUDIANDO
// ----------------------------------------------------------------------------------------------------	
				}else if ($Id_Situacion==3) {
										$query="DELETE FROM `trabajando_egresado` WHERE `id_Egresado`=$id_egresado";
					$resource=mysqli_query($conexion,$query);

					$query="INSERT INTO `estudiando_egresado`(`id_Egresado`, `Id_universidad`, `Nombre_Carrera`) VALUES ($id_egresado,$id_universidad,'$nombre_carrera')";
					$resource=mysqli_query($conexion,$query);

// AQUI SE TERMINA DE ACTUALIZAR TODO
					if ($resource==true) {
						echo "<script>
						swal('Actualizacion Exitosa','','success');
// window.location.href = 'index.php';
						</script>";
					}else{
						echo "<script>

						swal('Egresado No Actualizado','','error')
						</script>";
					}

				}


			}
// --------------------------------------------------------------------------------------------------------



		}else{

				echo "<script>

	swal('Egresado No Actualizado','','error')
	</script>";
		}


// VALIDO EL PROYECTO PRODUCTIVO
	}		else if ($Id_Tipo_Etapa_Practica==5) {

		$query="UPDATE `etapa_practica_egresado` SET `id_Empresa`=NULL,`Nombre_Proyecto`='$Nombre_del_Proyecto' WHERE id_Egresado=$id_egresado";

		$resource=mysqli_query($conexion,$query);
// AQUI VALIDO LA SITUACION ACTUAL
// --------------------------------------------------------------------------------------------
		if ($resource==true) {


// COMPARO SI HAY ALGUN CAMBIO DE SITUACION
// ------------------------------------------------------------------------

			if ($situacion_actual==$Id_Situacion) {

// AQUI VOY SOLAMENTE A ACTUALIZAR
// ------------------------------------------------------------------------

// VALIDO TRABAJANDO
// ----------------------------------------------------------------------------------------------------
				if ($Id_Situacion==2) {

					$query="UPDATE `trabajando_egresado` SET `id_Empresa`=$id_empresa,`Funcion_Desempena`='$Funcion_Desempeña',`Funcion_Relacion_Programa`='$relacion_programa',`Salario`=$salario,`Intensidad_Horaria`='$intensidad_horaria' WHERE `id_Egresado`=$id_egresado";
					$resource=mysqli_query($conexion,$query);

// AQUI SE TERMINA DE ACTUALIZAR TODO
					if ($resource==true) {
						echo "<script>
						swal('Actualizacion Exitosa','','success');
// window.location.href = 'index.php';
						</script>";
					}else{
						echo "<script>

						swal('Egresado No Actualizado','','error')
						</script>";	
					}


// VALIDO ESTUDIANDO
// ----------------------------------------------------------------------------------------------------	
				}else if ($Id_Situacion==3) {

					$query="UPDATE `estudiando_egresado` SET `Id_universidad`=$id_universidad,`Nombre_Carrera`='$nombre_carrera' WHERE `id_Egresado`=$id_egresado";
					$resource=mysqli_query($conexion,$query);

// AQUI SE TERMINA DE ACTUALIZAR TODO
					if ($resource==true) {
						echo "<script>
						swal('Actualizacion Exitosa','','success');
// window.location.href = 'index.php';
						</script>";
					}else{
						echo "<script>

						swal('Egresado No Actualizado','','error')
						</script>";
					}

				}



// AQUI ABAJO LO QUE HAGO ES ELIMINAR EL REGISTRO EXISTENTE Y CREAR UNO DE LA OTRA TABLA COMO LA SITUACION CAMBIO
// -----------------------------------------------------------------------------------------------------
			}else {

// VALIDO TRABAJANDO
// ----------------------------------------------------------------------------------------------------
				if ($Id_Situacion==2) {

					$query="DELETE FROM `estudiando_egresado` WHERE `id_Egresado`=$id_egresado";
					$resource=mysqli_query($conexion,$query);

					$query="INSERT INTO `trabajando_egresado`(`id_Egresado`, `id_Empresa`, `Funcion_Desempena`, `Funcion_Relacion_Programa`, `Salario`, `Intensidad_Horaria`) VALUES ($id_egresado,$id_empresa,'$Funcion_Desempeña','$relacion_programa',$salario,'$intensidad_horaria')";
					$resource=mysqli_query($conexion,$query);

// AQUI SE TERMINA DE ACTUALIZAR TODO
					if ($resource==true) {
						echo "<script>
						swal('Actualizacion Exitosa','','success');
// window.location.href = 'index.php';
						</script>";
					}else{
						echo "<script>

						swal('Egresado No Actualizado','','error')
						</script>";
					}


// VALIDO ESTUDIANDO
// ----------------------------------------------------------------------------------------------------	
				}else if ($Id_Situacion==3) {
										$query="DELETE FROM `trabajando_egresado` WHERE `id_Egresado`=$id_egresado";
					$resource=mysqli_query($conexion,$query);

					$query="INSERT INTO `estudiando_egresado`(`id_Egresado`, `Id_universidad`, `Nombre_Carrera`) VALUES ($id_egresado,$id_universidad,'$nombre_carrera')";
					$resource=mysqli_query($conexion,$query);

// AQUI SE TERMINA DE ACTUALIZAR TODO
					if ($resource==true) {
						echo "<script>
						swal('Actualizacion Exitosa','','success');
// window.location.href = 'index.php';
						</script>";
					}else{
						echo "<script>

						swal('Egresado No Actualizado','','error')
						</script>";
					}

				}


			}
// --------------------------------------------------------------------------------------------------------


		}else{
					// echo "<script>

					// 	swal('Egresado No Actualizado','','error')
					// 	</script>";
			echo "<script>

		swal({
  			title: 'Error!',
  			text: 'Egresado No Actualizado',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
		}



	}







}else{

	// echo "<script>

	// swal('Egresado No Actualizado','','error')
	// </script>";

	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'Egresado No Actualizado',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}

?>