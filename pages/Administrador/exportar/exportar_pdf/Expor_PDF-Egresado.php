<?php

require_once '../../../../assets/lib/tcpdf/config/lang/spa.php';
require_once '../../../../assets/lib/tcpdf/tcpdf.php';
require_once '../../../../assets/conexion/conexion.php';

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Egresados (SIE)'); //Titlo del pdf
$pdf->setPrintHeader(true); // (false) No se imprime cabecera       (true) inprime la cabesera
$pdf->setPrintFooter(true); // (false) No se imprime pie de pagina  (true) inprime la cabesera
$pdf->SetMargins(15, 15, 15, false); //Se define margenes izquierdo, alto, derecho
$pdf->SetAutoPageBreak(true, 20); //Se define un salto de pagina con un limite de pie de pagina

//el logo se cambia en la carpeta config en el archivo tcpdf_config.php en la linea 134 y el la linea 139 de cabia el tamaño
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'SIE', 'Sistema de informacion para Egresados');

$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->addPage();



session_start();
$usuario       = ($_SESSION['ADMINISTRADOR']);
$id_Programa   = $_POST["id_Programa"];
$id_Ficha      = $_POST["id_Ficha"];

// $id_Tipo_Programa=$_POST["id_Tipo_Programa"];
// $duracion=$_POST["duracion"];

// $query = "SELECT egresados.id_Egresado, `Tipo_Documento`, `Numero_Documento`, `Nombre_Aprendiz`, `Apellidos_Aprendiz`, programas.nombre_Programa,fichas.numero_Ficha, tipo_etapa_practica.Nombre_Etapa, situacion.Nombre_Situacion FROM `egresados` 
// INNER JOIN asociacion_egresados ON egresados.id_Egresado=asociacion_egresados.id_Egresado
// INNER JOIN programa_ficha ON asociacion_egresados.id_Programa_Ficha=programa_ficha.id_Programa_Ficha
// INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa
// INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha
// INNER JOIN etapa_practica_egresado ON asociacion_egresados.Id_asociacion_egresados=etapa_practica_egresado.Id_asociacion_egresados
// INNER JOIN tipo_etapa_practica ON etapa_practica_egresado.Id_Tipo_Etapa_Practica=tipo_etapa_practica.Id_Tipo_Etapa_Practica
// INNER JOIN asociacion_situacion_laboral ON egresados.id_Egresado=asociacion_situacion_laboral.id_Egresado
// INNER JOIN situacion ON asociacion_situacion_laboral.Id_Situacion=situacion.Id_Situacion WHERE egresados.Nombre_Aprendiz LIKE '%$id_Ficha%' OR egresados.Apellidos_Aprendiz LIKE '%$id_Ficha%' OR programas.nombre_Programa LIKE '%$id_Ficha%' OR fichas.numero_Ficha LIKE '%$id_Ficha%' OR tipo_etapa_practica.Nombre_Etapa LIKE '%$id_Ficha%' or situacion.Nombre_Situacion LIKE '%$id_Ficha%' 
// GROUP BY egresados.id_Egresado order by asociacion_situacion_laboral.Ultima_Actualizacion desc";
// $resource = mysqli_query($conexion, $query);
// while ($fila = mysqli_fetch_row($resource)) {




