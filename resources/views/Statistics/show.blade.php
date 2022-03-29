@extends('layouts.app')

@section('title', __('main.home'))

@section('additionalCssFiles')
  <!-- Styles -->
  <style>
    #chartdiv {
      width: 100%;
      height: 500px;
    }
  </style>
@endsection

@section('content')
  @php
    $locale = \App::getLocale();
    if($locale == 'uz') {
      $name = 'name_cyrl';
    }elseif($locale == 'oz'){
      $name = 'name_uz';
    }elseif($locale == 'en'){
      $name = 'name_en';
    }else{
      $name = 'name_ru';
    }
  @endphp
  <div class="whiteSection">
    <div class="mainContainer">
      <div class="contentBlock firstContent">
        <h1 style="text-align: center">{{ $statistics->$name }}</h1>
        <!-- HTML -->
        <div id="chartdiv"></div>
      </div>
    </div>
  </div>
@endsection
@section('additionalJsFiles')
  <!-- Resources -->
  <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
  <!-- Chart code -->
  <script>
    am4core.ready(function() {

// Themes begin
      am4core.useTheme(am4themes_animated);
// Themes end

      var chart = am4core.create("chartdiv", am4charts.XYChart);
      chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

      chart.data = <?php echo json_encode($statisticsByRegions); ?>;

      console.log(chart.data)
      var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
      categoryAxis.renderer.grid.template.location = 0;
      categoryAxis.dataFields.category = "region";
      categoryAxis.renderer.labels.template.horizontalCenter = "right";
      categoryAxis.renderer.labels.template.verticalCenter = "middle";
      categoryAxis.renderer.labels.template.rotation = 270;
      categoryAxis.renderer.minGridDistance = 40;
      categoryAxis.fontSize = 18;

      var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
      valueAxis.min = 0;
      valueAxis.max = <?php echo $maxValue; ?>;
      valueAxis.strictMinMax = true;
      valueAxis.renderer.minGridDistance = 30;
// axis break
      var axisBreak = valueAxis.axisBreaks.create();
      axisBreak.startValue = 2100;
      axisBreak.endValue = 2900;
      axisBreak.disabled = true;
//axisBreak.breakSize = 0.005;

// fixed axis break
      var d = (axisBreak.endValue - axisBreak.startValue) / (valueAxis.max - valueAxis.min);
      axisBreak.breakSize = 0.05 * (1 - d) / d; // 0.05 means that the break will take 5% of the total value axis height

// make break expand on hover
      var hoverState = axisBreak.states.create("hover");
      hoverState.properties.breakSize = 1;
      hoverState.properties.opacity = 0.1;
      hoverState.transitionDuration = 1500;

      axisBreak.defaultState.transitionDuration = 1000;
      /*
      // this is exactly the same, but with events
      axisBreak.events.on("over", function() {
        axisBreak.animate(
          [{ property: "breakSize", to: 1 }, { property: "opacity", to: 0.1 }],
          1500,
          am4core.ease.sinOut
        );
      });
      axisBreak.events.on("out", function() {
        axisBreak.animate(
          [{ property: "breakSize", to: 0.005 }, { property: "opacity", to: 1 }],
          1000,
          am4core.ease.quadOut
        );
      });*/

      var series = chart.series.push(new am4charts.ColumnSeries());
      series.dataFields.categoryX = "region";
      series.dataFields.valueY = "value";
      series.columns.template.tooltipText = "{valueY.value}";
      series.columns.template.tooltipY = 0;
      series.columns.template.strokeOpacity = 0;

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
      series.columns.template.adapter.add("fill", function(fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
      });

    }); // end am4core.ready()
  </script>

@endsection
