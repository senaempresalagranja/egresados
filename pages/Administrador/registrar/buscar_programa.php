<?php 
include '../../../assets/conexion/conexion.php';
$Numero_Ficha=$_POST["Numero_Ficha"];


$query="SELECT `numero_Ficha` FROM `fichas` where numero_Ficha='$Numero_Ficha'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);


if ($fila==true) {

$query="SELECT programas.nombre_Programa, id_Programa_Ficha FROM `programa_ficha` INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa WHERE fichas.numero_Ficha='$Numero_Ficha'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);


if ($fila==true) {

	echo "<script>

var id_programa_ficha='$fila[1]';
var Nombre_Programa=document.getElementById('Nombre_Programa').value='$fila[0]';
var Nombre_Programa=document.getElementById('Nombre_Programa').style.border='2px solid #4caf50';
var validar_programa_formacion=true;
</script>";
}else{

	echo "<script>


var Nombre_Programa=document.getElementById('Nombre_Programa').value='Ficha No tiene Programa de Formacion Asociado';
var Nombre_Programa=document.getElementById('Nombre_Programa').style.border='2px solid red';
var validar_programa_formacion=false;
</script>";

};


}else{

	echo "<script>


var Nombre_Programa=document.getElementById('Nombre_Programa').value='Ficha  No existe	';
var Nombre_Programa=document.getElementById('Nombre_Programa').style.border='2px solid red';
var validar_programa_formacion=false;
</script>";
}


 ?>