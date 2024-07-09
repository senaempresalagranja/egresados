<?php 

include '../../../assets/conexion/conexion.php';
session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 
$nombre_universidad=$_POST["nombre_universidad"];
$departamento=$_POST["departamento"];
$municipio=$_POST["municipio"];
$query="SELECT `Id_universidad`, `Nombre_universidad`, departamentos.nombre_Departamento, municipios.nombre_Municipio FROM `universidades` INNER JOIN municipios ON universidades.id_Municipio=municipios.id_Municipio INNER JOIN departamentos ON municipios.id_Departamento=departamentos.id_Departamento  


WHERE `Nombre_universidad` LIKE '%$nombre_universidad%' 
AND departamentos.nombre_Departamento LIKE '%$departamento%' 
AND  municipios.nombre_Municipio LIKE '%$municipio%'";
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
	
	<tr> 

<td class='col-xs-4'><?php echo $fila[1] ?></td>
<td class='col-xs-4'><?php echo $fila[2] ?></td>
<td class='col-xs-4'><?php echo $fila[3] ?></td>



                          

    </tr>




	<?php 
}
	 ?>