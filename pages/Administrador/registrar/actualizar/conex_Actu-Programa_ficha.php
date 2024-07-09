<?php

include '../../../../assets/conexion/conexion.php';

$id_Programa_Ficha=$_POST["id_Programa_Ficha"];
$id_Programa=$_POST["id_Programa"];
$id_Ficha=$_POST["id_Ficha"];
$Fecha_Ingreso=$_POST["Fecha_Ingreso"];
$Fecha_Fin=$_POST["Fecha_Fin"];
$Matriculados=$_POST["Matriculados"];
$Graduados=$_POST["Graduados"];


$query="SELECT * FROM programa_ficha WHERE id_Ficha='$id_Ficha' AND  id_Programa_Ficha!='$id_Programa_Ficha'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {

			$query="UPDATE programa_ficha SET 
			id_Programa='$id_Programa',
			id_Ficha='$id_Ficha',
			Fecha_Ingreso='$Fecha_Ingreso',
			Fecha_Fin='$Fecha_Fin',
			Matriculados='$Matriculados',
			Graduados='$Graduados'

			 WHERE id_Programa_Ficha='$id_Programa_Ficha'"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

		swal({
  			title: 'Actualización Exitosa',
  			text: 'Acaba de actualizar una asignacion de ficha',
  			type: 'success',
  			confirmButtonColor: '#238276'
			}).then(function() {
    			 window.location = './Reg-Asignar_Programa-Ficha.php';
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
  			text: 'Esta Ficha ya Fue Asiganada A Otro Programa',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}









 ?>