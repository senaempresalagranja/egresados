<?php 
include '../../../assets/conexion/conexion.php';
$Id_asociacion_egresados=$_POST["Id_asociacion_egresados"];

$query="SELECT  fichas.numero_Ficha, `FechaCertificacion`, `Ultima_Actualizacion` FROM `asociacion_egresados` INNER JOIN programa_ficha ON asociacion_egresados.id_Programa_Ficha=programa_ficha.id_Programa_Ficha INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha WHERE `Id_asociacion_egresados`=$Id_asociacion_egresados";
$resource=mysqli_query($conexion,$query);

$fila=mysqli_fetch_row($resource);

echo "<script>
var Id_asociacion_egresados='$Id_asociacion_egresados';
var Numero_Ficha=document.getElementById('Numero_Ficha').value='$fila[0]';
validar_Numero_Ficha();
var fecha_certificacion=document.getElementById('fecha_certificacion').value='$fila[1]';

</script>";



  ?>
