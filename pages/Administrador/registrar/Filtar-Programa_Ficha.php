<?php 

include '../../../assets/conexion/conexion.php';


session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 
$Buscar_Asigancion_Ficha=$_POST["Buscar_Asigancion_Ficha"];




$query="SELECT `id_Programa_Ficha`, programas.nombre_Programa, fichas.numero_Ficha, `Fecha_Ingreso`, `Fecha_Fin`, `Matriculados`, `Graduados` FROM `programa_ficha` INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha 

  WHERE nombre_Programa LIKE '%$Buscar_Asigancion_Ficha%'

  || fichas.numero_Ficha LIKE '%$Buscar_Asigancion_Ficha%'

  ";


// $conexion->set_charset('utf8');
  
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
  


<tr> 

<td class='col-xs-2'><?php echo $fila[1] ?></td>
<td class='col-xs-2'><?php echo $fila[2] ?></td>
<td class='col-xs-2'><?php echo $fila[3] ?></td>
<td class='col-xs-2'><?php echo $fila[4] ?></td>
<td class='col-xs-2'><?php echo $fila[5] ?></td>
<td class='col-xs-1'><?php echo $fila[6] ?></td>

                        
<?php 

 ?>

                          <td class='col-xs-1'>
                           <form style='float:left' action='Actualizar_programa_ficha.php' method='post'>  
                              <input type='hidden' name='id' value='<?php echo $fila[0] ?>'>
                              <button class='boton-ver' type='submit' value='ver mas'><i class='fa fa-refresh'></i></button>
                           </form>
                           
                          </td>

                          

                           </tr>




  <?php 
}
   ?>

