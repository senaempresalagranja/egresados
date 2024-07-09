<?php 
include '../../../../assets/conexion/conexion.php';
$id_Egresado=$_POST["id_Egresado"];
$Nombre_Etapa=$_POST["nombre_etapa"];

$query="SELECT * FROM `tipo_etapa_practica` WHERE `Nombre_Etapa`='$Nombre_Etapa' AND `Id_Tipo_Etapa_Practica`!=$id_Egresado";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	
	echo "<script>

swal('ERROR','Tipo de Etapa Ya existe','error')


swal({
  			title: 'Error!',
  			text: 'El Tipo Etapa Practica $Nombre_Etapa ya existe ',
  			type: 'error',
  			
  			confirmButtonColor: '#238276'
			})
	</script>";
}else{

$query="UPDATE `tipo_etapa_practica` SET `Nombre_Etapa`='$Nombre_Etapa' WHERE `Id_Tipo_Etapa_Practica`=$id_Egresado";
$resource=mysqli_query($conexion,$query);


if ($resource==true) {
		

		echo "<script>
		
		swal({
  			title: 'Actualizacion Exitosa!',
  			text: 'Se ha Actualizado Un Tipo De Etapa Practica ',
  			type: 'success',
  			
  			confirmButtonColor: '#238276'
			}).then(function() {
    			 window.location = './Reg-tipo_etapa.php';
			 });

		</script>";
}else{



	echo "<script>

swal('Error al actualizar','',''error);
	</script>";
}

}


 ?>