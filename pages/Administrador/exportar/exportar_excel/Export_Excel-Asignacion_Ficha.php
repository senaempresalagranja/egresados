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
    $id_Programa=$_POST["id_Programa"];
    $id_Ficha=$_POST["id_Ficha"];
    $Fecha_Ingreso=$_POST["Fecha_Ingreso"];
    $Fecha_Fin=$_POST["Fecha_Fin"];


    $consulta="SELECT `id_Programa_Ficha`, programas.nombre_Programa, fichas.numero_Ficha, `Fecha_Ingreso`, `Fecha_Fin`, `Matriculados`, `Graduados` FROM `programa_ficha` INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha

 WHERE programas.nombre_Programa LIKE '%$id_Programa%' 
AND fichas.numero_Ficha LIKE '%$id_Ficha%' 
AND  Fecha_Ingreso LIKE '%$Fecha_Ingreso%'
AND  Fecha_Fin LIKE '%$Fecha_Fin%'";

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
                             ->setTitle("Registros De Fichas Asignadas")
                             ->setSubject("Registros De Fichas Asignadas")
                             ->setDescription("Registros De Fichas Asignadas")
                             ->setKeywords("Registros De Fichas Asignadas")
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

        $tituloReporte = "Programas Con Ficha Asiganada";
        $titulosColumnas = array('Programa', 'Ficha Programa', 'Fecha Inicio', 'Fecha Fin', 'Matriculados ', 'Graduados ');
        
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A1:F1');
                        
        // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1',$tituloReporte)
                    ->setCellValue('A2',  $titulosColumnas[0])
                    ->setCellValue('B2',  $titulosColumnas[1])
                    ->setCellValue('C2',  $titulosColumnas[2])
                    ->setCellValue('D2',  $titulosColumnas[3])
                    ->setCellValue('E2',  $titulosColumnas[4])
                    ->setCellValue('F2',  $titulosColumnas[5]);
                    
        
        //Se agregan los datos de los alumnos
        $i = 3; // esto es para mostrar laos nombres de las columnas 
        while ($fila = $resultado->fetch_array()) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,  $fila['1'])
                    ->setCellValue('B'.$i,  $fila['2'])
                    ->setCellValue('C'.$i,  $fila['3'])
                    ->setCellValue('D'.$i,  $fila['4'])
                    ->setCellValue('E'.$i,  $fila['5'])
                    ->setCellValue('F'.$i,  $fila['6']);
                    $i++;
        }





        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(60);

        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);


        
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
         
        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($estiloTituloColumnas);       
        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A3:F".($i-1));
                
        for($i = 'A'; $i <= 'F'; $i++){


            $objPHPExcel->setActiveSheetIndex(0)            
                ->getColumnDimension($i)->setAutoSize(false); // NO CAMBIAR A "TRUE" AL MENOS QUE QUIERAS QUE LAS CELDAS SE ACOMODEN AUTOMATICAMENTE AUNQUE NO ES MUY RECOMENDABLE POR QUE GENERA ALGUNOS PROBLEMAS AL MOEMENTO DE QUERER AJUSTAR EL ANCHO MANUALMENTE
        }
        
        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Programas Con Ficha Asiganada');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        // el 0 equilale a las filas
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,3);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Programas_Con_Ficha_Asiganada (SIE).xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
        
    }
    else{
        print_r('No hay resultados para mostrar');
    }
?>