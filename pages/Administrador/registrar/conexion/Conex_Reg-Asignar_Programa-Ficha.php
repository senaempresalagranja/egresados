

<?php

include '../../../../assets/conexion/conexion.php';

$id_Programa=$_POST["id_Programa"];
$id_Ficha=$_POST["id_Ficha"];
$Fecha_Ingreso=$_POST["Fecha_Ingreso"];
$Fecha_Fin=$_POST["Fecha_Fin"];
$Matriculados=$_POST["Matriculados"];
$Graduados=$_POST["Graduados"];

// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM programa_ficha WHERE id_Ficha='$id_Ficha'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {



				// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
			$query="INSERT INTO programa_ficha (id_Programa,id_Ficha,Fecha_Ingreso,Fecha_Fin,Matriculados,Graduados) 
			VALUES ('$id_Programa','$id_Ficha','$Fecha_Ingreso','$Fecha_Fin','$Matriculados','$Graduados')"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

 var cerrar_ficha=document.getElementById('cerrar_ficha').click();
		swal({
        title: 'Registro Exitoso!',
        text: 'Se ha Registrado Una Asignacion ',
        type: 'success',
        confirmButtonColor: '#238276'
      })
$('#Contenedor_Recargar').load('cargar_table/cargar_Programa-Fichas.php');

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
  			text: 'Esta Ficha ya Fue Asiganada A Otro Programa',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}




 ?>