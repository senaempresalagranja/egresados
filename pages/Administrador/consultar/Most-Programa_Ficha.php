<?php 

include '../../../assets/conexion/conexion.php';
session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 
$id_Programa=$_POST["id_Programa"];
$id_Ficha=$_POST["id_Ficha"];
$Fecha_Ingreso=$_POST["Fecha_Ingreso"];
$Fecha_Fin=$_POST["Fecha_Fin"];
// $id_Tipo_Programa=$_POST["id_Tipo_Programa"];
// $duracion=$_POST["duracion"];


$query="SELECT `id_Programa_Ficha`, programas.nombre_Programa, fichas.numero_Ficha, `Fecha_Ingreso`, `Fecha_Fin`, `Matriculados`, `Graduados` FROM `programa_ficha` INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha

 WHERE programas.nombre_Programa LIKE '%$id_Programa%' 
AND fichas.numero_Ficha LIKE '%$id_Ficha%' 
AND  Fecha_Ingreso LIKE '%$Fecha_Ingreso%'
AND  Fecha_Fin LIKE '%$Fecha_Fin%'";
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
	
	<tr> 

<td class='col-xs-2'><?php echo $fila[1] ?></td>
<td class='col-xs-2'><?php echo $fila[2] ?></td>
<td class='col-xs-2'><?php echo $fila[3] ?></td>
<td class='col-xs-2'><?php echo $fila[4] ?></td>
<td class='col-xs-2'><?php echo $fila[5] ?></td>
<td class='col-xs-2'><?php echo $fila[6] ?></td>

                        


                          

                          

                           </tr>




	<?php 
}
	 ?>