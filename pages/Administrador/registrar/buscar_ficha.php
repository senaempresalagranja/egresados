<?php 

include '../../../assets/conexion/conexion.php';
$Numero_Ficha=$_POST["Numero_Ficha"];

$query="SELECT `id_Ficha`, `numero_Ficha` FROM `fichas` WHERE `numero_Ficha`='$Numero_Ficha'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

 ?>

<option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

