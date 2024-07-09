<?php 

include '../../../../assets/conexion/conexion.php';

$id_Empresa=$_POST["id_Empresa"];
$Nombre_Empresa=$_POST["Nombre_Empresa"];
$Nit_Empresa=$_POST["Nit_Empresa"];
$id_Municipio=$_POST["id_Municipio"];


$query="SELECT * FROM empresa WHERE Nombre_Empresa='$Nombre_Empresa' AND  id_Empresa!='$id_Empresa'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {

			$query="UPDATE empresa SET Nombre_Empresa='$Nombre_Empresa',Nit_Empresa='$Nit_Empresa',id_Municipio='$id_Municipio' WHERE id_Empresa='$id_Empresa'"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

		swal({
  			title: 'Actualización Exitosa',
  			text: 'Acaba de actualizar una empresa',
  			type: 'success',
  			confirmButtonColor: '#238276'
			}).then(function() {
    			 window.location = './Reg-Empresa.php';
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
  			text: 'La empresa ya existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";

}









 ?>