<?php

?>
<div id="mapa-container-custom"></div>
<script>

    // Prepare demo data
    // Data is joined to map using value of 'hc-key' property by default.
    // See API docs for 'joinBy' for more info on linking data and map.
    var data = <?php echo $mapData; ?>

    // Create the chart
    Highcharts.mapChart('mapa-container-custom', {
        chart: {
            map: 'countries/uz/uz-all',
            backgroundColor:'#f5f7f7',
        },
        credits: {
            enabled: false
        },
        navigation: {
            buttonOptions: {
                enabled: false
            }
        },

        title: {
            text: ''
        },

        subtitle: {
            text: ''
        },

        //   mapNavigation: {
        //       enabled: false,
        //       buttonOptions: {
        //           verticalAlign: 'bottom'
        //       }
        //   },

        colorAxis: {
            min: 0
        },
        legend: {
            enabled: false,
            },
        series: [{
            data: data,
            mapData: Highcharts.maps['countries/uz/uz-all'],
            name: 'Ўзбекистон Республикаси / Республика Узбекистан',
            showInLegend: true,
            enableMouseTracking: true,
            states: {
                hover: {
                    color: '#fff',
                }
            },
          dataLabels: {
              enabled: true,
              format: '{point.region_name}',
              style:{
                       fontSize: '10px',
                    }
          },
        tooltip: {
            headerFormat: '',
            backgroundColor: null,
            borderWidth: 0,
            shadow: false,
            useHTML: true,
            pointFormat: '<p><strong>{point.name_uz}</strong></p><br><p><span>{point.phone}</span></p><br><p><span>{point.address}</span></p><br><p><span>{point.accept}</span></p>' +
              '<p>{point.legal_entity_count}</p><br><p><span>{point.physical_entity_count}</span></p><br><p><span>{point.male_count}</span></p><br><p><span>{point.female_count}</span></p>'
        }
      }]
    });

    </script>
