<?php 

include '../../../assets/conexion/conexion.php';
session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 

// DATOS APRENDIZ
$id_programa_ficha=$_POST["id_programa_ficha"];
$fecha_certificacion=$_POST["fecha_certificacion"];
$id_egresado=$_POST["id_egresado"];

$Id_asociacion_egresados=$_POST["Id_asociacion_egresados"];

$query="SELECT * FROM `asociacion_egresados` WHERE `id_Egresado`=$id_egresado  AND `id_Programa_Ficha`=$id_programa_ficha AND Id_asociacion_egresados!=$Id_asociacion_egresados";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	
	// echo "<script>

	// swal('El Egresado ya estudio esa carrera','','error');

	// </script>";

	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'El Egresado Ya Estudio Esa Carrera',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";

}else{




	$query="UPDATE `asociacion_egresados` SET `id_Programa_Ficha`='$id_programa_ficha',`FechaCertificacion`='$fecha_certificacion',`Ultima_Actualizacion`=NOW() WHERE Id_asociacion_egresados=$Id_asociacion_egresados";
	$resource=mysqli_query($conexion,$query);
	if ($resource==true) {
		echo "<script>


		

		swal({
  			title: 'Actualización Exitosa',
  			text: 'Datos De Programa De Formacion Actualizados',
  			type: 'success',
  			confirmButtonColor: '#238276'
			});

mostrar_programas_realizados();
var boton_registrar_asociacion_programa_ficha=document.getElementById('boton_registrar_asociacion_programa_ficha').style.display='block';
var boton_actualizar_asociacion_programa_ficha=document.getElementById('boton_actualizar_asociacion_programa_ficha').style.display='none';

		</script>";
	}else{

		echo "<script>


		swal('ACTUALIZACION NO REGISTRADA','','error');

		</script>";
	}

}


?>
