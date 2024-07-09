<?php 
include '../../../assets/conexion/conexion.php';


$id_egresado=$_POST["id_egresado"];

$query="SELECT `Id_Situacion`,`id_asociacion_situacion_laboral` FROM `asociacion_situacion_laboral` WHERE `id_Egresado`=$id_egresado group by Id_Situacion order by Ultima_Actualizacion desc";

$resource=mysqli_query($conexion,$query);

$filas=mysqli_num_rows($resource);
if ($filas==0) {

	?>
	<tr >
		
		<td colspan="3" class="text-center "><h3>No Tiene Situacion Laboral</h3></td>
	</tr>

	<?php

}

while ($fila=mysqli_fetch_row($resource)) {


	if ($fila[0]==3) {


		$query="SELECT `Id_Estudiando_Egresado`, universidades.Nombre_universidad, municipios.nombre_Municipio, departamentos.nombre_Departamento, `Nombre_Carrera` FROM `estudiando_egresado` 
INNER JOIN universidades ON estudiando_egresado.Id_universidad=universidades.Id_universidad 
INNER JOIN municipios ON universidades.id_Municipio=municipios.id_Municipio 
INNER JOIN departamentos ON municipios.id_Departamento=departamentos.id_Departamento WHERE `id_Egresado`=$id_egresado";
		$resource1=mysqli_query($conexion,$query);




		while($fila1=mysqli_fetch_row($resource1)){

			?>

			<tr >
				<td ><?php echo "Estudiando" ?></td>
				<td ><?php echo $fila1[1]." - " .$fila1[2] ?></td>
				<td ><?php echo "Carrera " . $fila1[4]  ?></td>

				<!-- <div class="col-md-1"><input type="button" value="ACTUALIZAR" onclick="traer_asociacion_etapa_practica(<?php echo $fila1[0] ?>)"></div> -->
			</tr>
			<?php

		}


	}else if ($fila[0]==2){

		$query="SELECT `Id_Trabajando_Egresado`, empresa.Nombre_Empresa, municipios.nombre_Municipio,departamentos.nombre_Departamento, `Funcion_Desempena` ,`Funcion_Relacion_Programa`, `Salario`, `Intensidad_Horaria`, `Ultima_Actualizacion` FROM `trabajando_egresado` 
INNER JOIN empresa ON trabajando_egresado.id_Empresa=empresa.id_Empresa
INNER JOIN municipios ON empresa.id_Municipio=municipios.id_Municipio
INNER JOIN departamentos on municipios.id_Departamento=departamentos.id_Departamento
WHERE `id_Egresado`=$id_egresado";
		$resource1=mysqli_query($conexion,$query);
		$fila1=mysqli_num_rows($resource1);

		if ($fila1==0) {

			?>



			<?php

		}else{

			while($fila1=mysqli_fetch_row($resource1)){

				?>

				<tr >
					<td ><?php echo "Empleado" ?></td>
					<td ><?php echo $fila1[2]." - " .$fila1[3] ?></td>
					<td ><?php echo $fila1[4]." - " .$fila1[1]  ?></td>
					<!-- <div class="col-md-1"><input type="button" value="ACTUALIZAR" onclick="traer_asociacion_etapa_practica(<?php echo $fila1[0] ?>)"></div> -->
				</tr>
				<?php

			}

		}



	}else{


		?>

		<tr>
			<td ><?php echo "DESEMPLEADO" ?></td>
			<td ></td>
			<td ></td>


			<!-- 		<div class="col-md-1"><input type="button" value="ACTUALIZAR" onclick="traer_asociacion_etapa_practica(<?php echo $fila1[0] ?>)"></div>
			</div> -->
		</tr>
		<?php


	}

}


?>

<!-- <script>
	
	function traer_asociacion_etapa_practica(id_asociacion_situacion_laboral) {
		var id_asociacion_situacion_laboral=id_asociacion_situacion_laboral;
		var boton_registrar_asociacion_situacion_laboral=document.getElementById("boton_registrar_asociacion_situacion_laboral").style.display="none";
		var boton_actualizar_asociacion_situacion_laboral=document.getElementById('boton_actualizar_asociacion_situacion_laboral').style.display="block";
		$('#contenedor').load('traer_asociacion_situacion_laboral.php',{id_asociacion_situacion_laboral:id_asociacion_situacion_laboral});


	}

</script> -->