<?php 
session_start();
include '../../../assets/conexion/conexion.php';
  $usuario=($_SESSION['ADMINISTRADOR']); 

$nuevo_programa_formacion=$_POST["nuevo_programa_formacion"];
$tipo_programa=$_POST["tipo_programa"];
$duracion_programa=$_POST["duracion_programa"];

$query="SELECT * FROM `programas` WHERE `nombre_Programa`='$nuevo_programa_formacion'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	
	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'El Programa $nombre_Programa Ya Existe',
  			type: 'error',
  			
  			confirmButtonColor: '#238276'
			})

	  </script>";
}else{

$query="INSERT INTO `programas`(`nombre_Programa`, `id_Tipo_Programa`, `duracion`, `id_Usuario`) VALUES ('$nuevo_programa_formacion',$tipo_programa,$duracion_programa,$usuario)";
$resource=mysqli_query($conexion,$query);

$id_programa=mysqli_insert_id($conexion);
if ($resource==true) {
	
		echo "<script>


cambiar_id_programa('$id_programa');

inicio();
var cerrar_modal_asignacion=document.getElementById('cerrar_modal_asignacion').click();
	var contenedor_programa_formacion=document.getElementById('contenedor_programa_formacion').style.display='none';
		var contenedor_asignar_ficha_programa=document.getElementById('contenedor_asignar_ficha_programa').style.display='none';
		
swal({
  			title: 'Registro Exitoso!',
  			text: 'Se ha Registrado Un programa De formación ',
  			type: 'success',
  			
  			confirmButtonColor: '#238276'
			});



	</script>";	
}

}


 ?>