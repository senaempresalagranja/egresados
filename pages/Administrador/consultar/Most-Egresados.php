





<?php 

include '../../../assets/conexion/conexion.php';
session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 
$id_Programa=$_POST["id_Programa"];
$id_Ficha=$_POST["id_Ficha"];
$res=mysqli_query($conexion,"SELECT egresados.id_Egresado, `Tipo_Documento`, `Numero_Documento`, `Nombre_Aprendiz`, `Apellidos_Aprendiz`, programas.nombre_Programa,fichas.numero_Ficha, tipo_etapa_practica.Nombre_Etapa, situacion.Nombre_Situacion FROM `egresados` 
INNER JOIN asociacion_egresados ON egresados.id_Egresado=asociacion_egresados.id_Egresado
INNER JOIN programa_ficha ON asociacion_egresados.id_Programa_Ficha=programa_ficha.id_Programa_Ficha
INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa
INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha
INNER JOIN etapa_practica_egresado ON asociacion_egresados.Id_asociacion_egresados=etapa_practica_egresado.Id_asociacion_egresados
INNER JOIN tipo_etapa_practica ON etapa_practica_egresado.Id_Tipo_Etapa_Practica=tipo_etapa_practica.Id_Tipo_Etapa_Practica
INNER JOIN asociacion_situacion_laboral ON egresados.id_Egresado=asociacion_situacion_laboral.id_Egresado
INNER JOIN situacion ON asociacion_situacion_laboral.Id_Situacion=situacion.Id_Situacion WHERE egresados.Nombre_Aprendiz LIKE '%$id_Ficha%' OR egresados.Apellidos_Aprendiz LIKE '%$id_Ficha%' OR programas.nombre_Programa LIKE '%$id_Ficha%' OR fichas.numero_Ficha LIKE '%$id_Ficha%' OR tipo_etapa_practica.Nombre_Etapa LIKE '%$id_Ficha%' or situacion.Nombre_Situacion LIKE '%$id_Ficha%' 
GROUP BY egresados.id_Egresado order by asociacion_situacion_laboral.Ultima_Actualizacion desc");	
while ($reg=mysqli_fetch_row($res)) {

?>
<tr>
	<td class=''>
		<?php echo "$reg[3] $reg[4]" ?>
	</td>
	<td class=''>
		<?php echo "$reg[1]:$reg[2]" ?>
	</td>
		<td class=''>
		<?php echo "$reg[5]" ?>
	</td>
	<td class=''>
		<?php echo "$reg[6]" ?>
	</td>
		<td class=''>
		<?php echo "$reg[7]" ?>
	</td>
			<td class=''>
		<?php echo "$reg[8]" ?>
	</td>
				<td class=''>
	<form action="mostrar datos completos.php">
		<button style="background: #238276;" class='boton-ver' type='submit' name="id_egresado" value="<?php echo $reg[0] ?>"><i class='fa fa-eye'></i></button>		
	</form>

	<!-- <form style='float:left' action='cargar_table/Mostrar_Informacion_basica.php' method='post'>  
                <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>
                              
                <button style="background: #238276;" class='boton-ver' type='submit' value='ver mas'><i class='fa fa-eye'></i></button>
             </form> -->
	</td>
</tr>
<?php
	$id_egresado=$reg[0];


}

?>