<?php

require_once '../../../../assets/lib/tcpdf/config/lang/spa.php';
require_once '../../../../assets/lib/tcpdf/tcpdf.php';
require_once '../../../../assets/conexion/conexion.php';

$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Programas_Registrados (SIE)'); //Titlo del pdf
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

	<h1>Programas Registrados</h1>
	<table>
	  <thead>
		<tr>
		  <th>Programa</th>
		  <th>Tipo De Programa</th>
		  <th>Duracion</th>

		</tr>
	  </thead>
	</table>';

session_start();
$usuario          = ($_SESSION['ADMINISTRADOR']);
$nombre_Programa  = $_POST["nombre_Programa"];
$id_Tipo_Programa = $_POST["id_Tipo_Programa"];
$duracion         = $_POST["duracion"];

$query = "SELECT `id_Programa`, `nombre_Programa`,tipo_programa.Tipo, `duracion`, `id_Usuario` FROM `programas` INNER JOIN tipo_programa ON programas.Id_Tipo_Programa=tipo_programa.Id_Tipo_Programa

WHERE nombre_Programa LIKE '%$nombre_Programa%'
AND tipo_programa.Tipo LIKE '%$id_Tipo_Programa%'
AND  duracion LIKE '%$duracion%'";
$resource = mysqli_query($conexion, $query);
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
				  <td>' . $fila[1] . '</td>
				  <td>' . $fila[2] . '</td>
				  <td>' . $fila[3] . '</td>
				</tr>
				</thead>
			</table>

	';

}

$pdf->SetFont('Helvetica', '', 10);

$pdf->writeHTML($html, true, 0, true, 0);
$pdf->lastPage();

$pdf->output('Programas_Registrados (SIE).pdf', 'D');
