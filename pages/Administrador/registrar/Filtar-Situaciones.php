<?php 

include '../../../assets/conexion/conexion.php';


$Situaciones=$_POST["Situaciones"];




$query="SELECT `Id_Situacion`, `Nombre_Situacion` FROM `situacion` WHERE Nombre_Situacion LIKE '%$Situaciones%'
";
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
  


<tr> 

<td class='col-xs-9'><?php echo $fila[1] ?></td>

                          


                          <td class='col-xs-3'>
                           <form style='float:left' action='Actualizar_Situacion.php' method='post'>  
                              <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>
                              <button class='boton-ver' type='submit' value='ver mas'><i class='fa fa-refresh'></i></button>
                           </form>
                           
                          </td>

                          

                           </tr>




  <?php 
}
   ?>

