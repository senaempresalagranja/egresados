

<?php

include '../../../../assets/conexion/conexion.php';

$id_Departamento=$_POST["id_Departamento"];
$nombre_Municipio=$_POST["nombre_Municipio"];



// $conexion=mysqli_connect($local,$usuario,$contra,$bd);
$query="SELECT * FROM municipios WHERE nombre_Municipio='$nombre_Municipio'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);
if ($fila==false) {



        // $conexion=mysqli_connect($local,$usuario,$contra,$bd);
      $query="INSERT INTO municipios (nombre_Municipio, id_Departamento) 
      VALUES ('$nombre_Municipio', '$id_Departamento')";  

      $resource=mysqli_query($conexion,$query); 
if ($resource==true) {
echo "<script>

 var cerrar_Municipio=document.getElementById('cerrar_Municipio').click();

    swal({
        title: 'Registro Exitoso!',
        text: 'Se ha Registrado Un Municipio ',
        type: 'success',
        
        confirmButtonColor: '#238276'
      })

$('#Contenedor_Recargar').load('cargar_table/cargar_Municipio.php.php');

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
        text: 'El Municipio $nombre_Municipio Ya Existe',
        type: 'error',
        
        confirmButtonColor: '#238276'
      })

    </script>";
}




 ?>