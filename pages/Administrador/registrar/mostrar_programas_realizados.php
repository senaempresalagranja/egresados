
	

<?php 
include '../../../assets/conexion/conexion.php';


$id_egresado=$_POST["id_egresado"];

$query="SELECT fichas.numero_Ficha,  programas.nombre_Programa, FechaCertificacion , Id_asociacion_egresados FROM `asociacion_egresados` 

INNER JOIN programa_ficha ON asociacion_egresados.id_Programa_Ficha=programa_ficha.id_Programa_Ficha 
INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha 
INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa 
WHERE `id_Egresado`=$id_egresado";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_num_rows($resource);

if ($fila==0) {

?>

	<tr>
		
		<td colspan="4" class="text-center"><h3>No Tiene Estudios Previos Realizados En El Sena</h3></td>
	</tr>

<?php

}else{

while($fila=mysqli_fetch_row($resource)){

?>




<tr> 

<td ><?php echo $fila[0] ?></td>
<td ><?php echo $fila[1] ?></td>
<td ><?php echo $fila[2] ?></td>

<td >
  <button class='boton-ver' type='button' value="ACTUALIZAR" onclick="traer_asociacion_ficha(<?php echo $fila[3] ?>)"><i class='fa fa-refresh'></i></button>
</td>

                        


                          

                          

                           </tr>


<?php
echo "<script>
var Id_asociacion_egresados='$fila[3]';
</script>";

}
	
}









?>

<script>
	
function traer_asociacion_ficha(Id_asociacion_egresados) {
var Id_asociacion_egresados=Id_asociacion_egresados;
var boton_registrar_asociacion_programa_ficha=document.getElementById("boton_registrar_asociacion_programa_ficha").style.display="none";
var boton_actualizar_asociacion_programa_ficha=document.getElementById('boton_actualizar_asociacion_programa_ficha').style.display="block";
$('#contenedor').load('traer_asociacion_ficha.php',{Id_asociacion_egresados:Id_asociacion_egresados})


}


</script>



