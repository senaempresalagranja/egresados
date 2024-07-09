	<option value="Selecione">Selecione</option>
<?php 
include '../../../assets/conexion/conexion.php';
$query="SELECT `id_Empresa`, `Nombre_Empresa`, `Nit_Empresa` FROM `empresa`";
$resource=mysqli_query($conexion,$query);
while ($fila=mysqli_fetch_row($resource)) {
	?>
<option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

	<?php 
}

		 ?>