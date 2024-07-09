
<option value="Seleccione">Selecione</option>
				<?php 
				include '../../../assets/conexion/conexion.php';
$query="SELECT `Id_universidad`, `Nombre_universidad`FROM `universidades`";
$resource=mysqli_query($conexion,$query);
while ($fila=mysqli_fetch_row($resource)) {
	?>
<option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

	<?php 
}

		 ?>