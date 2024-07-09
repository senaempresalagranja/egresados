<?php 

include '../../../assets/conexion/conexion.php';

$Traer_Universidades=$_POST["Traer_Universidades"];


$query="SELECT `Id_universidad`, `Nombre_universidad`, departamentos.nombre_Departamento, municipios.nombre_Municipio FROM `universidades` INNER JOIN municipios ON universidades.id_Municipio=municipios.id_Municipio INNER JOIN departamentos ON municipios.id_Departamento=departamentos.id_Departamento  
  WHERE `Nombre_universidad` LIKE '%$Traer_Universidades%'
  || departamentos.nombre_Departamento LIKE '%$Traer_Universidades%'

  || municipios.nombre_Municipio LIKE '%$Traer_Universidades%'";


// $conexion->set_charset('utf8');
  
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
  


<tr> 

<td class='col-xs-4'><?php echo $fila[1] ?></td>
<td class='col-xs-4'><?php echo $fila[2] ?></td>
<td class='col-xs-2'><?php echo $fila[3] ?></td>

                        


                          <td class='col-xs-2'>
                           <form style='float:left' action='editar_universidad.php' method='post'>  
                              <input type='hidden' name='Id_universidad' value=' <?php echo $fila[0] ?>'>
                              
                              <button class='boton-ver' type='submit' value='ver mas'><i class='fa fa-refresh'></i></button>
                           </form>
                           
                          </td>

                          

                           </tr>




  <?php 
}
   ?>

