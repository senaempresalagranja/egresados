<?php 

include '../../../assets/conexion/conexion.php';

 
$Nombre_Empresa=$_POST["Nombre_Empresa"];
$Nit_Empresa=$_POST["Nit_Empresa"];
$municipio=$_POST["municipio"];
$nombre_Departamento=$_POST["nombre_Departamento"];



$query="SELECT `id_Empresa`, `Nombre_Empresa`, `Nit_Empresa`, 
municipios.nombre_Municipio, 
departamentos.nombre_Departamento FROM `empresa` 
inner JOIN municipios ON empresa.id_Municipio=municipios.id_Municipio 
INNER JOIN departamentos ON municipios.id_Departamento=departamentos.id_Departamento 

WHERE Nombre_Empresa LIKE '%$Nombre_Empresa%'
AND `Nit_Empresa` LIKE '%$Nit_Empresa%' 
AND municipios.nombre_Municipio LIKE '%$municipio%'
AND departamentos.nombre_Departamento LIKE '%$nombre_Departamento%'";
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
	
	<tr> 

<td class='col-xs-4'><?php echo $fila[1] ?></td>
<td class='col-xs-2'><?php echo $fila[2] ?></td>
<td class='col-xs-3'><?php echo $fila[4] ?></td>
<td class='col-xs-3'><?php echo $fila[3] ?></td>

          </tr>




	<?php 
}
	 ?>