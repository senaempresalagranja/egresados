<?php 

include '../../../../assets/conexion/conexion.php';


$id_Ficha=$_POST["id_Ficha"];
$numero_Ficha=$_POST["numero_Ficha"];



$query="SELECT * FROM fichas WHERE numero_Ficha='$numero_Ficha' AND  id_Ficha!='$id_Ficha'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {

			$query="UPDATE fichas SET numero_Ficha='$numero_Ficha' WHERE id_Ficha='$id_Ficha'"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

		swal({
  			title: 'Actualización Exitosa',
  			text: 'Acaba de actualizar una ficha',
  			type: 'success',
  			confirmButtonColor: '#238276'
			}).then(function() {
    			 window.location = './Reg-Ficha.php';
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
  			text: 'La ficha $numero_Ficha Ya existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";

}








 ?>