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

    $id_Ficha=$_POST["id_Ficha"];

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
                             ->setTitle("Egresados Registrados")
                             ->setSubject("Egresados Registrados")
                             ->setDescription("Egresados Registrados")
                             ->setKeywords("Egresados Registrados")
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

        $tituloReporte = "Egresados Registrados";
        $titulosColumnas = array('Nombre', 
            'N°Documento', 
            'Departamento', 
            'Municipio',
            'Correo Electronico',
            'Telefono Fijo',
            'Telefono Alternoo',
            'Telefono Celular',
            'Facebook',
            'Sexo',
            'Fecha Nacimiento', 
            'Ficha',
            'Programa De Formacion',
            'Fecha Certificacion',
            'Contactado');
        
        $objPHPExcel->setActiveSheetIndex(0)
                    ->mergeCells('A1:K1');
                        
        // Se agregan los titulos del reporte

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
  $i = 3;
  $numero_utilizadas=0;
while ($reg=mysqli_fetch_row($res)) {

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
            

            $estiloTituloColumnas2 = array(
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

        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1',$tituloReporte)
                    ->setCellValue('A2',  $titulosColumnas[0])
                    ->setCellValue('B2',  $titulosColumnas[1])
                    ->setCellValue('C2',  $titulosColumnas[2])
                    ->setCellValue('D2',  $titulosColumnas[3])
                    ->setCellValue('E2',  $titulosColumnas[4])
                    ->setCellValue('F2',  $titulosColumnas[5])
                    ->setCellValue('G2',  $titulosColumnas[6])
                    ->setCellValue('H2',  $titulosColumnas[7])
                    ->setCellValue('I2',  $titulosColumnas[8])
                    ->setCellValue('J2',  $titulosColumnas[9])
                    ->setCellValue('K2',  $titulosColumnas[10])
                    ->setCellValue('L2',  $titulosColumnas[11])
                    ->setCellValue('M2',  $titulosColumnas[12])
                    ->setCellValue('N2',  $titulosColumnas[13])
                    ->setCellValue('O2',  $titulosColumnas[14]);
                    


        
                    
        
        //Se agregan los datos de los alumnos
       // esto es para mostrar laos nombres de las columnas 
$reg[3]=$reg[3] . " " .$reg[4];
$reg[1]=$reg[1] . " " .$reg[2];
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i,  $reg['3'])
                    ->setCellValue('B'.$i,  $reg['1'])
                    ->setCellValue('C'.$i,  $reg['5'])
                    ->setCellValue('D'.$i,  $reg['6'])
                    ->setCellValue('E'.$i,  $reg['7'])
                    ->setCellValue('F'.$i,  $reg['8'])
                    ->setCellValue('G'.$i,  $reg['9'])
                    ->setCellValue('H'.$i,  $reg['10'])
                    ->setCellValue('I'.$i,  $reg['11'])
                    ->setCellValue('J'.$i,  $reg['12'])
                    ->setCellValue('K'.$i,  $reg['13']);

    $id_egresado=$reg[0];
    $res1=mysqli_query($conexion,"SELECT `id_contactado`, `id_Egresado`, `contactado`, `actualizacion` FROM `contactacion`
        WHERE id_Egresado=$id_egresado ");
    $reg1=mysqli_fetch_row($res1);
    $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('O' . $i , $reg1['2']);
                    
         // $i++;
         //     $i++;

    $res1=mysqli_query($conexion,"SELECT `Id_asociacion_egresados`,programas.nombre_Programa, fichas.numero_Ficha, `FechaCertificacion` FROM `asociacion_egresados` 
        INNER JOIN programa_ficha ON asociacion_egresados.id_Programa_Ficha= programa_ficha.id_Programa_Ficha
        INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa 
        INNER JOIN fichas ON programa_ficha.id_Ficha=fichas.id_Ficha 
        WHERE asociacion_egresados.id_Egresado=$id_egresado GROUP BY asociacion_egresados.Id_asociacion_egresados");
    while ($reg1=mysqli_fetch_row($res1)) {
        $id_asociacion_egresado=$reg1[0];


  

      // $i++;

  // $objPHPExcel->setActiveSheetIndex(0)

  //                   ->setCellValue('A' . $i,  '# Ficha')
  //                   ->setCellValue('B' . $i,  'Programa De Formación')
  //                   ->setCellValue('C' . $i,  'Fecha Certificación');
  //    $i++;
 $objPHPExcel->setActiveSheetIndex(0)

                    ->setCellValue('L' . $i,  $reg1['2'])
                    ->setCellValue('M' . $i,  $reg1['1'])
                    ->setCellValue('N' . $i,  $reg1['3']);
}

              
     $i++;



    $res2=mysqli_query($conexion,"SELECT `Id_Etapa_Practica_Egresado`, `Id_asociacion_egresados`, empresa.Nombre_Empresa, tipo_etapa_practica.Nombre_Etapa, `Nombre_Proyecto`, `Ultima_Actualizacion` FROM `etapa_practica_egresado`

        INNER JOIN empresa on etapa_practica_egresado.Id_Etapa_Practica_Egresado=empresa.id_Empresa

        INNER JOIN tipo_etapa_practica ON etapa_practica_egresado.Id_Etapa_Practica_Egresado=tipo_etapa_practica.Id_Tipo_Etapa_Practica

        WHERE `Id_asociacion_egresados`=$id_asociacion_egresado");


  $objPHPExcel->setActiveSheetIndex(0)

                    ->setCellValue('A' . $i,  'Etapa Practica');
                         $i++;

 $objPHPExcel->setActiveSheetIndex(0)

                    ->setCellValue('A' . $i,  'Tipo Etapa Practica')
                    ->setCellValue('B' . $i,  'Detalles');

                        while ($reg2=mysqli_fetch_row($res2)) {
                                 $i++;
    // aqui valido si nombre proyecto es null osea que es tipo empresa
        if ($reg2[4]==null && $reg2[2]!=null) {
 $objPHPExcel->setActiveSheetIndex(0)

                    ->setCellValue('A' . $i,  $reg2['3'])
                    ->setCellValue('B' . $i,  $reg2['2']);
$i++;
        }else if($reg2[4]==null && $reg2[2]==null){
 $objPHPExcel->setActiveSheetIndex(0)

                    ->setCellValue('A' . $i,  $reg2['3']);
$i++;
        }else{

 $objPHPExcel->setActiveSheetIndex(0)

                    ->setCellValue('A' . $i,  $reg2['4']);
$i++;
        }

    }
$i++;
    $res1=mysqli_query($conexion,"SELECT `Id_Situacion` FROM `asociacion_situacion_laboral` WHERE `id_Egresado`=$id_egresado");
 $objPHPExcel->setActiveSheetIndex(0)

                    ->setCellValue('A' . $i,  'Situación Laboral');
$i++;
                        while ($reg1=mysqli_fetch_row($res1)) {
        if ($reg1[0]==1) {
 $objPHPExcel->setActiveSheetIndex(0)

                    ->setCellValue('A' . $i,  'Desempleado');
$i++;
        


    }else if ($reg1[0]==3){

    $res2=mysqli_query($conexion,"SELECT `Id_Estudiando_Egresado`, `id_Egresado`, universidades.Nombre_universidad, `Nombre_Carrera`, `Ultima_Actualizacion` FROM `estudiando_egresado` INNER JOIN universidades ON estudiando_egresado.Id_universidad=universidades.Id_universidad WHERE `id_Egresado`=$id_egresado");
            while ($reg2=mysqli_fetch_row($res2)) {
 $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i,  'Situacion')
                    ->setCellValue('B' . $i,  'Lugar')
                    ->setCellValue('C' . $i,  'Detalles');
                 $i++;   
                     $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i,  'Estudiando')
                    ->setCellValue('B' . $i,  $reg2['2'])
                    ->setCellValue('C' . $i,  $reg2['3']);
$i++;
$i++;
$i++;


            }


        }else{

        // echo "trabajando";

            $res2=mysqli_query($conexion,"SELECT `Id_Trabajando_Egresado`, `id_Egresado`, empresa.Nombre_Empresa, `Funcion_Desempena`, `Funcion_Relacion_Programa`, `Salario`, `Intensidad_Horaria`, `Ultima_Actualizacion` FROM `trabajando_egresado` INNER JOIN empresa ON trabajando_egresado.id_Empresa=empresa.id_Empresa WHERE `id_Egresado`=$id_egresado");
$i++;
            while ($reg2=mysqli_fetch_row($res2)) {
 $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i,  'Situación')
                    ->setCellValue('B' . $i,  'Empresa')
                    ->setCellValue('C' . $i,  'Función Que Desempeña ')
                    ->setCellValue('D' . $i,  'Tiene que ver con el Programa')
                    ->setCellValue('E' . $i,  'Salario')
                    ->setCellValue('F' . $i,  'Intensidad Horaria  ');
$i++;
                     $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i,  'Trabajando')
                    ->setCellValue('B' . $i,  $reg2['2'])
                    ->setCellValue('C' . $i,  $reg2['3'])
                    ->setCellValue('D' . $i,  $reg2['4'])
                    ->setCellValue('E' . $i,  $reg2['5'])
                    ->setCellValue('F' . $i,  $reg2['6']);
      
$i++;
$i++;
$i++;
            }

        }
}

}






        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(60);

        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(14);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);




