				
<?php 
include '../../../assets/conexion/conexion.php';
 ?>
 	  <div class="form-group">
		<label class="form-control-label" for="">Seleciona Programa de Formació</label>
		<select name="" class="form-control" id="programa_asignacion" onchange="validar_programa_asignacion()">
			<option value="Seleccione">Selecciona</option>
			<?php 



$query="SELECT `id_Programa`, `nombre_Programa`FROM `programas`";
$resource=mysqli_query($conexion,$query);

while ($fila=mysqli_fetch_row($resource)) {
?>

<option value="<?php echo $fila[0] ?>"><?php echo $fila[1] ?></option>

 <?php 
}

  ?>
		</select>
	  </div>	


		<script>
			
function cambiar_id_programa(id) {
	
id=id;
var programa_asignacion=document.getElementById('programa_asignacion').value=id;
}

		</script>