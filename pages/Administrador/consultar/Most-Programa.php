<?php 

include '../../../assets/conexion/conexion.php';
session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 
$nombre_Programa=$_POST["nombre_Programa"];
$id_Tipo_Programa=$_POST["id_Tipo_Programa"];
$duracion=$_POST["duracion"];


$query="SELECT `id_Programa`, `nombre_Programa`,tipo_programa.Tipo, `duracion`, `id_Usuario` FROM `programas` INNER JOIN tipo_programa ON programas.Id_Tipo_Programa=tipo_programa.Id_Tipo_Programa 

WHERE nombre_Programa LIKE '%$nombre_Programa%' 
AND tipo_programa.Tipo LIKE '%$id_Tipo_Programa%' 
AND  duracion LIKE '%$duracion%'";
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
	
	<tr> 

<td class='col-xs-5'><?php echo $fila[1] ?></td>
<td class='col-xs-5'><?php echo $fila[2] ?></td>
<td class='col-xs-2'><?php echo $fila[3] ?></td>

                        


                          

                          

                           </tr>




	<?php 
}
	 ?>