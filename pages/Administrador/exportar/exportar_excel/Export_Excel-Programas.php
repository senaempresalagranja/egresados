<?php

    include '../../../../assets/conexion/conexion.php';
    // if (mysqli_connect_errno()) {
    //     printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
    //     exit();
    // }
    // $consulta = "SELECT `idAlimentacion`, galpon.NombreGalpon, articulos.Nombre, alimentacion.Cantidad, `Fecha`, `Hora` FROM `alimentacion` INNER JOIN encasetamiento ON alimentacion.idEncasetamiento=encasetamiento.idEncasetamiento INNER JOIN articulos ON alimentacion.idArticulo=articulos.idArticulo INNER JOIN galpon ON encasetamiento.idGalpon=galpon.idGalpon     ORDER BY Fecha";
    // $resultado = $conexion->query($consulta);
    // if($resultado->num_rows > 0 ){

session_start();    
$usuario=($_SESSION['ADMINISTRADOR']); 
$nombre_Programa=$_POST["nombre_Programa"];
$id_Tipo_Programa=$_POST["id_Tipo_Programa"];
$duracion=$_POST["duracion"];


    $consulta="SELECT `id_Programa`, `nombre_Programa`,tipo_programa.Tipo, `duracion`, `id_Usuario` FROM `programas` INNER JOIN tipo_programa ON programas.Id_Tipo_Programa=tipo_programa.Id_Tipo_Programa 

WHERE nombre_Programa LIKE '%$nombre_Programa%' 
AND tipo_programa.Tipo LIKE '%$id_Tipo_Programa%' 
AND  duracion LIKE '%$duracion%'";

$resultado = $conexion->query($consulta);
    if($resultado->num_rows > 0 ){

                        
        date_default_timezone_set('America/Mexico_City');

        if (PHP_SAPI == 'cli')
            die('Este archivo solo se puede ver desde un navegador web');

        /** Se agrega la libreria PHPExcel */
        require_once '../../../../assets/lib/PHPExcel/Classes/PHPExcel.php';

        // Se crea el objeto PHPExcel
        $objPHPExcel = new PHPExcel();

        // Se asignan las propiedades del libro
        $objPHPExcel->getProperties()->setCreator("SIE") //Autor
                             ->setLastModifiedBy("SIE") //Ultimo usuario que lo modificó
                             ->setTitle("Programas De Formacion")
                             ->setSubject("Programas De Formacion")
                             ->setDescription("Programas De Formacion")
                             ->setKeywords("Programas De Formacion")
                             ->setCategory("Reporte excel");

        // 3) Escribiendo data
        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('SIE');
        $objDrawing->setDescription('');
        $objDrawing->setPath('../../../../assets/img/SIE.png');     
        $objDrawing->setHeight(60);             
        $objDrawing->setCoordinates('A1');   
        $objDrawing->setOffsetX(8);     
        $objDrawing->setOffsety(10); 
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());                   

        $tituloReporte = "Programas De Formacion";
        $titulosColumnas = array('Programa', 'Tipo Programa', 'Duracion');
        
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A1:C1');
                        
        // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1',$tituloReporte)
                    ->setCellValue('A2',  $titulosColumnas[0])
                    ->setCellValue('B2',  $titulosColumnas[1])
                    ->setCellValue('C2',  $titulosColumnas[2]);

                    
        
        //Se agregan los datos de los alumnos
        $i = 3; // esto es para mostrar laos nombres de las columnas 
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,  $fila['1'])
                    ->setCellValue('B'.$i,  $fila['2'])
                    ->setCellValue('C'.$i,  $fila['3']);
                    $i++;
        }


        // $objPHPExcel->getActiveSheet()->getRowDimension('A')->setRowHeight(30);


        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(60);

        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(52000);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(22000);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(22000);
        // $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(100000000000);


        
        $estiloTituloReporte = array(
            'font' => array(
                'name'      => 'Quicksand',
                'bold'      => true,
                'italic'    => false,
                'strike'    => false,
                'size' =>18,
                    'color'     => array(
                        'rgb' => 'FFFFFF'
                    )
            ),
            'fill' => array(
                'type'  => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('argb' => '238276')
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_NONE                    
                )
            ), 
            'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation'   => 0,
                    'wrap'          => true 
            ),

        );

        $estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Quicksand',
                'bold'      => true,                          
                'color'     => array(
                    'rgb' => '555555'
                )
            ),
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                'rotation'   => 90,
                'startcolor' => array(
                    'rgb' => '238276'
                ),
                'endcolor'   => array(
                    'argb' => 'FFFFFF'
                )
            ),
            'borders' => array(
                'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '238276'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => 'FFFFFF'
                    )
                )
            ),
            'alignment' =>  array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'wrap'          => TRUE
            ));
            
        $estiloInformacion = new PHPExcel_Style();
        $estiloInformacion->applyFromArray(
            array(
                'font' => array(
                'name'      => 'Quicksand',               
                'color'     => array(
                    'rgb' => '000000'
                )
            ),
            'fill'  => array(
                'type'      => PHPExcel_Style_Fill::FILL_SOLID,
                'color'     => array('argb' => 'FFFFFF')
            ),
            'borders' => array(
                'allborders'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN ,
                    'color' => array(
                        'rgb' => '3a2a47'
                    )
                ) 

            )

      //        'alignment' =>  array(
      //            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
      //            'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
      //            'rotation'   => 0,
      //            'wrap'          => true 
            // ),

        ));
         
        $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A2:C2')->applyFromArray($estiloTituloColumnas);       
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A3:C".($i-1));
                
        for($i = 'A'; $i <= 'C'; $i++){
            


            $objPHPExcel->setActiveSheetIndex(0)            
                ->getColumnDimension($i)->setAutoSize(false); // NO CAMBIAR A "TRUE" AL MENOS QUE QUIERAS QUE LAS CELDAS SE ACOMODEN AUTOMATICAMENTE AUNQUE NO ES MUY RECOMENDABLE POR QUE GENERA ALGUNOS PROBLEMAS AL MOEMENTO DE QUERER AJUSTAR EL ANCHO MANUALMENTE
        }
        
        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Programas De Formacion');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        // el 0 equilale a las filas
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,3);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Programas_Registrados (SIE).xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
        
    }
    else{
        print_r('No hay resultados para mostrar');
    }
?>