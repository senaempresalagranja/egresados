<?php
session_start();
include '../../../assets/conexion/conexion.php';
  $usuario=($_SESSION['ADMINISTRADOR']);       
$nueva_ficha=$_POST["nueva_ficha"];


$query="SELECT `id_Ficha`, `numero_Ficha`, `id_Usuario` FROM `fichas` WHERE `numero_Ficha`=$nueva_ficha";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==false) {
	$query="INSERT INTO `fichas`(`numero_Ficha`, `id_Usuario`) VALUES ('$nueva_ficha',$usuario)";
$resource=mysqli_query($conexion,$query);

if ($resource==true) {
	
	echo "<script>
 var nueva_ficha=document.getElementById('nueva_ficha').value;
 var Numero_Ficha=document.getElementById('Numero_Ficha').value=nueva_ficha;
  validar_Numero_Ficha();
		
		swal({
  			title: 'Registro Exitoso!',
  			text: 'Se ha Registrado una Ficha ',
  			type: 'success',
  			
  			confirmButtonColor: '#238276'
			})


var cerrar_modal_ficha=document.getElementById('cerrar_modal_ficha').click();




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
  			text: 'La ficha $numero_Ficha Ya existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}



 ?>

 <script>
 	


 </script>