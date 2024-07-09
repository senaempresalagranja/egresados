<div class="col-md-12"  >
       
                
  <div class="col-md-12"> 
    <div class="bs-component">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#Aprendices_Graduados_Egresados" data-toggle="tab"><i class="icons icon-info8"></i>Aprendices Graduados</a></li>
        <li><a href="#Aprendices_Contactados_Egresados" data-toggle="tab"><i class="icons icon-earth-globe"></i> Aprendices Contactados</a></li>

        <li><a href="#Situacion_Laboral_Egresados" data-toggle="tab"><i class="icons icon-earth-globe"></i>Situacion Laboral</a></li>

        <li><a href="#Tipo_Modalidad_Egresados" data-toggle="tab"><i class="icons icon-earth-globe"></i> Tipo Modalidad </a></li>
      </ul>
      <div class="tab-content" id="myTabContent">
        
        <!-- aprendices graduados -->
        <div class="tab-pane fade active in" id="Aprendices_Graduados_Egresados">
        
          <div class="" id="matriculados"></div>

        </div>

<!-- aprendices contactados -->
        <div class="tab-pane fade" id="Aprendices_Contactados_Egresados">
            
          <div class="" id="contactados"></div>

        </div>

<!-- situacion laboral -->
        <div class="tab-pane fade" id="Situacion_Laboral_Egresados">

          <div class="" id="situacion_laboral"></div>

        </div>

        <div class="tab-pane fade" id="Tipo_Modalidad_Egresados">

          <div class="" id="modalidad"></div>

        </div>


      </div>
    </div>
  </div>
</div>



<?php 
include '../../../assets/conexion/conexion.php';
$numero_ficha=$_POST["numero_ficha"];


$query="SELECT programa_ficha.Matriculados,programa_ficha.Graduados, programas.nombre_Programa,COUNT(contactacion.contactado)AS contactados  FROM `fichas` 
INNER JOIN programa_ficha ON fichas.id_Ficha=programa_ficha.id_Ficha
INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa
INNER JOIN asociacion_egresados ON programa_ficha.id_Programa_Ficha=asociacion_egresados.id_Programa_Ficha
INNER JOIN contactacion ON asociacion_egresados.id_Egresado=contactacion.id_Egresado WHERE fichas.numero_Ficha='$numero_ficha'";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);

echo "<script>

var graduados=$fila[1];
var Matriculados=$fila[0];
var numero_Ficha=$numero_ficha;
var nombre_Programa='$fila[2]';
var contactado=$fila[3];

</script>";
 ?>
<!--  <script src="../graficas/highcharts.js"></script>
<script src="../graficas/modules/exporting.js"></script> -->


<script src="../../../assets/js/highcharts/highcharts.js"></script>
<script src="../../../assets/js/highcharts/modules/exporting.js"></script>
<script>


 var columna_1="#030A60";
        var columna_2="#4EE2F8";
    // Build the chart

// ------------------------------------------------------------------------------------------------------------------
     $('#modalidad').highcharts({
     chart: {
            type: 'column'
        },
        title: {
            text: 'TIPO MODALIDAD ETAPA PRACTICA ' + numero_Ficha
        },
        subtitle: {
            text: 'SIE'
        },
        xAxis: {
            categories: ['CONTRATO APRENDIZAJE','PASANTIAS','VINCULO LABORAL','APOYO A UNIDAD FAMILIAR','PROYECTO PRODUCTIVO','PROYECTO PRODUCTIVO','MONITORIAS'],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Egresados',
            data: [ <?php


                $sql = "  SELECT COUNT(etapa_practica_egresado.Id_Tipo_Etapa_Practica)  FROM `fichas` 
INNER JOIN programa_ficha ON fichas.id_Ficha=programa_ficha.id_Ficha
INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa
INNER JOIN asociacion_egresados ON programa_ficha.id_Programa_Ficha=asociacion_egresados.id_Programa_Ficha
INNER JOIN contactacion ON asociacion_egresados.id_Egresado=contactacion.id_Egresado
INNER JOIN etapa_practica_egresado ON asociacion_egresados.Id_asociacion_egresados=etapa_practica_egresado.Id_asociacion_egresados
WHERE fichas.numero_Ficha='$numero_ficha' GROUP BY etapa_practica_egresado.Id_Tipo_Etapa_Practica ORDER BY etapa_practica_egresado.Id_Tipo_Etapa_Practica";
                $result = mysqli_query($conexion,$sql);
                while ($registros2=mysqli_fetch_array($result))
                { ?>
	

                 <?php echo $registros2[0] ?>,
     
                  <?php
                }
        

                ?> ]

        }
        // , {
        //     name: 'London',
        //     data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        // }, {
        //     name: 'Berlin',
        //     data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        // }
        ]
    });

   // -----------------------------------------------------------------------------------------------------------------  

        $('#situacion_laboral').highcharts({
     chart: {
            type: 'column'
        },
        title: {
            text: 'SITUACION LABORAL ' + numero_Ficha
        },
        subtitle: {
            text: 'SIE'
        },
        xAxis: {
            categories: ['DESEMPLEADO','EMPLEADO','ESTUDIANDO'],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Egresados',
            data: [ <?php


                $sql = "SELECT COUNT(asociacion_situacion_laboral.id_asociacion_situacion_laboral)  FROM `fichas` 
INNER JOIN programa_ficha ON fichas.id_Ficha=programa_ficha.id_Ficha
INNER JOIN programas ON programa_ficha.id_Programa=programas.id_Programa
INNER JOIN asociacion_egresados ON programa_ficha.id_Programa_Ficha=asociacion_egresados.id_Programa_Ficha
INNER JOIN contactacion ON asociacion_egresados.id_Egresado=contactacion.id_Egresado
INNER JOIN asociacion_situacion_laboral ON asociacion_egresados.id_Egresado=asociacion_situacion_laboral.id_Egresado
WHERE fichas.numero_Ficha='$numero_ficha' GROUP BY asociacion_situacion_laboral.Id_Situacion ORDER BY asociacion_situacion_laboral.Id_Situacion";
                $result = mysqli_query($conexion,$sql);
                while ($registros2=mysqli_fetch_array($result))
                { ?>
	

                 <?php echo $registros2[0] ?>,
     
                  <?php
                }
        

                ?> ]

        }
        // , {
        //     name: 'London',
        //     data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        // }, {
        //     name: 'Berlin',
        //     data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        // }
        ]
    });

        // ------------------------------------------------------------------------------------------------
  $('#contactados').highcharts({
        chart: {
            // plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'APRENDICES CONTACTADOS ' + nombre_Programa + " " +   numero_Ficha
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: "Porcentaje",
            colorByPoint: true,
            data: [{
                name: "Egresados Graduados",
                y: graduados
            }, {
                name: "Egresados Contactados",
                y: contactado,
                sliced: true,
                selected: true
            }]
        }]
    });

// --------------------------------------------------------------------------------------------------------------
    $('#matriculados').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'APRENDICES GRADUADOS FICHA ' + numero_Ficha
        },
        subtitle: {
            text: 'SIE'
        },
        xAxis: {
            categories: [nombre_Programa + " " +   numero_Ficha     
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Matriculados',
            data: [Matriculados]

        }, {
            name: 'Graduados',
            data: [graduados]

        }
        // , {
        //     name: 'London',
        //     data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        // }, {
        //     name: 'Berlin',
        //     data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        // }
        ]
    });

// ---------------------------------------------------------------------------------------------------------
</script>
