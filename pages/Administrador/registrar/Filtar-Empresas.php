




<?php 

include '../../../assets/conexion/conexion.php';

$Traer_empresas=$_POST["Traer_empresas"];




$query="SELECT `id_Empresa`, `Nombre_Empresa`, `Nit_Empresa`, municipios.nombre_Municipio FROM `empresa` 

INNER JOIN municipios ON empresa.id_Municipio=municipios.id_Municipio 

  WHERE Nombre_Empresa LIKE '%$Traer_empresas%'

  || municipios.nombre_Municipio LIKE '%$Traer_empresas%'

  || Nit_Empresa LIKE '%$Traer_empresas%'";


// $conexion->set_charset('utf8');
  
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
  


<tr> 

<td class='col-xs-4'><?php echo $fila[1] ?></td>
<td class='col-xs-4'><?php echo $fila[2] ?></td>
<td class='col-xs-2'><?php echo $fila[3] ?></td>

                        


                          <td class='col-xs-2'>
                           <form style='float:left' action='Actualizar_Empresa.php' method='post'>  
                              <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>
                              
                              <button class='boton-ver' type='submit' value='ver mas'><i class='fa fa-refresh'></i></button>
                           </form>
                           
                          </td>

                          

                           </tr>




  <?php 
}
   ?>

