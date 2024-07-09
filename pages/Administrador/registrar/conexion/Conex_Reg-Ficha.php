<?php
session_start();
include '../../../../assets/conexion/conexion.php';
  $usuario=($_SESSION['ADMINISTRADOR']);       


$numero_Ficha=$_POST["numero_Ficha"];

$query="SELECT * FROM `fichas` WHERE `numero_Ficha`=$numero_Ficha";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);


if ($fila==false) {
	$query="INSERT INTO `fichas`(`numero_Ficha`, `id_Usuario`) VALUES ($numero_Ficha,$usuario)";
$resource=mysqli_query($conexion,$query);

if ($resource==true) {
	
	echo "<script>

 var cerrar_ficha=document.getElementById('cerrar_ficha').click();
		
		swal({
  			title: 'Registro Exitoso!',
  			text: 'Se ha Registrado una Ficha ',
  			type: 'success',
  			
  			confirmButtonColor: '#238276'
			})

$('#Contenedor_Recargar').load('cargar_table/cargar_fichas.php');

		</script>
";
}else{
	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'Registro No Exitoso',
  			type: 'error',
  			
  			confirmButtonColor: '#238276'
			})

	  </script>";
};


}else{

	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'El Numero $numero_Ficha Ya Existe',
  			type: 'error',
  			
  			confirmButtonColor: '#238276'
			})

	  </script>";
}



 ?>












