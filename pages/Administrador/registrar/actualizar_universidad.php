<?php 
 include '../include/conexion.php';

$Id_universidad=$_POST["Id_universidad"];
$nombre_universidad=$_POST["nombre_universidad"];
$Id_Municipio_universidad=$_POST["Id_Municipio_universidad"];

$query="SELECT `Id_universidad`, `Nombre_universidad`, `id_Municipio` FROM `universidades` WHERE `Id_universidad`!=$Id_universidad AND `Nombre_universidad`='$nombre_universidad' AND `id_Municipio`='$Id_Municipio_universidad'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	echo "<script>

swal('Universidad Ya existe','','error');
	</script>";
}else{
$query="UPDATE `universidades` SET `Nombre_universidad`='$nombre_universidad',`id_Municipio`='$Id_Municipio_universidad' WHERE `Id_universidad`=$Id_universidad";
$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	
	echo "<script>

swal({
  			title: 'Actualización Exitosa',
  			text: 'Acaba de actualizar una Universidad',
  			type: 'success',
  			confirmButtonColor: '#238276'
			}).then(function() {
    			 window.location = 'Reg-Universidad.php';
			 });

	</script>";
}


}


 ?>