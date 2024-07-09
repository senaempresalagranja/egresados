
	

<?php 
include '../../../assets/conexion/conexion.php';

$query="SELECT `id_Municipio`,`nombre_Municipio` FROM `municipios`";
$resource=mysqli_query($conexion,$query);

while ($fila=mysqli_fetch_row($resource)) {
?>

<option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

 <?php 
}

  ?>
