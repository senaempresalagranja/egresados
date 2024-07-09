<?php 
include '../../../assets/conexion/conexion.php';


$id_egresado=$_POST["id_egresado"];

$query="SELECT etapa_practica_egresado.Id_Tipo_Etapa_Practica,etapa_practica_egresado.Id_Etapa_Practica_Egresado FROM `egresados` 

INNER JOIN asociacion_egresados ON egresados.id_Egresado=asociacion_egresados.id_Egresado
INNER JOIN etapa_practica_egresado ON asociacion_egresados.Id_asociacion_egresados=etapa_practica_egresado.Id_asociacion_egresados WHERE egresados.id_Egresado=$id_egresado";

$resource=mysqli_query($conexion,$query);

$filas=mysqli_num_rows($resource);
if ($filas==0) {

	?>
	

	<tr>
		
		<td colspan="4" class="text-center "><h3>No Tiene Etapas Practicas Realizadas</h3></td>
	</tr>

	<?php

}else{

while ($fila=mysqli_fetch_row($resource)) {


	if ($fila[0]==5 || $fila[0]==2 || $fila[0]==4 || $fila[0]==6) {


		$query="SELECT programas.nombre_Programa, tipo_etapa_practica.Nombre_Etapa,  etapa_practica_egresado.Nombre_Proyecto, Id_Etapa_Practica_Egresado FROM etapa_practica_egresado 
		INNER JOIN asociacion_egresados ON etapa_practica_egresado.Id_asociacion_egresados=asociacion_egresados.Id_asociacion_egresados 
		INNER JOIN programa_ficha ON asociacion_egresados.id_Programa_Ficha=programa_ficha.id_Programa_Ficha 
		INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha 
		INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa 
		INNER JOIN tipo_etapa_practica ON etapa_practica_egresado.Id_Tipo_Etapa_Practica=tipo_etapa_practica.Id_Tipo_Etapa_Practica   
		INNER JOIN egresados ON asociacion_egresados.id_Egresado=egresados.id_Egresado WHERE etapa_practica_egresado.Id_Etapa_Practica_Egresado=$fila[1]";
		$resource1=mysqli_query($conexion,$query);




$fila1=mysqli_fetch_row($resource1);

				?>

			


        <tr>
        <td><?php echo $fila1[0] ?></td>
        <td><?php echo $fila1[1] ?></td>
        <td><?php echo $fila1[2] ?></td>
        <td><button class='boton-ver' type='button' value="ACTUALIZAR" onclick="traer_asociacion_etapa_practica(<?php echo $fila1[3] ?>)"><i class='fa fa-refresh'></i></button></td>
      </tr>                   



				<?php

		


	}else{

		$query="SELECT programas.nombre_Programa, tipo_etapa_practica.Nombre_Etapa, empresa.Nombre_Empresa, etapa_practica_egresado.Nombre_Proyecto, Id_Etapa_Practica_Egresado FROM etapa_practica_egresado 
		INNER JOIN asociacion_egresados ON etapa_practica_egresado.Id_asociacion_egresados=asociacion_egresados.Id_asociacion_egresados 
		INNER JOIN programa_ficha ON asociacion_egresados.id_Programa_Ficha=programa_ficha.id_Programa_Ficha 
		INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha 
		INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa 
		INNER JOIN tipo_etapa_practica ON etapa_practica_egresado.Id_Tipo_Etapa_Practica=tipo_etapa_practica.Id_Tipo_Etapa_Practica 
		INNER JOIN empresa ON etapa_practica_egresado.id_Empresa=empresa.id_Empresa 
		INNER JOIN egresados ON asociacion_egresados.id_Egresado=egresados.id_Egresado WHERE etapa_practica_egresado.Id_Etapa_Practica_Egresado=$fila[1]";
		$resource1=mysqli_query($conexion,$query);
		$fila1=mysqli_num_rows($resource1);

		if ($fila1==0) {

			?>



			<?php

		}else{

$fila1=mysqli_fetch_row($resource1);

				?>

				<tr>
					<td ><?php echo $fila1[0] ?></td>
					<td ><?php echo $fila1[1] ?></td>
					<td ><?php echo $fila1[2] . ' ' . $fila1[3]  ?></td>
					<td >
						<button class='boton-ver' type='button' value="ACTUALIZAR" onclick="traer_asociacion_etapa_practica(<?php echo $fila1[4] ?>)"><i class='fa fa-refresh'></i></button>
					</td>

				</tr>
				<?php

			

		}

	}

}



}







?>

<script>
	
	function traer_asociacion_etapa_practica(Id_asociacion_egresados_etapa_practica) {
		var Id_asociacion_egresados_etapa_practica=Id_asociacion_egresados_etapa_practica;
		var boton_registrar_asociacion_programa_ficha=document.getElementById("boton_registrar_asociacion_programa_ficha").style.display="none";
		var boton_actualizar_asociacion_programa_ficha=document.getElementById('boton_actualizar_asociacion_programa_ficha').style.display="block";
		$('#contenedor').load('traer_asociacion_etapa_practica.php',{Id_asociacion_egresados_etapa_practica:Id_asociacion_egresados_etapa_practica});


	}

</script>



