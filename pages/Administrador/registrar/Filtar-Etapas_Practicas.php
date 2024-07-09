<?php 

include '../../../assets/conexion/conexion.php';
session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 
$criterio_busqueda=$_POST["criterio_busqueda"];
$query="SELECT `Id_Tipo_Etapa_Practica`, `Nombre_Etapa` FROM `tipo_etapa_practica` WHERE `Nombre_Etapa` LIKE '%$criterio_busqueda%'";
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
	
	<tr> 
		<td class='col-xs-9'><?php echo $fila[1] ?></td>

		<td class='col-xs-3'>
			<form action="Actualizar_etapa_practica.php" method="POST">
					 
			  <input type="hidden" name="id_Egresado" value="<?php echo $fila[0] ?>">
			  <button class='boton-ver' type='submit' value='ver mas'><i class='fa fa-refresh'></i></button>
		
				</form>
	</td>
			
	</tr> 

	<?php 
}
	 ?>