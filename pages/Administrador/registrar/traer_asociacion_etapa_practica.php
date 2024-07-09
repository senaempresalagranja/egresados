<?php 
include '../../../assets/conexion/conexion.php';

$Id_asociacion_egresados_etapa_practica=$_POST["Id_asociacion_egresados_etapa_practica"];

$query="SELECT `Id_Tipo_Etapa_Practica`, `id_Empresa`, `Nombre_Proyecto` FROM `etapa_practica_egresado` WHERE `Id_Etapa_Practica_Egresado`=$Id_asociacion_egresados_etapa_practica";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

echo "<script>
var Id_asociacion_egresados_etapa_practica='$Id_asociacion_egresados_etapa_practica';
var Id_Tipo_Etapa_Practica=document.getElementById('Id_Tipo_Etapa_Practica').value='$fila[0]';
var id_empresa_etapa=document.getElementById('id_empresa_etapa').value='$fila[1]';
var Nombre_del_Proyecto=document.getElementById('Nombre_del_Proyecto').value='$fila[2]';
validar_tipo_etapa_practica();


var boton_registrar_asociacion_etapa_practica=document.getElementById('boton_registrar_asociacion_etapa_practica').style.display='none';
var boton_actualizar_asociacion_etapa_practica=document.getElementById('boton_actualizar_asociacion_etapa_practica').style.display='block';
</script>";

 ?>