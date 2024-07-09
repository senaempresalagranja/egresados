

	
<option value="Seleccione">Seleccione</option>

<?php 
include '../../../assets/conexion/conexion.php';

$Id_Departamento_empresa=$_POST["Id_Departamento_empresa"];

$query="SELECT `id_Municipio`,`nombre_Municipio` FROM `municipios` WHERE `id_Departamento`='$Id_Departamento_empresa'";
$resource=mysqli_query($conexion,$query);

while ($fila=mysqli_fetch_row($resource)) {
?>

<option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

 <?php 
}

  ?>
