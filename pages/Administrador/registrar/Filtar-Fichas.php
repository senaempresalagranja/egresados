<?php 

include '../../../assets/conexion/conexion.php';

session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 
$numero_Ficha1=$_POST["numero_Ficha1"];




$query="SELECT `id_Ficha`, `numero_Ficha`, `id_Usuario` FROM `fichas` WHERE numero_Ficha LIKE '%$numero_Ficha1%'
";
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
  


<tr> 

<td class='col-xs-9'><?php echo $fila[1] ?></td>

                          


                          <td class='col-xs-3'>
                           <form style='float:left' action='Actualizar_ficha.php' method='post'>  
                              <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>
                              <button class='boton-ver' type='submit' value='ver mas'><i class='fa fa-refresh'></i></button>
                           </form>
                           
                          </td>

                          

                           </tr>




  <?php 
}
   ?>

