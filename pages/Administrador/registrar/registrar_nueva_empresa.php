<?php 
include '../../../assets/conexion/conexion.php';

$Nit_Empresa=$_POST["Nit_Empresa"];
$nombredeempresa=$_POST["nombredeempresa"];
$Id_Municipio_empresa=$_POST["Id_Municipio_empresa"];

$query="SELECT * FROM empresa WHERE Nombre_Empresa='$nombredeempresa'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {




$query="INSERT INTO `empresa`(`Nombre_Empresa`, `Nit_Empresa`, `id_Municipio`) VALUES ('$nombredeempresa','$Nit_Empresa',$Id_Municipio_empresa)";
$resource=mysqli_query($conexion,$query);
$id_empresa=mysqli_insert_id($conexion);
if ($resource==true) {
	echo "<script>
swal({
            title: 'Registro Exitoso!',
            text: 'Se Ha Registrado Una Empresa',
            type: 'success',
            confirmButtonColor: '#238276'
        });

var cerrar_modal_empresa=document.getElementById('cerrar_modal_empresa').click();
$('#id_empresa_etapa').load('cargar_empresas.php');
$('#id_empresa').load('cargar_empresas.php');

	</script>";
}else{
	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'Registro No Exitoso',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}


}else {
	echo "<script>

		swal({
  			title: 'Error!',
  			text: 'La Empresa $nombredeempresa Ya Existe',
  			type: 'error',
  			confirmButtonColor: '#238276'
			})

	  </script>";
}


 ?>
