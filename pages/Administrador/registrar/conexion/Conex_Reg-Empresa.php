

<?php

include '../../../../assets/conexion/conexion.php';

$Nombre_Empresa=$_POST["Nombre_Empresa"];
$Nit_Empresa=$_POST["Nit_Empresa"];
$id_Municipio=$_POST["id_Municipio"];

// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM empresa WHERE Nombre_Empresa='$Nombre_Empresa'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {



				// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
			$query="INSERT INTO empresa (Nombre_Empresa,Nit_Empresa,id_Municipio) 
			VALUES ('$Nombre_Empresa','$Nit_Empresa','$id_Municipio')"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

 var cerrar_ficha=document.getElementById('cerrar_ficha').click();
		
		swal({
        title: 'Registro Exitoso!',
        text: 'Se ha Registrado Una Empresa ',
        type: 'success',
        confirmButtonColor: '#238276'
      })

$('#Contenedor_Recargar').load('cargar_table/cargar_Empresas1.php');

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
  			text: 'La Empresa $Nombre_Empresa Ya Existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}




 ?>