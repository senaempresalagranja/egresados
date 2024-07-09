<?php 

include '../../../../assets/conexion/conexion.php';

$id_Departamento=$_POST["id_Departamento"];
$nombre_Departamento=$_POST["nombre_Departamento"];


$query="SELECT * FROM departamentos WHERE nombre_Departamento='$nombre_Departamento' AND  id_Departamento!='$id_Departamento'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {

			$query="UPDATE departamentos SET nombre_Departamento='$nombre_Departamento' WHERE id_Departamento='$id_Departamento'"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

		swal({
  			title: 'Actualización Exitosa',
  			text: 'Acaba de actualizar un Departamento',
  			type: 'success',
  			confirmButtonColor: '#238276'
			}).then(function() {
    			 window.location = './Reg-Departamento.php';
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
  			text: 'Este departamento ya existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";

}









 ?>