$res=mysqli_query($conexion,"SELECT egresados.id_Egresado,  `Tipo_Documento`, `Numero_Documento`, `Nombre_Aprendiz`, `Apellidos_Aprendiz`, departamentos.nombre_Departamento,municipios.nombre_Municipio, `Correo_Electronico`, `Telefono_Fijo`, `Telefono_Alterno`, `Telefono_Celular`, `Facebook`, `Sexo`, `Fecha_Nacimiento`FROM `egresados` 
	inner JOIN municipios ON egresados.id_Municipio=municipios.id_Municipio 
	INNER JOIN departamentos ON municipios.id_Departamento=departamentos.id_Departamento
	INNER JOIN asociacion_egresados ON egresados.id_Egresado=asociacion_egresados.id_Egresado
	INNER JOIN programa_ficha ON asociacion_egresados.id_Programa_Ficha=programa_ficha.id_Programa_Ficha
	INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa
	INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha
	INNER JOIN etapa_practica_egresado ON asociacion_egresados.Id_asociacion_egresados=etapa_practica_egresado.Id_asociacion_egresados
	INNER JOIN tipo_etapa_practica ON etapa_practica_egresado.Id_Tipo_Etapa_Practica=tipo_etapa_practica.Id_Tipo_Etapa_Practica
	INNER JOIN asociacion_situacion_laboral ON egresados.id_Egresado=asociacion_situacion_laboral.id_Egresado
	INNER JOIN situacion ON asociacion_situacion_laboral.Id_Situacion=situacion.Id_Situacion WHERE egresados.Nombre_Aprendiz LIKE '%$id_Ficha%' OR egresados.Apellidos_Aprendiz LIKE '%$id_Ficha%' OR programas.nombre_Programa LIKE '%$id_Ficha%' OR fichas.numero_Ficha LIKE '%$id_Ficha%' OR tipo_etapa_practica.Nombre_Etapa LIKE '%$id_Ficha%' or situacion.Nombre_Situacion LIKE '%$id_Ficha%' 
	GROUP BY egresados.id_Egresado order by asociacion_situacion_laboral.Ultima_Actualizacion desc"); 
while ($reg=mysqli_fetch_row($res)) {
$html='';

	$html .= '
	<style>
	table,td{

		border:1px solid black;
		border-collapse:collapse;
		font-size:38px;
	}

	th{
		font-weight: bold;
background-color: #238276;
	}




	</style>

	<table>
	<thead>

	<tr>
	<th>Nombre</th>
	<th>N°Documento</th>
	<th>Lugar Residencia </th>
	<th>Sexo</th>
	<th>Fecha Nacimiento</th>
	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $reg[3] . ' '.$reg[4].'</td>
	<td>' . $reg[1] .  ' '.$reg[2].'</td>
	<td>' . $reg[5] .  ' - '.$reg[6].'</td>
	<td>' . $reg[12] . '</td>
	<td>' . $reg[13] . '</td>

	</tr>
	</thead>
	</table>
	

	<table>
	<thead>

	<tr>
	<th>Correo electronico</th>
	<th>Telefono Fijo</th>
	<th>Telefono Alterno</th>
	<th>Telefono Celular </th>
	<th>Facebook</th>
	</tr>
	</thead>
	</table>

	<table>
	<thead>

	<tr>
	<td>' . $reg[7] . '</td>
	<td>' . $reg[8] . '</td>
	<td>' . $reg[9] . '</td>
	<td>' . $reg[10] . '</td>
	<td>' . $reg[11] . '</td>

	</tr>
	</thead>
	</table>
	';

	$id_egresado=$reg[0];
	$res1=mysqli_query($conexion,"SELECT `id_contactado`, `id_Egresado`, `contactado`, `actualizacion` FROM `contactacion`
		WHERE id_Egresado=$id_egresado ");
	while ($reg1=mysqli_fetch_row($res1)) {

		$html.='  <br><b>Contactado:</b> '.$reg1[2].'
		</div>
		';


	} 

	$res1=mysqli_query($conexion,"SELECT `Id_asociacion_egresados`,programas.nombre_Programa, fichas.numero_Ficha, `FechaCertificacion` FROM `asociacion_egresados` 
		INNER JOIN programa_ficha ON asociacion_egresados.id_Programa_Ficha= programa_ficha.id_Programa_Ficha
		INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa 
		INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha 
		WHERE asociacion_egresados.id_Egresado=$id_egresado GROUP BY asociacion_egresados.Id_asociacion_egresados");
	while ($reg1=mysqli_fetch_row($res1)) {
		$id_asociacion_egresado=$reg1[0];

		$html.= '<div class="col-md-12 text-center">
		<h3 class="help-block">Programa De Formacion</h3>

		</div>';

		$html.= '

		<table >
		<thead>
		<tr>
		<th># Ficha</th>
		<th>Programa De Formación</th>
		<th>Fecha Certificación</th>
		</tr>
		<tr>
		<td>'.$reg1[2].'</td>
		<td>'.$reg1[1].'</td>
		<td>'.$reg1[3].'</td>
		</tr>
		</thead>
		<tbody>

		</tbody>
		</table>



		';
	}


	$res2=mysqli_query($conexion,"SELECT `Id_Etapa_Practica_Egresado`, `Id_asociacion_egresados`, empresa.Nombre_Empresa, tipo_etapa_practica.Nombre_Etapa, `Nombre_Proyecto`, `Ultima_Actualizacion` FROM `etapa_practica_egresado`

		INNER JOIN empresa on etapa_practica_egresado.Id_Etapa_Practica_Egresado=empresa.id_Empresa

		INNER JOIN tipo_etapa_practica ON etapa_practica_egresado.Id_Etapa_Practica_Egresado=tipo_etapa_practica.Id_Tipo_Etapa_Practica

		WHERE `Id_asociacion_egresados`=$id_asociacion_egresado");

	$html.= '<div class="col-md-12 text-center">
	<h3 class="help-block">Etapa Practica</h3>

	</div>';
	$html.='        <table >         <thead>
	<tr>

	<th>Tipo Etapa Practica</th>
	<th>Detalles</th>
	</tr>
	</thead>
	</table>
	';

	while ($reg2=mysqli_fetch_row($res2)) {
    // aqui valido si nombre proyecto es null osea que es tipo empresa
		if ($reg2[4]==null && $reg2[2]!=null) {
// echo "aqui imprimo no es un proyecto productivo alexix lo unico que tiene que hacer e hacer iner join a tipo de etapa y empresa pero todo en el mismo orden";

        // echo " empresa $reg2[2] y tipo de etapa $reg2[3] <br>";

			$html.=' 


			<table >

			<tbody>
			<tr>

			<td>'.$reg2[3].'</td>
			<td>'.$reg2[2].'</td>
			</tr>
			</tbody>
			</table>
			</div>
			</div>


			';

		}else if($reg2[4]==null && $reg2[2]==null){

        // echo "tipo etapa es= $reg2[3] <br>";

			$html.= '

			<table >

			<tbody>
			<tr>

			<td>'.$reg2[3].'</td>

			</tr>
			</tbody>
			</table>


			';

		}else{

        // echo "proyecto productivo $reg2[4] <br>";

			$html.= '

			<table >

			<tbody>
			<tr>

			<td>'.$reg2[4].'</td>

			</tr>
			</tbody>
			</table>

			';

		}




	}

	$res1=mysqli_query($conexion,"SELECT `Id_Situacion` FROM `asociacion_situacion_laboral` WHERE `id_Egresado`=$id_egresado");

  // echo "siatuaciones de esa persona  <hr>"; 
	$html.= '<div class="col-md-12 text-center">
	<h3 class="help-block">Situación Laboral</h3>

	</div>';
	while ($reg1=mysqli_fetch_row($res1)) {
		if ($reg1[0]==1) {

			$html.= 'Desempleado<br>';

		}else if ($reg1[0]==3){

      // echo "estudiando";

			$res2=mysqli_query($conexion,"SELECT `Id_Estudiando_Egresado`, `id_Egresado`, universidades.Nombre_universidad, `Nombre_Carrera`, `Ultima_Actualizacion` FROM `estudiando_egresado` INNER JOIN universidades ON estudiando_egresado.Id_universidad=universidades.Id_universidad WHERE `id_Egresado`=$id_egresado");
			while ($reg2=mysqli_fetch_row($res2)) {

        // echo " carrera=$reg2[3] aquin la fecha <br>";

				$html.= '


				<table >
				<thead>
				<tr>
				<th>Situacion</th>
				<th>Lugar</th>
				<th>Detalles</th>
				</tr>
				</thead>
				<tbody>
				<tr>

				<td>Estudiando</td>
				<td>'.$reg2[2].'</td>
				<td>'.$reg2[3].'</td>
				</tr>
				</tbody>
				</table>



				';

			}
		}else{

        // echo "trabajando";

			$res2=mysqli_query($conexion,"SELECT `Id_Trabajando_Egresado`, `id_Egresado`, empresa.Nombre_Empresa, `Funcion_Desempena`, `Funcion_Relacion_Programa`, `Salario`, `Intensidad_Horaria`, `Ultima_Actualizacion` FROM `trabajando_egresado` INNER JOIN empresa ON trabajando_egresado.id_Empresa=empresa.id_Empresa WHERE `id_Egresado`=$id_egresado");
			while ($reg2=mysqli_fetch_row($res2)) {

        // echo " trabajando=$reg2[3] aquin la fecha <br>";

				$html.='

				<table>
				<thead>
				<tr>
				<th>Situación</th>
				<th>Empresa</th>
				<th>Función Que Desempeña </th>
				<th>Tiene que ver con el Programa</th>
				<th>Salario </th>
				<th>Intensidad Horaria  </th>
				</tr>
				</thead>
				<tbody>
				<tr>

				<td>Trabajando</td>
				<td>'.$reg2[2].'</td>
				<td>'.$reg2[3].'</td>
				<td>'.$reg2[4].'</td>
				<td>'.$reg2[5].'</td>
				<td>'.$reg2[6].'</td>
				</tr>
				</tbody>
				</table>



				';

			}

		}



	}
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->AddPage();

}




$pdf->SetFont('Helvetica', '', 10);

	$pdf->lastPage();

$pdf->output('Egresados (SIE).pdf', 'D');
