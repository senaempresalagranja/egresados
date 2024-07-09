<?php 

include '../../../assets/conexion/conexion.php';

$Nombre_universidad=$_POST["Nombre_universidad"];
$Id_Municipio_universidad=$_POST["Id_Municipio_universidad"];


$query="SELECT * FROM `universidades` WHERE `Nombre_universidad`='$Nombre_universidad'  AND `id_Municipio`=$Id_Municipio_universidad";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);


if ($fila==true) {
	
	echo "<script>
swal('Error','La Universidad Ya Existe','error')
	</script>";
}else{

$query="INSERT INTO `universidades`(`Nombre_universidad`, `id_Municipio`) VALUES ('$Nombre_universidad','$Id_Municipio_universidad')";
$resource=mysqli_query($conexion,$query);
$id_empresa=mysqli_insert_id($conexion);
if ($resource==true) {
	echo "<script>


swal({
  			title: 'Registro Exitoso!',
  			text: 'Se ha Registrado una Universidad',
 			type: 'success',
  			confirmButtonColor: '#238276'
		});

var cerrar_modal_universidad=document.getElementById('cerrar_modal_universidad').click();
$('#id_universidad').load('cargar_universidades.php');


	</script>";
}

}

 ?>