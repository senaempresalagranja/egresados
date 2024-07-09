









<?php 

include '../../../assets/conexion/conexion.php';


$Depar_Muni=$_POST["Depar_Muni"];




$query="SELECT * FROM  departamentos WHERE nombre_Departamento LIKE '%$Depar_Muni%' ";


// $conexion->set_charset('utf8');
  
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
  


<tr> 

<td class='col-xs-9'><?php echo $fila[1] ?></td>


                          


                          <td class='col-xs-3'>
                           <form style='float:left' action='Actualizar_Departamentos.php' method='post'>  
                              <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>
                              <button class='boton-ver' type='submit' value='ver mas'><i class='fa fa-refresh'></i></button>
                           </form>
                           
                          </td>

                          

                           </tr>




  <?php 
}
   ?>

