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

$query="SELECT * FROM `egresados` WHERE `Numero_Documento`=$Numero_Documento";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	
	echo "<script>



	swal({
            title: 'Error!',
            text: 'El Egresado $fila[3] $fila[4] Ya se encuentra registrado',
            type: 'error',
            confirmButtonColor: '#238276'
        });

	</script>";

}else{




	$query="INSERT INTO `egresados`(`Tipo_Documento`, `Numero_Documento`, `Nombre_Aprendiz`, `Apellidos_Aprendiz`, `id_Municipio`, `Correo_Electronico`, `Telefono_Fijo`, `Telefono_Alterno`, `Telefono_Celular`, `Facebook`, `Sexo`, `Fecha_Nacimiento`, `Ultima_Actualizacion`, `id_Usuario`) VALUES ('$Tipo_Doc','$Numero_Documento','$Nombre_Egresado','$Apellido_Egresado','$Id_Municipio','$Correo','$Telefono','$Telefono_2','$Celular','$Facebook','$Sexo','$fecha_nacimiento',NOW(),$usuario)";
	$resource=mysqli_query($conexion,$query);
	$id_egresado=mysqli_insert_id($conexion);
	if ($resource==true) {
		echo "<script>


		

		swal({
            title: 'Registro Exitoso!',
            text: 'Se ha Registrado un Egresado',
            type: 'success',
            confirmButtonColor: '#238276'
        })

		var id_egresado='$id_egresado';
mostrar_programas_realizados();

		</script>";
	}else{

		echo "<script>


		swal('EGRESADO NO REGISTRADO','','error');

		</script>";
	}

}


?>
