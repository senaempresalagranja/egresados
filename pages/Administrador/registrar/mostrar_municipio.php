
	
<option value="Seleccione">Seleccione</option>

<?php 
include '../../../assets/conexion/conexion.php';

$Id_Departamento=$_POST["Id_Departamento"];

$conexion->set_charset('utf8');
$query="SELECT `id_Municipio`,`nombre_Municipio` FROM `municipios` WHERE `id_Departamento`='$Id_Departamento'";
$resource=mysqli_query($conexion,$query);

while ($fila=mysqli_fetch_row($resource)) {
?>

<option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

 <?php 
}

  ?>
