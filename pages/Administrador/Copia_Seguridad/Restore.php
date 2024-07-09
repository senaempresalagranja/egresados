<?php

include 'Connet.php';
$restaurar=SGBD::limpiarCadena($_POST['restaurar']);
$sql=explode(";",file_get_contents($restaurar));
$totalErrors=0;
for($i = 0; $i < (count($sql)-1); $i++){
    if(SGBD::sql("$sql[$i];")){  }else{ $totalErrors++; }
}
if($totalErrors<=0){

	echo "<script>

var espere=document.getElementById('espere').style.display='none';

	</script>";
echo " <h3 style='font-weight: bold;'> <i class='icons icon-correct-symbol' style='color:#4caf6b;'></i> Restauracion exitosa </h3>";
}else{
	echo "Ocurrio un error inesperado, no se pudo hacer la restauración completamente";
}