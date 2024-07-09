<?php 

include '../../../../assets/conexion/conexion.php';

$Id_Situacion=$_POST["Id_Situacion"];
$Nombre_Situacion=$_POST["Nombre_Situacion"];


$query="SELECT * FROM situacion WHERE Nombre_Situacion='$Nombre_Situacion' AND  Id_Situacion!='$Id_Situacion'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {

			$query="UPDATE situacion SET Nombre_Situacion='$Nombre_Situacion' WHERE Id_Situacion='$Id_Situacion'"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

		swal({
  			title: 'Actualización Exitosa',
  			text: 'Acaba de actualizar una Situacion',
  			type: 'success',
  			confirmButtonColor: '#238276'
			}).then(function() {
    			 window.location = './Reg-Situacion.php';
			 });

	  </script>";
	
}else{
	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'Actualización No Exitosa',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}

}else{

	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'Esta situacion ya existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";

}








 ?>