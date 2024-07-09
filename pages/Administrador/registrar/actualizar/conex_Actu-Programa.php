<?php 

include '../../../../assets/conexion/conexion.php';


$id_Programa=$_POST["id_Programa"];
$nombre_Programa=$_POST["nombre_Programa"];
$id_Tipo_Programa=$_POST["id_Tipo_Programa"];
$duracion=$_POST["duracion"];


$query="SELECT * FROM programas WHERE nombre_Programa='$nombre_Programa' AND  id_Tipo_Programa=$id_Tipo_Programa AND id_Programa!='$id_Programa'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {

			$query="UPDATE programas SET nombre_Programa='$nombre_Programa',id_Tipo_Programa='$id_Tipo_Programa',duracion='$duracion' WHERE id_Programa='$id_Programa' "; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

		swal({
  			title: 'Actualización Exitosa',
  			text: 'Acaba de actualizar un programa',
  			type: 'success',
  			confirmButtonColor: '#238276'
			}).then(function() {
    			 window.location = './Reg-Programa.php';
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
  			text: 'Programa Ya Existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";

}








 ?>