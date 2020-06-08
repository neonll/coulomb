@extends('layout.app')

@section('title')
    {{ $session->title }}
@endsection

@section('title-buttons')
    <div class="m-auto">Запись <span id="span_state"></span></div>
    &nbsp;
    <button class="btn btn-sm btn-outline-success button_start"><i class="fa fa-play"></i></button>
    &nbsp;
    <button class="btn btn-sm btn-outline-danger button_stop"><i class="fa fa-stop"></i></button>
@endsection


@section('content')
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }

    </style>
    <div id="chartdiv"></div>
@endsection

@section('page-scripts')
    <script src="{{ asset('dist/amcharts4/core.js') }}"></script>
    <script src="{{ asset('dist/amcharts4/charts.js') }}"></script>
    <script src="{{ asset('dist/amcharts4/themes/animated.js') }}"></script>

    <script>
        var State = 0;

        function checkState() {
            $.get("/sessions/checkFile", function (state) {
                if (state == 1) {
                    $('.button_start').attr('disabled', 'disabled');
                    $('.button_stop').removeAttr('disabled');
                    $('#span_state').text('запущена');
                    State = 1;
                } else {
                    $('.button_stop').attr('disabled', 'disabled');
                    $('.button_start').removeAttr('disabled');
                    $('#span_state').text('остановлена');
                    State = 0;
                }

            });
        }

        checkState();
        // updateRanges();

        function updateStateRanges() {
            checkState();
            if (State == 1)
                if (chart.data.length)
                    updateRanges();
        }

        window.setInterval(function () {
            updateStateRanges();
        }, 5000);

        $('.button_start').click(function () {
            var session_id = {{ $session->id }};
            $.post('/sessions/putFile', {'_token': '{{ csrf_token() }}', 'session_id': session_id})
                .done(function (result) {
                    console.log(result);
                    updateStateRanges();
                });
        });

        $('.button_stop').click(function () {
            var session_id = {{ $session->id }};
            $.post('/sessions/deleteFile', {'_token': '{{ csrf_token() }}'})
                .done(function (result) {
                    console.log(result);
                    updateStateRanges();
                });
        });


        am4core.ready(function () {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            chart = am4core.create("chartdiv", am4charts.XYChart);

            // Add data
            chart.dataSource.url = "/sessions/{{ $session->id }}/getAjaxPoints";
            chart.dataSource.reloadFrequency = 5000;
            chart.dataSource.incremental = true;
            chart.dataSource.adapter.add("url", function(url, target) {
                if (target.lastLoad) {
                    url += "/" + target.lastLoad.getTime();
                }
                return url;
            });

            // Set input format for the dates
            chart.dateFormatter.inputDateFormat = "yyyy-MM-dd hh:mm:ss";

            // the following line makes value axes to be arranged vertically.
            chart.leftAxesContainer.layout = "vertical";

            // Create axes
            dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.grid.template.location = 0;
            dateAxis.renderer.ticks.template.length = 8;
            // dateAxis.renderer.ticks.template.strokeOpacity = 0.1;
            // dateAxis.renderer.grid.template.disabled = true;
            // dateAxis.renderer.ticks.template.disabled = false;
            // dateAxis.renderer.ticks.template.strokeOpacity = 0.2;
            // dateAxis.renderer.minLabelPosition = 0.01;
            // dateAxis.renderer.maxLabelPosition = 0.99;
            // dateAxis.keepSelection = true;
            // dateAxis.minHeight = 30;

            var valueAxisV = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxisV.tooltip.disabled = true;
            valueAxisV.zIndex = 1;
            valueAxisV.renderer.baseGrid.disabled = true;
            // valueAxisV.baseValue = 0;
            valueAxisV.height = am4core.percent(50);

            valueAxisV.renderer.gridContainer.background.fill = am4core.color("#000000");
            valueAxisV.renderer.gridContainer.background.fillOpacity = 0.05;
            valueAxisV.renderer.inside = true;
            valueAxisV.renderer.labels.template.verticalCenter = "bottom";
            valueAxisV.renderer.labels.template.padding(2, 2, 2, 2);

            var valueAxisA = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxisA.tooltip.disabled = true;
            // valueAxisA.baseValue = 0;
            valueAxisA.height = am4core.percent(50);
            valueAxisA.zIndex = 3;
            valueAxisA.marginTop = 20;
            // valueAxisA.renderer.opposite = true;
            // valueAxisA.syncWithAxis = valueAxisV;
            valueAxisA.renderer.baseGrid.disabled = true;
            valueAxisA.renderer.inside = true;
            valueAxisA.renderer.labels.template.verticalCenter = "bottom";
            valueAxisA.renderer.labels.template.padding(2, 2, 2, 2);
            valueAxisA.renderer.gridContainer.background.fill = am4core.color("#000000");
            valueAxisA.renderer.gridContainer.background.fillOpacity = 0.05;



// Create series
            var seriesV = chart.series.push(new am4charts.LineSeries());
            seriesV.dataFields.valueY = "v";
            seriesV.dataFields.dateX = "date";
            seriesV.tooltipText = "{v}"
            seriesV.strokeWidth = 2;
            seriesV.defaultState.transitionDuration = 0;
            // seriesV.minBulletDistance = 15;
            // seriesV.fillOpacity = 0.3;

            var seriesA = chart.series.push(new am4charts.LineSeries());
            seriesA.dataFields.valueY = "a";
            seriesA.dataFields.dateX = "date";
            seriesA.tooltipText = "{a}"
            seriesA.strokeWidth = 2;
            // seriesA.minBulletDistance = 15;
            seriesA.yAxis = valueAxisA;
            seriesA.connect = false;
            seriesA.autoGapCount = 50;
            seriesA.defaultState.transitionDuration = 0;


// Drop-shaped tooltips
            seriesV.tooltip.background.cornerRadius = 20;
            seriesV.tooltip.background.strokeOpacity = 0;
            seriesV.tooltip.pointerOrientation = "vertical";
            seriesV.tooltip.label.minWidth = 40;
            seriesV.tooltip.label.minHeight = 40;
            seriesV.tooltip.label.textAlign = "middle";
            seriesV.tooltip.label.textValign = "middle";
            seriesV.tooltipText = "{v}";

            seriesA.tooltip.background.cornerRadius = 20;
            seriesA.tooltip.background.strokeOpacity = 0;
            seriesA.tooltip.pointerOrientation = "vertical";
            seriesA.tooltip.label.minWidth = 40;
            seriesA.tooltip.label.minHeight = 40;
            seriesA.tooltip.label.textAlign = "middle";
            seriesA.tooltip.label.textValign = "middle";
            seriesA.tooltipText = "{a}";


// Make bullets grow on hover
//             var bulletV = seriesV.bullets.push(new am4charts.CircleBullet());
//             bulletV.circle.strokeWidth = 2;
//             bulletV.circle.radius = 4;
//             bulletV.circle.fill = am4core.color("#fff");
//
//             var bullethoverV = bulletV.states.create("hover");
//             bullethoverV.properties.scale = 1.3;
//
//             var bulletA = seriesV.bullets.push(new am4charts.CircleBullet());
//             bulletA.circle.strokeWidth = 2;
//             bulletA.circle.radius = 4;
//             bulletA.circle.fill = am4core.color("#fff");
//
//             var bullethoverA = bulletA.states.create("hover");
//             bullethoverA.properties.scale = 1.3;

// Make a panning cursor
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.behavior = "panXY";
            chart.cursor.xAxis = dateAxis;
            // chart.cursor.snapToSeries = seriesV;
            // chart.cursor.snapToSeries = seriesA;

// Create vertical scrollbar and place it before the value axis
//             chart.scrollbarY = new am4core.Scrollbar();
//             chart.scrollbarY.parent = chart.leftAxesContainer;
//             chart.scrollbarY.toBack();
            chart.scrollbarY = new am4core.Scrollbar();
            chart.scrollbarY.marginTop = 0;


// Create a horizontal scrollbar with previe and place it underneath the date axis
            chart.scrollbarX = new am4charts.XYChartScrollbar();
            chart.scrollbarX.series.push(seriesV);
            // chart.scrollbarX.series.push(seriesA);
            chart.scrollbarX.parent = chart.bottomAxesContainer;

            dateAxis.start = 0;
            dateAxis.keepSelection = true;

        }); // end am4core.ready()

        function updateRanges() {
            var mode = 0;
            var range_started = null;
            var data = chart.data;
            var ranges = [];

            if (data[0].mode != 0) {
                range_started = data[0].date;
            }

            $.each(data, function (i, val) {
                if (i > 0) {
                    if (data[i-1].mode != val.mode) {
                        if (range_started) {
                            ranges.push({'start': range_started, 'end': data[i-1].date, 'mode': data[i-1].mode});

                            if (val.mode != 0) {
                                range_started = val.date;
                            }
                            else {
                                range_started = null;
                            }
                        }
                        else {
                            range_started = val.date;
                        }
                    }
                }
            });

            if (range_started) {
                ranges.push({'start': range_started, 'end': new Date(), 'mode': data[data.length - 1].mode});
            }

            // console.log(ranges);

            dateAxis.axisRanges.clear();

            $.each(ranges, function (i, val) {
                var color = null;

                switch (val.mode) {
                    case 3:
                        color = "#7700ff";
                        break;
                    case 4:
                        color = "#00ff00";
                        break;
                    case 5:
                        color = "#0000ff";
                        break;
                    case 6:
                        color = "#777777";
                        break;
                    case 7:
                        color = "#ff0000";
                        break;
                }

                if (color) {
                    var range = dateAxis.axisRanges.create();
                    range.date = val.start;
                    range.endDate = val.end;
                    range.axisFill.fill = am4core.color(color);
                    range.axisFill.fillOpacity = 0.3;

                    var scrollAxisX = chart.scrollbarX.scrollbarChart.xAxes.getIndex(0);
                    var range2 = scrollAxisX.axisRanges.create();
                    range2.date = val.start;
                    range2.endDate = val.end;
                    range2.axisFill.fill = am4core.color(color);
                    range2.axisFill.fillOpacity = 0.3;
                }
            });
        }

    </script>
@endsection
