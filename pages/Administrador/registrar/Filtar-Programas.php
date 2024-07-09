
<?php 

include '../../../assets/conexion/conexion.php';


session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 
$programas_Formacion=$_POST["programas_Formacion"];




$query="SELECT `id_Programa`, `nombre_Programa`,tipo_programa.Tipo, `duracion`, `id_Usuario` FROM `programas` INNER JOIN tipo_programa ON programas.Id_Tipo_Programa=tipo_programa.Id_Tipo_Programa 

  WHERE nombre_Programa LIKE '%$programas_Formacion%'

  || tipo_programa.Tipo LIKE '%$programas_Formacion%'

  || duracion LIKE '%$programas_Formacion%'";


// $conexion->set_charset('utf8');
  
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
  


<tr> 

<td class='col-xs-4'><?php echo $fila[1] ?></td>
<td class='col-xs-4'><?php echo $fila[2] ?></td>
<td class='col-xs-2'><?php echo $fila[3] ?></td>

                        


                          <td class='col-xs-2'>
                           <form style='float:left' action='Actualizar_Programa.php' method='post'>  
                              <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>
                              <button class='boton-ver' type='submit' value='ver mas'><i class='fa fa-refresh'></i></button>
                           </form>
                           
                          </td>

                          

                           </tr>




  <?php 
}
   ?>

