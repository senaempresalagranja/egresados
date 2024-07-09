<?php
session_start();
include '../../../../assets/conexion/conexion.php';
  $usuario=($_SESSION['ADMINISTRADOR']);     


$nombre_Programa=$_POST["nombre_Programa"];
$id_Tipo_Programa=$_POST["id_Tipo_Programa"];
$duracion=$_POST["duracion"];

// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM programas WHERE nombre_Programa='$nombre_Programa' AND id_Tipo_Programa='$id_Tipo_Programa'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {



				// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
			$query="INSERT INTO programas (nombre_Programa,id_Tipo_Programa,duracion,id_Usuario) 
			VALUES ('$nombre_Programa','$id_Tipo_Programa','$duracion','$usuario')"; 	

			$resource=mysqli_query($conexion,$query);	
if ($resource==true) {
echo "<script>

 var cerrar_Programas=document.getElementById('cerrar_Programas').click();

		swal({
  			title: 'Registro Exitoso!',
  			text: 'Se ha Registrado Un programa De formación ',
  			type: 'success',
  			
  			confirmButtonColor: '#238276'
			})

$('#Contenedor_Recargar').load('cargar_table/cargar_Programas.php');

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
};


}else{

	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'El Programa $nombre_Programa Ya Existe',
  			type: 'error',
  			
  			confirmButtonColor: '#238276'
			})

	  </script>";
}




 ?>