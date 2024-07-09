<?php 
include '../../../assets/conexion/conexion.php';

$Id_asociacion_egresados=$_POST["Id_asociacion_egresados"];
$id_empresa_etapa=$_POST["id_empresa_etapa"];
$Id_Tipo_Etapa_Practica=$_POST["Id_Tipo_Etapa_Practica"];
$Nombre_del_Proyecto=$_POST["Nombre_del_Proyecto"];

$query="SELECT * FROM `etapa_practica_egresado` WHERE `Id_Tipo_Etapa_Practica`=$Id_Tipo_Etapa_Practica and Id_asociacion_egresados=$Id_asociacion_egresados";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	echo "<script>





swal({
            title: 'Error!',
            text: 'La Etapa practica ya fue realizadas (No se puede repetir)',
            type: 'error',
            confirmButtonColor: '#238276'
        });
mostrar_etapas_practicas_egresados();	
	</script>";
}else{


if ($Id_Tipo_Etapa_Practica==5) {
$query="INSERT INTO `etapa_practica_egresado`(`Id_asociacion_egresados`,`Id_Tipo_Etapa_Practica`, `Nombre_Proyecto`, `Ultima_Actualizacion`) VALUES ('$Id_asociacion_egresados','$Id_Tipo_Etapa_Practica', '$Nombre_del_Proyecto',NOW())";

$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>



swal({
            title: 'Registro Exitoso!',
            text: 'Etapa Productiva asignada',
            type: 'success',
            confirmButtonColor: '#238276'
        });
mostrar_etapas_practicas_egresados();
	</script>";
	
}else{


	echo "<script>

swal({
            title: 'Error!',
            text: 'Error en el Registro',
            type: 'error',
            confirmButtonColor: '#238276'
        });
	</script>";
}

}else if($Id_Tipo_Etapa_Practica==1 || $Id_Tipo_Etapa_Practica==3){

	$query="INSERT INTO `etapa_practica_egresado`(`Id_asociacion_egresados`, `Id_Tipo_Etapa_Practica`,`id_Empresa`, `Ultima_Actualizacion`) VALUES ('$Id_asociacion_egresados','$Id_Tipo_Etapa_Practica','$id_empresa_etapa',NOW())";

$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>

swal({
            title: 'Registro Exitoso!',
            text: 'Etapa Productiva asignada',
            type: 'success',
            confirmButtonColor: '#238276'
        });
mostrar_etapas_practicas_egresados();
	</script>";
}else{


	echo "<script>

swal({
            title: 'Error!',
            text: 'Error en el Registro',
            type: 'error',
            confirmButtonColor: '#238276'
        });
	</script>";
}

}else{



	$query="INSERT INTO `etapa_practica_egresado`(`Id_asociacion_egresados`, `Id_Tipo_Etapa_Practica`, `Ultima_Actualizacion`) VALUES ('$Id_asociacion_egresados','$Id_Tipo_Etapa_Practica',NOW())";

$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>
swal({
            title: 'Registro Exitoso!',
            text: 'Etapa Productiva asignada',
            type: 'success',
            confirmButtonColor: '#238276'
        });
mostrar_etapas_practicas_egresados();
	</script>";
}else{


	echo "<script>

swal({
            title: 'Error!',
            text: 'Error en el Registro',
            type: 'error',
            confirmButtonColor: '#238276'
        });
	</script>";
}


}






}





 ?>