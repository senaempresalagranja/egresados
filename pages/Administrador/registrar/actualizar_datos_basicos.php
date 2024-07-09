<?php 

include '../../../assets/conexion/conexion.php';
session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 

// DATOS APRENDIZ
$Tipo_Doc=$_POST["Tipo_Doc"];
$Numero_Documento=$_POST["Numero_Documento"];
$Nombre_Egresado=$_POST["Nombre_Egresado"];
$Apellido_Egresado=$_POST["Apellido_Egresado"];
$Id_Municipio=$_POST["Id_Municipio"];
$Correo=$_POST["Correo"];
$Telefono=$_POST["Telefono"];
$Telefono_2=$_POST["Telefono_2"];
$Celular=$_POST["Celular"];
$Facebook=$_POST["Facebook"];
$Sexo=$_POST["Sexo"];
$fecha_nacimiento=$_POST["fecha_nacimiento"];
$id_egresado=$_POST["id_egresado"];



$query="SELECT * FROM `egresados` WHERE `Numero_Documento`=$Numero_Documento AND id_Egresado!=$id_egresado";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	
	// echo "<script>

	// swal('El Egresado $fila[3] $fila[4] Ya se encuentra registrado con el mismo documento','','error');

	// </script>";

	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'El Egresado $fila[3] $fila[4] Ya Se Encuentra Registrado Con El Mismo Documento',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";

}else{




	$query="UPDATE `egresados` SET `Tipo_Documento`='$Tipo_Doc',`Numero_Documento`='$Numero_Documento',`Nombre_Aprendiz`='$Nombre_Egresado',`Apellidos_Aprendiz`='$Apellido_Egresado',`id_Municipio`='$Id_Municipio',`Correo_Electronico`='$Correo',`Telefono_Fijo`='$Telefono',`Telefono_Alterno`='$Telefono_2',`Telefono_Celular`='$Celular',`Facebook`='$Facebook',`Sexo`='$Sexo',`Fecha_Nacimiento`='$fecha_nacimiento',`Ultima_Actualizacion`=NOW()  WHERE id_Egresado=$id_egresado";
	$resource=mysqli_query($conexion,$query);
	if ($resource==true) {
		// echo "<script>


		// swal('EGRESADO ACTUALIZADO','','success');



		// </script>";
		echo "<script>

		swal({
  			title: 'Actualización Exitosa',
  			text: 'Egresado Actualizado',
  			type: 'success',
  			confirmButtonColor: '#238276'
			})

	  </script>";
	}else{

		// echo "<script>


		// swal('EGRESADO NO ACTUALIZADO','','error');

		// </script>";
		echo "<script>

		swal({
  			title: 'Error!',
  			text: 'Egresado No Actualizado',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
	}

}


?>
