<?php 

include '../../../../assets/conexion/conexion.php';


$id_Municipio=$_POST["id_Municipio"];
$id_Departamento=$_POST["id_Departamento"];
$nombre_Municipio=$_POST["nombre_Municipio"];

// echo "$id_Municipio,$id_Departamento,$nombre_Municipio";

$query="SELECT * FROM municipios WHERE nombre_Municipio='$nombre_Municipio' AND  id_Municipio!='$id_Municipio'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {

			$query="UPDATE `municipios` SET `id_Departamento`='$id_Departamento', `nombre_Municipio`='$nombre_Municipio'  WHERE id_Municipio='$id_Municipio'"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

		swal({
  			title: 'Actualización Exitosa',
  			text: 'Acaba de actualizar un Municipio',
  			type: 'success',
  			confirmButtonColor: '#238276'
			}).then(function() {
    			 window.location = './Reg-Municipio.php';
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
  			text: 'El $municipios Ya existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";

}









 ?>