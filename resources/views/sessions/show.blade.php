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
        let chart, dateAxis;

        $('.button_start').click(function () {
            const session_id = {{ $session->id }};
            $.post('/sessions/putFile', {'_token': '{{ csrf_token() }}', 'session_id': session_id})
                .done(function (result) {
                    console.log(result);
                    updateRanges();
                    // updateStateRanges();
                });
        });

        $('.button_stop').click(function () {
            const session_id = {{ $session->id }};
            $.post('/sessions/deleteFile', {'_token': '{{ csrf_token() }}'})
                .done(function (result) {
                    console.log(result);
                    updateRanges();
                    // updateStateRanges();
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

            chart.dataSource.events.on('done', function (ev) {
                updateRanges();
            });

            // Set input format for the dates
            chart.dateFormatter.inputDateFormat = "yyyy-MM-dd hh:mm:ss";

            // the following line makes value axes to be arranged vertically.
            chart.leftAxesContainer.layout = "vertical";

            // Create axes
            dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.grid.template.location = 0;
            dateAxis.renderer.ticks.template.length = 8;

            let valueAxisV = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxisV.tooltip.disabled = true;
            valueAxisV.zIndex = 1;
            valueAxisV.renderer.baseGrid.disabled = true;
            valueAxisV.height = am4core.percent(50);

            valueAxisV.renderer.gridContainer.background.fill = am4core.color("#000000");
            valueAxisV.renderer.gridContainer.background.fillOpacity = 0.05;
            valueAxisV.renderer.inside = true;
            valueAxisV.renderer.labels.template.verticalCenter = "bottom";
            valueAxisV.renderer.labels.template.padding(2, 2, 2, 2);

            let valueAxisA = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxisA.tooltip.disabled = true;
            valueAxisA.height = am4core.percent(50);
            valueAxisA.zIndex = 3;
            valueAxisA.marginTop = 20;
            valueAxisA.renderer.baseGrid.disabled = true;
            valueAxisA.renderer.inside = true;
            valueAxisA.renderer.labels.template.verticalCenter = "bottom";
            valueAxisA.renderer.labels.template.padding(2, 2, 2, 2);
            valueAxisA.renderer.gridContainer.background.fill = am4core.color("#000000");
            valueAxisA.renderer.gridContainer.background.fillOpacity = 0.05;



// Create series
            let seriesV = chart.series.push(new am4charts.LineSeries());
            seriesV.dataFields.valueY = "v";
            seriesV.dataFields.dateX = "date";
            seriesV.tooltipText = "{v}"
            seriesV.strokeWidth = 2;
            seriesV.defaultState.transitionDuration = 0;
            // seriesV.minBulletDistance = 15;
            // seriesV.fillOpacity = 0.3;

            let seriesA = chart.series.push(new am4charts.LineSeries());
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

// Make a panning cursor
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.behavior = "panXY";
            chart.cursor.xAxis = dateAxis;

// Create vertical scrollbar and place it before the value axis
            chart.scrollbarY = new am4core.Scrollbar();
            chart.scrollbarY.marginTop = 0;


// Create a horizontal scrollbar with previe and place it underneath the date axis
            chart.scrollbarX = new am4charts.XYChartScrollbar();
            chart.scrollbarX.series.push(seriesV);
            chart.scrollbarX.parent = chart.bottomAxesContainer;

            dateAxis.start = 0;
            dateAxis.keepSelection = true;

        }); // end am4core.ready()

        function updateRanges() {
            let mode = 0;
            let range_started = null;
            let data = chart.data;
            let ranges = [];

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
                let color = null;

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
                    let range = dateAxis.axisRanges.create();
                    range.date = val.start;
                    range.endDate = val.end;
                    range.axisFill.fill = am4core.color(color);
                    range.axisFill.fillOpacity = 0.3;

                    let scrollAxisX = chart.scrollbarX.scrollbarChart.xAxes.getIndex(0);
                    let range2 = scrollAxisX.axisRanges.create();
                    range2.date = val.start;
                    range2.endDate = val.end;
                    range2.axisFill.fill = am4core.color(color);
                    range2.axisFill.fillOpacity = 0.3;
                }
            });
        }

    </script>
@endsection
