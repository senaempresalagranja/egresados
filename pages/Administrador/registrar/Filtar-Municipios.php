





<?php 

include '../../../assets/conexion/conexion.php';


$Muni_Depar=$_POST["Muni_Depar"];




$query="SELECT `id_Municipio`, departamentos.nombre_Departamento, `nombre_Municipio` FROM `municipios` 

INNER JOIN departamentos ON municipios.id_Departamento=departamentos.id_Departamento 

  WHERE nombre_Municipio LIKE '%$Muni_Depar%' 
  || departamentos.nombre_Departamento LIKE '%$Muni_Depar%' 
  ";


// $conexion->set_charset('utf8');
  
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
  


<tr> 

<td class='col-xs-5'><?php echo $fila[1] ?></td>
<td class='col-xs-5'><?php echo $fila[2] ?></td>

                          


                          <td class='col-xs-2'>
                           <form style='float:left' action='Actualizar_Municipios.php' method='post'>  
                              <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>
                              <button class='boton-ver' type='submit' value='ver mas'><i class='fa fa-refresh'></i></button>
                           </form>
                           
                          </td>

                          

                           </tr>




  <?php 
}
   ?>

