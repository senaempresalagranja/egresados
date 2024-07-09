<?php 
  include '../../../../assets/conexion/conexion.php';

$nombre_universidad=$_POST["nombre_universidad"];
$Id_Municipio_universidad=$_POST["Id_Municipio_universidad"];


$query="SELECT * FROM `universidades` WHERE `Nombre_universidad`='$nombre_universidad' AND `id_Municipio`=$Id_Municipio_universidad";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	
	echo "<script>


swal({
  			title: 'Error!',
  			text: 'La Universidad $nombre_universidad Ya Existe',
  			type: 'error',
  			
  			confirmButtonColor: '#238276'
			})
	</script>";
}else{

$query="INSERT INTO `universidades`(`Nombre_universidad`, `id_Municipio`) VALUES ('$nombre_universidad',$Id_Municipio_universidad)";
$resource=mysqli_query($conexion,$query);


if ($resource==true) {
		

// 		echo "<script>

// window.location.href = 'universidades.php';
// 		</script>";

		// echo "<script>

		// swal({
  // 			title: 'Registro Exitoso!',
  // 			text: 'Se ha Registrado una Universidad',
  // 			type: 'success',
  			
  // 			confirmButtonColor: '#238276'
		// 	})

	 //  </script>";

	echo "<script>

 var cerrar_ficha=document.getElementById('cerrar_ficha').click();
		swal({
  			title: 'Registro Exitoso!',
  			text: 'Se ha Registrado una Universidad',
 			type: 'success',
  			confirmButtonColor: '#238276'
		})
$('#Contenedor_Recargar').load('cargar_table/cargar_Universidad.php');

		</script>
";
}else{



	echo "<script>

swal('Error al Registrar','',''error);
	</script>";
}

}


 ?>