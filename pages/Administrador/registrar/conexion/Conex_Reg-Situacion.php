<?php

include '../../../../assets/conexion/conexion.php';

$Nombre_Situacion=$_POST["Nombre_Situacion"];


// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM situacion WHERE Nombre_Situacion='$Nombre_Situacion'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {



				// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
			$query="INSERT INTO situacion (Nombre_Situacion) 
			VALUES ('$Nombre_Situacion')"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

 var cerrar_ficha=document.getElementById('cerrar_ficha').click();

		swal({
  			title: 'Registro Exitoso!',
  			text: 'Se ha Registrado Una Situacion ',
  			type: 'success',
  			
  			confirmButtonColor: '#238276'
			})

$('#Contenedor_Recargar').load('cargar_table/cargar_Situacion.php');

		</script>
";
	
}else{
	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'Registro No Exitoso',
  			type: 'error',
  			
  			confirmButtonColor: '#238276'
			})

	  </script>";
}


}else {
	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'La situacion $Nombre_Situacion Ya Existe',
  			type: 'error',
  			
  			confirmButtonColor: '#238276'
			})

	  </script>";
}




 ?>