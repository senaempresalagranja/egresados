<?php

require_once '../../../../assets/lib/tcpdf/config/lang/spa.php';
require_once '../../../../assets/lib/tcpdf/tcpdf.php';
require_once '../../../../assets/conexion/conexion.php';

$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Universidades_Registradas (SIE)'); //Titlo del pdf
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

$html = '
	<style>
		h1{
			position: relative;
			display: block;
			color: #000;
			font-family: "quicksand";

			font-size: 3em;
			text-align: center;
		}

		img{
			width:40px;
			line-height:1;
			margin-right:20px;
			margin-left:20px;
		}

		table tr th{
			    font-weight: bold;
			    font-size: 41px;
			    background-color: #238276;
			    padding: 1115em;

		}

	</style>

	<h1>Universidades Registradas</h1>
	<table>
	  <thead>
		<tr>
		  <th>Nombre Universidad</th>
		  <th>Departamento</th>
		  <th>Municipio</th>

		</tr>
	  </thead>
	</table>';

$nombre_universidad = $_POST["nombre_universidad"];
$departamento       = $_POST["departamento"];
$municipio          = $_POST["municipio"];
$query              = "SELECT `Nombre_universidad`, departamentos.nombre_Departamento, municipios.nombre_Municipio FROM `universidades` INNER JOIN municipios ON universidades.id_Municipio=municipios.id_Municipio INNER JOIN departamentos ON municipios.id_Departamento=departamentos.id_Departamento  WHERE `Nombre_universidad` LIKE '%$nombre_universidad%' AND departamentos.nombre_Departamento LIKE '%$departamento%' AND  municipios.nombre_Municipio LIKE '%$municipio%'";
$resource           = mysqli_query($conexion, $query);
while ($fila = mysqli_fetch_row($resource)) {

    $html .= '
			<style>
				table,td{

				border:1px solid black;
				border-collapse:collapse;
				font-size:38px;
			}



			</style>

			<table>
				<thead>

				<tr>
				  <td>' . $fila[0] . '</td>
				  <td>' . $fila[1] . '</td>
				  <td>' . $fila[2] . '</td>
				</tr>
				</thead>
			</table>

	';

}

$pdf->SetFont('Helvetica', '', 10);

$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();

$pdf->output('Universidades_Registradas (SIE).pdf', 'D');
