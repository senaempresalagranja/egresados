<?php 
include '../../../assets/conexion/conexion.php';


$Id_asociacion_egresados_etapa_practica=$_POST["Id_asociacion_egresados_etapa_practica"];
$Id_Tipo_Etapa_Practica=$_POST["Id_Tipo_Etapa_Practica"];
$id_empresa_etapa=$_POST["id_empresa_etapa"];
$Nombre_del_Proyecto=$_POST["Nombre_del_Proyecto"];


if ($Id_Tipo_Etapa_Practica==5) {

$query="UPDATE `etapa_practica_egresado` SET `id_Empresa`=$id_empresa_etapa,`Id_Tipo_Etapa_Practica`=$Id_Tipo_Etapa_Practica,`Nombre_Proyecto`='$Nombre_del_Proyecto',`Ultima_Actualizacion`=NOW(),`id_Empresa`=NULL WHERE `Id_Etapa_Practica_Egresado`=$Id_asociacion_egresados_etapa_practica";

$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>

swal('ACTUALIZACION EXITOSA','','success');
mostrar_etapas_practicas_egresados();
var boton_registrar_asociacion_etapa_practica=document.getElementById('boton_registrar_asociacion_etapa_practica').style.display='block';
var boton_actualizar_asociacion_etapa_practica=document.getElementById('boton_actualizar_asociacion_etapa_practica').style.display='none';
	</script>";
}else{


	echo "<script>
swal('ACTUALIZACION NO EXITOSA','','error');
	</script>";
}

}else if($Id_Tipo_Etapa_Practica==1 || $Id_Tipo_Etapa_Practica==3){
$query="UPDATE `etapa_practica_egresado` SET `id_Empresa`=$id_empresa_etapa,`Id_Tipo_Etapa_Practica`=$Id_Tipo_Etapa_Practica,`Nombre_Proyecto`=NULL,`Ultima_Actualizacion`=NOW() WHERE `Id_Etapa_Practica_Egresado`=$Id_asociacion_egresados_etapa_practica";

$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>

swal('ACTUALIZACION EXITOSA','','success');
mostrar_etapas_practicas_egresados();
var boton_registrar_asociacion_etapa_practica=document.getElementById('boton_registrar_asociacion_etapa_practica').style.display='block';
var boton_actualizar_asociacion_etapa_practica=document.getElementById('boton_actualizar_asociacion_etapa_practica').style.display='none';
	</script>";
}else{


	echo "<script>
swal('ACTUALIZACION NO EXITOSA','','error');
	</script>";
}

}else{
$query="UPDATE `etapa_practica_egresado` SET `Id_Tipo_Etapa_Practica`=$Id_Tipo_Etapa_Practica,`Ultima_Actualizacion`=NOW() WHERE `Id_Etapa_Practica_Egresado`=$Id_asociacion_egresados_etapa_practica";

$resource=mysqli_query($conexion,$query);
if ($resource==true) {
	echo "<script>

swal('ACTUALIZACION EXITOSA','','success');
mostrar_etapas_practicas_egresados();
var boton_registrar_asociacion_etapa_practica=document.getElementById('boton_registrar_asociacion_etapa_practica').style.display='block';
var boton_actualizar_asociacion_etapa_practica=document.getElementById('boton_actualizar_asociacion_etapa_practica').style.display='none';
	</script>";
}else{


// 	echo "<script>
// swal('ACTUALIZACION NO EXITOSA','','error');


// 	</script>";
	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'Actualización No Exitosa',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}

}
 ?>
