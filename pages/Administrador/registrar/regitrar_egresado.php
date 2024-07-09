<?php 

include '../../../assets/conexion/conexion.php';
session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 

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
$id_empresa=$_POST["id_empresa"];
$Funcion_Desempeña=$_POST["Funcion_Desempeña"];
$relacion_programa=$_POST["relacion_programa"];
$salario=$_POST["salario"];
$intensidad_horaria=$_POST["intensidad_horaria"];

$query="SELECT programas.nombre_Programa, fichas.numero_Ficha FROM `egresados` INNER JOIN programa_ficha ON egresados.id_Programa_Ficha=programa_ficha.id_Programa_Ficha INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha WHERE egresados.id_Programa_Ficha='$id_programa_ficha' AND `Numero_Documento`='$Numero_Documento'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	
	echo "<script>
	swal('Advertenvia','El Aprendiz $Nombre_Egresado  Ya es Egresado del programa de formacion $fila[0] Ficha $fila[1]','error');
	</script>";
}else{



// REGISTRAR EL EGRESADO
// -------------------------------------------------------------------
	$query="INSERT INTO `egresados`(`id_Programa_Ficha`, `FechaCertificacion`, `id_Tipo_Documento`, `Numero_Documento`, `Nombre_Aprendiz`, `Apellidos_Aprendiz`, `id_Municipio`, `Correo_Electronico`, `Telefono_Fijo`, `Telefono_Alterno`, `Telefono_Celular`, `Facebook`, `Sexo`, `Fecha_Nacimiento`, `Id_Situacion`, `id_Tipo_Etapa_Practica`, `Contactado`, `id_Usuario`) VALUES ('$id_programa_ficha','$fecha_certificacion','$Tipo_Doc','$Numero_Documento','$Nombre_Egresado','$Apellido_Egresado','$Id_Municipio','$Correo','$Telefono','$Telefono_2','$Celular','$Facebook','$Sexo','$fecha_nacimiento','$Id_Situacion','$Id_Tipo_Etapa_Practica','$contactado','$usuario')";
	$resource=mysqli_query($conexion,$query);
	if ($resource==true) {

		$Id_Egresado=mysqli_insert_id($conexion);

// AQUI HAGO LAS VALIDACIONES DE TIP DE ETAPA PRACTICA SEGUN ESO LO REGISTRO EN LA TABLA QUE ES

// aqui abajo es si ETAPA PRACTICA ES CON UNA EMPRESA
		if ($Id_Tipo_Etapa_Practica==3 || $Id_Tipo_Etapa_Practica==1) {
			$id_empresa_etapa=$_POST["id_empresa_etapa"];

// AQUI ABAJO LO REGISTRO EN LA TABLA DE ETAPA PRACTICA EGRESADO E INSERTO EL ID Registrado
			$query="INSERT INTO `etapa_practica_egresado`(`id_Egresado`, `id_Empresa`) VALUES ($Id_Egresado,$id_empresa_etapa)";
			$resource=mysqli_query($conexion,$query);



// AQUI ABAJO VALIDO LA SITUACION ACTUAL

// AQUI ABAJO VALIDO SI ESTA TRABAJANDO
			if ($Id_Situacion==2) {

				$id_empresa=$_POST["id_empresa"];
				$Funcion_Desempeña=$_POST["Funcion_Desempeña"];
				$relacion_programa=$_POST["relacion_programa"];
				$salario=$_POST["salario"];
				$intensidad_horaria=$_POST["intensidad_horaria"];

	// AQUI ABAJO REGISTRO LA SITUACION ACTUAL DEL EGRESADO SEGUN LA ANTERIOR VALIDACION
				$query="INSERT INTO `trabajando_egresado`(`id_Egresado`, `id_Empresa`, `Funcion_Desempena`, `Funcion_Relacion_Programa`, `Salario`, `Intensidad_Horaria`) VALUES ($Id_Egresado,$id_empresa,'$Funcion_Desempeña','$relacion_programa',$salario,'$intensidad_horaria')";
				$resource=mysqli_query($conexion,$query);


				if ($resource==true) {
					echo "<script>

					swal('Egresado Registrado','','success')
	window.location.href = 'index.php';
					</script>";

				}else{
					echo "<script>

					swal('Egresado No Registrado','','error')
					</script>";

				};

	// AQUI ABAJO VALIDO SI ESTA ESTUDIAndo
			}elseif ($Id_Situacion==3) {

				$query="INSERT INTO `estudiando_egresado`(`id_Egresado`, `Id_universidad`, `Nombre_Carrera`) VALUES ($Id_Egresado,$id_universidad,'$nombre_carrera')";
				$resource=mysqli_query($conexion,$query);

				if ($resource==true) {
					echo "<script>

					swal('Egresado Registrado','','success')
	window.location.href = 'index.php';
					</script>";

				}else{
					echo "<script>

					swal('Egresado No Registrado','','error')
					</script>";

				};

			}





// AQUI ABAJO SI TIPO DE ETAPA ES UN PROYECTO PRODUCTIVO
		}else if ($Id_Tipo_Etapa_Practica==5){



// AQUI ABAJO LO REGISTRO EN LA TABLA DE ETAPA PRACTICA EGRESADO E INSERTO EL ID Registrado
			$query="INSERT INTO `etapa_practica_egresado`(`id_Egresado`, `Nombre_Proyecto`) VALUES ($Id_Egresado,'$Nombre_del_Proyecto')";
			$resource=mysqli_query($conexion,$query);



// AQUI ABAJO VALIDO LA SITUACION ACTUAL

// AQUI ABAJO VALIDO SI ESTA TRABAJANDO
			if ($Id_Situacion==2) {

				$id_empresa=$_POST["id_empresa"];
				$Funcion_Desempeña=$_POST["Funcion_Desempeña"];
				$relacion_programa=$_POST["relacion_programa"];
				$salario=$_POST["salario"];
				$intensidad_horaria=$_POST["intensidad_horaria"];

	// AQUI ABAJO REGISTRO LA SITUACION ACTUAL DEL EGRESADO SEGUN LA ANTERIOR VALIDACION
				$query="INSERT INTO `trabajando_egresado`(`id_Egresado`, `id_Empresa`, `Funcion_Desempena`, `Funcion_Relacion_Programa`, `Salario`, `Intensidad_Horaria`) VALUES ($Id_Egresado,$id_empresa,'$Funcion_Desempeña','$relacion_programa',$salario,'$intensidad_horaria')";
				$resource=mysqli_query($conexion,$query);


				if ($resource==true) {
					echo "<script>

					swal('Egresado Registrado','','success')
	window.location.href = 'index.php';
					</script>";

				}else{
					echo "<script>

					swal('Egresado No Registrado','','error')
					</script>";

				};

	// AQUI ABAJO VALIDO SI ESTA ESTUDIAndo
			}elseif ($Id_Situacion==3) {

				$query="INSERT INTO `estudiando_egresado`(`id_Egresado`, `Id_universidad`, `Nombre_Carrera`) VALUES ($Id_Egresado,$id_universidad,'$nombre_carrera')";
				$resource=mysqli_query($conexion,$query);

				if ($resource==true) {
					echo "<script>

					swal('Egresado Registrado','','success')
window.location.href = 'index.php';
					</script>";

				}else{
					echo "<script>

					swal('Egresado No Registrado','','error')
					</script>";

				};

			}




		}



	}else{

		echo "<script>

		swal('Egresado No Registrado','','error')
		</script>";

	}


}

?>