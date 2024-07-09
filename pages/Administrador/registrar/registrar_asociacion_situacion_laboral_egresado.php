<?php 
include '../../../assets/conexion/conexion.php';

// ESTUDIANDO
$Id_Situacion=$_POST["Id_Situacion"];
$nombre_carrera=$_POST["nombre_carrera"];
$id_universidad=$_POST["id_universidad"];



// TRABAJANDO
$id_empresa=$_POST["id_empresa"];
$Funcion_Desempeña=$_POST["Funcion_Desempeña"];
$relacion_programa=$_POST["relacion_programa"];
$salario=$_POST["salario"];
$intensidad_horaria=$_POST["intensidad_horaria"];


$id_egresado=$_POST["id_egresado"];

$query="INSERT INTO `asociacion_situacion_laboral`( `id_Egresado`, `Id_Situacion`, `Ultima_Actualizacion`) VALUES ($id_egresado,$Id_Situacion,NOW())";
$resource=mysqli_query($conexion,$query);


// ESTUDIANDO
if ($Id_Situacion==3) {

echo "<script>

    swal({
        title: 'Registro Exitoso!',
        text: 'El Egresado Esta Estudiando',
        type: 'success',
        confirmButtonColor: '#238276'
      })

    </script>";
$query="INSERT INTO `estudiando_egresado`( `id_Egresado`, `Id_universidad`, `Nombre_Carrera`, `Ultima_Actualizacion`) VALUES ($id_egresado,$id_universidad,'$nombre_carrera',NOW())";
$resource=mysqli_query($conexion,$query);

echo "<script>


situaciones_laborales_realizadas();

</script>";

  // TRABAJANDO
}else if ($Id_Situacion=2) {
echo "<script>

    swal({
        title: 'Registro Exitoso!',
        text: 'El Egresado Esta Trajando',
        type: 'success',
        confirmButtonColor: '#238276'
      })

    </script>";

$query="INSERT INTO `trabajando_egresado`( `id_Egresado`, `id_Empresa`, `Funcion_Desempena`, `Funcion_Relacion_Programa`, `Salario`, `Intensidad_Horaria`, `Ultima_Actualizacion`) VALUES ($id_egresado,$id_empresa,'$Funcion_Desempeña','$relacion_programa',$salario,'$intensidad_horaria',NOW())";
$resource=mysqli_query($conexion,$query);

echo "<script>


situaciones_laborales_realizadas();

</script >";  
// desempleado
}else{
  echo "<script>

    swal({
        title: 'Registro Exitoso!',
        text: 'El Egresado Esta Desempleado',
        type: 'success',
        confirmButtonColor: '#238276'
      })

    </script>";



}

 ?>