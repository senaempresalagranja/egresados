<?php 

include '../../../assets/conexion/conexion.php';
session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 

// DATOS APRENDIZ
$id_programa_ficha=$_POST["id_programa_ficha"];
$fecha_certificacion=$_POST["fecha_certificacion"];
$id_egresado=$_POST["id_egresado"];

$query="SELECT * FROM `asociacion_egresados` WHERE `id_Egresado`=$id_egresado  AND `id_Programa_Ficha`=$id_programa_ficha";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	
	echo "<script>



	swal({
            title: 'Error!',
            text: 'El Egresado ya estudio esa carrera',
            type: 'error',
            confirmButtonColor: '#238276'
        });

	</script>";

}else{




	$query="INSERT INTO `asociacion_egresados`(`id_Egresado`, `id_Programa_Ficha`, `FechaCertificacion`, `Ultima_Actualizacion`) VALUES ($id_egresado,$id_programa_ficha,'$fecha_certificacion',NOW())";
	$resource=mysqli_query($conexion,$query);
	if ($resource==true) {
		echo "<script>


		swal({
            title: 'Asociacion Registrada!',
            type: 'success',
            confirmButtonColor: '#238276'
        });

mostrar_programas_realizados();

		</script>";
	}else{

		echo "<script>


	

		swal({
            title: 'Error!',
            text: 'Asociacion No Registrada',
            type: 'error',
            confirmButtonColor: '#238276'
        });

		</script>";
	}

}


?>
