<?php 
include '../../../../assets/conexion/conexion.php';

$Nombre_Etapa=$_POST["nombre_etapa"];

$query="SELECT * FROM `tipo_etapa_practica` WHERE `Nombre_Etapa`='$Nombre_Etapa'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	
	echo "<script>




swal({
  			title: 'Error!',
  			text: 'El Tipo Etapa $Nombre_Etapa ya existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})
	</script>";
}else{

$query="INSERT INTO `tipo_etapa_practica`(`Nombre_Etapa`) VALUES ('$Nombre_Etapa')";
$resource=mysqli_query($conexion,$query);


if ($resource==true) {
		
echo "<script>

 var cerrar_ficha=document.getElementById('cerrar_ficha').click();
		
		swal({
  			title: 'Registro Exitoso!',
  			text: 'Se ha Registrado Tipo De Etapa Practica ',
  			type: 'success',
  			
  			confirmButtonColor: '#238276'
			})

$('#Contenedor_Recargar').load('cargar_table/cargar_Etapas_Practicas.php');

		</script>";
//  		echo "<script>

// // window.location.href = 'registrar_tipo_etapa.php';
// // 		</script>";
}else{



	echo "<script>




swal({
  			title: 'Error!',
  			text: 'Error Al registrar',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})
	</script>";
}

}


 ?>