




<?php 

include '../../../../assets/conexion/conexion.php';

$nombre_documento=$_POST["nombre_documento"];




$query="SELECT egresados.id_Egresado,`Tipo_Documento`, `Numero_Documento`, `Nombre_Aprendiz`, `Apellidos_Aprendiz`, `Correo_Electronico`, `Telefono_Fijo`, `Telefono_Alterno`, `Telefono_Celular`, `Facebook`, `Sexo`, `Fecha_Nacimiento`,  municipios.nombre_Municipio, departamentos.nombre_Departamento,  contactacion.contactado, `id_Usuario` FROM `egresados`

INNER JOIN municipios ON egresados.id_Egresado=municipios.id_Municipio

INNER JOIN departamentos ON municipios.id_Municipio=departamentos.id_Departamento

INNER JOIN contactacion ON egresados.id_Egresado=contactacion.id_contactado
 WHERE Nombre_Aprendiz LIKE '%$nombre_documento%'
 || Numero_Documento LIKE '%$nombre_documento%'
 ";




  
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
  


<!-- <div class="row">
          <div class="col-md-12">
            <div class="card">
              <section class="invoice">
                <div class="row">
                  <div class="col-xs-12">
                    <h2 class="page-header"><i class="fa fa-globe"></i> Información De Egresado</h2>
                  </div>
                </div>
                <div class="row invoice-info">

                  <div class="col-xs-4">
                  	<b>Nombre:</b> <?php echo $fila[2] ?>
                  	<br>
                  	<b>Apellido:</b> <?php echo $fila[3] ?>
                  	<br>
                  	<b>N°Documento:</b> <?php echo $fila[0] ?>. <?php echo $fila[1] ?>
                  	<br>
                  	<b>Fecha De Nacimiento:</b> <?php echo $fila[10] ?>
                  	<br>
                  	<b>Sexo:</b> <?php echo $fila[9] ?>
                  </div>

				  <div class="col-xs-4">
                  	<b>Departamento:</b> <?php echo $fila[12] ?>
                  	<br><b>Municipio:</b> <?php echo $fila[11] ?>
               
                  </div>

                  <div class="col-xs-4">
                  	<b>Correo Electrónico:</b> <?php echo $fila[4] ?>
                  	<br><b>Teléfono Fijo:</b> <?php echo $fila[5] ?>
                  	<br><b>Teléfono Alterno:</b> <?php echo $fila[6] ?>
                  	<br><b>Teléfono Celular:</b> <?php echo $fila[7] ?>
                  	<br><b>Facebook:</b> <?php echo $fila[8] ?>
               		<br>
               		<br><b>Contactado:</b> <?php echo $fila[13] ?>
                  </div>
                  
                </div>
                

              </section>
            </div>
          </div>
        </div> -->
        <tr>
        	<td><?php echo $fila[3] ?> <?php echo $fila[4] ?></td>
        	<td><b style="font-weight: bolder;"><?php echo $fila[1] ?></b> <?php echo $fila[2] ?></td>
        	<td><?php echo $fila[13] ?></td>
        	<td><?php echo $fila[12] ?></td>
        	<td><?php echo $fila[14] ?></td>
        	<td>
        	  <form style='float:left' action='cargar_table/Mostrar_Informacion_basica.php' method='post'>  
                <input type='hidden' name='id' value=' <?php echo $fila[0] ?>'>
                              
                <button style="background: #238276;" class='boton-ver' type='submit' value='ver mas'><i class='fa fa-eye'></i></button>
             </form></td>
        </tr>



  <?php 
}
   ?>




