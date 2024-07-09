

<?php

include '../../../../assets/conexion/conexion.php';

$nombre_Departamento=$_POST["nombre_Departamento"];


// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM departamentos WHERE nombre_Departamento='$nombre_Departamento'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {



        // $conexion=mysqli_connect($local,$usuario,$contra,$bd);
      $query="INSERT INTO departamentos (nombre_Departamento) 
      VALUES ('$nombre_Departamento')";  

      $resource=mysqli_query($conexion,$query); 
if ($resource==true) {
echo "<script>

 var cerrar_ficha=document.getElementById('cerrar_ficha').click();

    swal({
        title: 'Registro Exitoso!',
        text: 'Se ha Registrado Un Departamento ',
        type: 'success',
        confirmButtonColor: '#238276'
      })

$('#Contenedor_Recargar').load('cargar_table/cargar_Departamento.php');

    </script>
";
  
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
        text: 'El Departamento $nombre_Departamento Ya Existe',
        type: 'error',
        confirmButtonColor: '#238276'
      })

    </script>";
}




 ?>