<?php 
include '../../../assets/conexion/conexion.php';



$id_egresado=$_POST["id_egresado"];
$contactado=$_POST["contactado"];
$query="SELECT * FROM `contactacion` WHERE `id_Egresado`=$id_egresado";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==true) {
	

	  echo "<script>

		swal({
  			title: 'Actualizacion Exitosa!',
  			type: 'success',
  			confirmButtonColor: '#238276'
			})

	  </script>";
	
$query="UPDATE `contactacion` SET `contactado`='$contactado',`actualizacion`=NOW() WHERE `id_Egresado`=$id_egresado";

$resource=mysqli_query($conexion,$query);

}else{
	echo "<script>

		swal({
  			title: 'Registro Exitoso!',
  			type: 'success',
  			confirmButtonColor: '#238276'
			})

	  </script>";
$query="INSERT INTO `contactacion`(`id_Egresado`, `contactado`,`actualizacion`) VALUES ('$id_egresado','$contactado', NOW())";

$resource=mysqli_query($conexion,$query);
	
}



 ?>