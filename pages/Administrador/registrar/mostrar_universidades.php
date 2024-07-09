<?php 

include '../../../assets/conexion/conexion.php';
session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 
$criterio_busqueda=$_POST["criterio_busqueda"];
$query="SELECT `Id_universidad`, `Nombre_universidad`, departamentos.nombre_Departamento, municipios.nombre_Municipio FROM `universidades` INNER JOIN municipios ON universidades.id_Municipio=municipios.id_Municipio INNER JOIN departamentos ON municipios.id_Departamento=departamentos.id_Departamento  WHERE `Nombre_universidad` LIKE '%$criterio_busqueda%' ";
$resource=mysqli_query($conexion,$query);


while ($fila=mysqli_fetch_row($resource)) {
 ?>
	
	<div class="row">
		<div class="col-md-4"><?php echo $fila[1] ?></div>
		<div class="col-md-3"><?php echo $fila[2] ?></div>
		<div class="col-md-3"><?php echo $fila[3] ?></div>

		
			<form action="editar_universidad.php" method="POST">
		<div class="col-md-2">
<input type="hidden" name="Id_universidad" value="<?php echo $fila[0] ?>">
<button class='boton-ver' type="submit"><i class='fa fa-refresh'></i></button>
		</div>
				</form>
	
			
	</div>

	<?php 
}
	 ?>