$objPHPExcel->getActiveSheet()
            ->getStyle('A8')
            ->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('#A5DF00');


        
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
         
        $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->applyFromArray($estiloTituloReporte);
        $objPHPExcel->getActiveSheet()->getStyle('A2:O2')->applyFromArray($estiloTituloColumnas);   

        $objPHPExcel->getActiveSheet()->getStyle('A9:O9')->applyFromArray($estiloTituloColumnas2);  


        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A3:O".($i-1));
                
        for($i = 'A'; $i <= 'O'; $i++){


            $objPHPExcel->setActiveSheetIndex(0)            
                ->getColumnDimension($i)->setAutoSize(false); // NO CAMBIAR A "TRUE" AL MENOS QUE QUIERAS QUE LAS CELDAS SE ACOMODEN AUTOMATICAMENTE AUNQUE NO ES MUY RECOMENDABLE POR QUE GENERA ALGUNOS PROBLEMAS AL MOEMENTO DE QUERER AJUSTAR EL ANCHO MANUALMENTE
        }
        
        // Se asigna el nombre a la hoja
        $objPHPExcel->getActiveSheet()->setTitle('Egresados Registrados');

        // Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objPHPExcel->setActiveSheetIndex(0);
        // Inmovilizar paneles 
        // el 0 equilale a las filas
        $objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,3);

        // Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Egresados Registrados (SIE).xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
        
    

?>