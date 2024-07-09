<?php 

include '../../../assets/conexion/conexion.php';
session_start();

  $usuario=($_SESSION['ADMINISTRADOR']); 

$programa_asignacion=$_POST["programa_asignacion"];
$ficha_formacion=$_POST["ficha_formacion"];
$fecha_ingreso=$_POST["fecha_ingreso"];
$fecha_fin=$_POST["fecha_fin"];
$matriculados=$_POST["matriculados"];
$graduados=$_POST["graduados"];

$query="SELECT * FROM `programa_ficha` where `id_Ficha`=$ficha_formacion AND `id_Programa`=$programa_asignacion";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
		echo "<script>

swal('Error','La ficha Ya Tiene Programa Asignado','error');

		</script>";
}else{

$query="INSERT INTO `programa_ficha`( `id_Programa`, `id_Ficha`, `Fecha_Ingreso`, `Fecha_Fin`, `Matriculados`, `Graduados`) VALUES ($programa_asignacion,$ficha_formacion,'$fecha_ingreso','$fecha_fin','$matriculados','$graduados')";
$resource=mysqli_query($conexion,$query);


if ($resource==true) {
		
		echo "<script>

swal('Exito','Asignacion de Programa Exitosa','success');
validar_Numero_Ficha();
var cerrar_modal_asignacion=document.getElementById('cerrar_modal_asignacion').click();
		</script>";


}
}




 ?>