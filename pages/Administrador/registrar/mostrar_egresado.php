<?php 

include '../../../assets/conexion/conexion.php';
session_start();
$usuario=($_SESSION['ADMINISTRADOR']); 
$criterio_busqueda=$_POST["Numero_Documento"];


$query="SELECT `id_Egresado`, `Tipo_Documento`, `Numero_Documento`, `Nombre_Aprendiz`, `Apellidos_Aprendiz`, municipios.id_Municipio, `Correo_Electronico`, `Telefono_Fijo`, `Telefono_Alterno`, `Telefono_Celular`, `Facebook`, `Sexo`, `Fecha_Nacimiento`, `Ultima_Actualizacion`, `id_Usuario`, municipios.id_Departamento FROM `egresados` INNER JOIN municipios ON egresados.id_Municipio=municipios.id_Municipio WHERE `Numero_Documento`='$criterio_busqueda'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

if ($fila==true) {
	
	echo "<script>

var id_egresado='$fila[0]';
var boton_registrar_egresado=document.getElementById('boton_registrar_egresado').style.display='none';
var boton_actualizar_egresado=document.getElementById('boton_actualizar_egresado').style.display='block';
var Tipo_Doc=document.getElementById('Tipo_Doc').value='$fila[1]';
var Numero_Documento=document.getElementById('Numero_Documento').value='$fila[2]';
var Nombre_Egresado=document.getElementById('Nombre_Egresado').value='$fila[3]';
var Apellido_Egresado=document.getElementById('Apellido_Egresado').value='$fila[4]';
var Id_Departamento=document.getElementById('Id_Departamento').value='$fila[15]';
validar_departamento();
// $('#Id_Municipio').load('mostrar_municipios.php');
var Id_Municipio=document.getElementById('Id_Municipio').value='$fila[5]';

var Correo=document.getElementById('Correo').value='$fila[6]';
var Telefono=document.getElementById('Telefono').value='$fila[7]';
var Telefono_2=document.getElementById('Telefono_2').value='$fila[8]';
var Celular=document.getElementById('Celular').value='$fila[9]';
var Facebook=document.getElementById('Facebook').value='$fila[10]';
var Sexo=document.getElementById('Sexo').value='$fila[11]';
var fecha_nacimiento=document.getElementById('fecha_nacimiento').value='$fila[12]';
mostrar_programas_realizados();
mostrar_etapas_practicas_egresados();
situaciones_laborales_realizadas();
	</script>";

}else{

echo "<script>

var boton_registrar_egresado=document.getElementById('boton_registrar_egresado').style.display='block';
var boton_actualizar_egresado=document.getElementById('boton_actualizar_egresado').style.display='none';

</script>";

}
 ?>