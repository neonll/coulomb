<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Кулон-912</title>

{{--    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">--}}

<!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <style>
        body {
            padding-top: 3rem;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Кулон-912</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        {{--        <form class="form-inline my-2 my-lg-0">--}}
        {{--            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
        {{--            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>--}}
        {{--        </form>--}}
    </div>
</nav>

<main role="main" class="col-md-11 ml-sm-auto col-lg-12 px-md-4">

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@yield('title')</h1>
        @hasSection('title-buttons')
            <div class="btn-toolbar mb-2 mb-md-0">
                @yield('title-buttons')
                {{--            <div class="btn-group mr-2">--}}
                {{--                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>--}}
                {{--                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>--}}
                {{--            </div>--}}
                {{--            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">--}}
                {{--                <span data-feather="calendar"></span>--}}
                {{--                This week--}}
                {{--            </button>--}}
            </div>
        @endif
    </div>

    @yield('content')


</main><!-- /.container -->

@include('modals.charge_form');

<script src="{{ asset('js/app.js') }}"></script>

{{-- Flash message --}}
@if (Session::has('flash'))
    <script>
        flashData = ['{{ Session::get('flash')[0] }}', '{{ Session::get('flash')[1] }}'];

        var Flash = {
            'state': flashData[0],
            'message': flashData[1],
            'delay': (flashData[0] === 'danger') ? 0 : 2000
        };

        $.notify(
            {
                message: Flash.message,
            }, {
                type: Flash.state,
                delay: Flash.delay,
            }
        );
    </script>
@endif

@yield('page-scripts')

<script>
    $('#modalChargeForm').modal('show');

    function initSliderInput(controlId, type, sliderParams = {}, inputParams = {}) {
        const $input = $('#' + controlId + 'Input');
        const $slider = $('#' + controlId + 'Slider')[0];

        let sliderStart, sliderStep, sliderMin, sliderMax, sliderDecimals;
        let sliderParamsDefault = {};

        switch (type) {
            case 'hours':
                sliderParamsDefault = {
                    'start': 1,
                    'step': 1,
                    'min': 1,
                    'max': 24,
                    'decimals': 0
                };
                break;
            case 'v':
                sliderParamsDefault = {
                    'start': 12,
                    'step': 0.5,
                    'min': 3,
                    'max': 12,
                    'decimals': 1
                };
                break;
            case 'a':
                sliderParamsDefault = {
                    'start': 0.45,
                    'step': 0.05,
                    'min': 0.05,
                    'max': 0.9,
                    'decimals': 2
                };
                break;
            case 'minutes':
                sliderParamsDefault = {
                    'start': 120,
                    'step': 1,
                    'min': 1,
                    'max': 300,
                    'decimals': 0
                };
                break;
            case 'seconds':
                sliderParamsDefault = {
                    'start': 5,
                    'step': 1,
                    'min': 1,
                    'max': 20,
                    'decimals': 0
                };
                break;
        }

        sliderStart = 'start' in sliderParams ? sliderParams.start : sliderParamsDefault.start;
        sliderStep = 'step' in sliderParams ? sliderParams.step : sliderParamsDefault.step;
        sliderMin = 'min' in sliderParams ? sliderParams.min : sliderParamsDefault.min;
        sliderMax = 'max' in sliderParams ? sliderParams.max : sliderParamsDefault.max;
        sliderDecimals = 'decimals' in sliderParams ? sliderParams.decimals : sliderParamsDefault.decimals;

        let inputMin, inputMax, inputStep, inputDecimals, inputPostfix;
        let inputParamsDefault = {};

        switch (type) {
            case 'hours':
                inputParamsDefault = {
                    'min': 1,
                    'max': 24,
                    'step': 1,
                    'decimals': 0,
                    'postfix': 'ч.'
                };
                break;
            case 'v':
                inputParamsDefault = {
                    'min': 3,
                    'max': 12,
                    'step': 0.5,
                    'decimals': 1,
                    'postfix': 'В'
                };
                break;
            case 'a':
                inputParamsDefault = {
                    'min': 0.05,
                    'max': 0.9,
                    'step': 0.05,
                    'decimals': 2,
                    'postfix': 'А'
                };
                break;
            case 'minutes':
                inputParamsDefault = {
                    'min': 1,
                    'max': 300,
                    'step': 1,
                    'decimals': 0,
                    'postfix': 'мин.'
                };
                break;
            case 'seconds':
                inputParamsDefault = {
                    'min': 1,
                    'max': 20,
                    'step': 1,
                    'decimals': 0,
                    'postfix': 'сек.'
                };
                break;
        }

        inputMin = 'min' in inputParams ? inputParams.min : inputParamsDefault.min;
        inputMax = 'max' in inputParams ? inputParams.max : inputParamsDefault.max;
        inputStep = 'step' in inputParams ? inputParams.step : inputParamsDefault.step;
        inputDecimals = 'decimals' in inputParams ? inputParams.decimals : inputParamsDefault.decimals;
        inputPostfix = 'postfix' in inputParams ? inputParams.postfix : inputParamsDefault.postfix;

        noUiSlider.create($slider, {
            start: [sliderStart],
            step: sliderStep,
            range: {
                'min': [sliderMin],
                'max': [sliderMax]
            },
            format: wNumb({
                decimals: sliderDecimals
            })
        })
            .on('update', function (values, handle) {
                $input.val(values[handle]);
            });

        $input.TouchSpin({
            min: inputMin,
            max: inputMax,
            step: inputStep,
            decimals: inputDecimals,
            postfix: inputPostfix
        })
            .change(function () {
                $slider.noUiSlider.set(this.value);
            });

    }


    function initDelay() {
        initSliderInput('delayHours', 'hours');

        const $trigger = $('#delayTrigger');
        const $div = $('#delayHoursDiv');

        $trigger.change(function () {
            if (this.checked)
                $div.removeClass('d-none');
            else
                $div.addClass('d-none');
        });
    }

    function initPre() {
        initSliderInput('preParamV', 'v');
        initSliderInput('preParamT', 'minutes');
        initSliderInput('preCurMax', 'a');
        initSliderInput('preDurImp', 'seconds');
        initSliderInput('prePauseImp', 'seconds');
        initSliderInput('preConstCur', 'a', {'max': 0.7}, {'max': 0.7});


        $('#preTrigger').change(function () {
            if (this.checked)
                $('#preParamDiv').removeClass('d-none');
            else
                $('#preParamDiv').addClass('d-none');
        });

        $('#preType').change(function () {
            if (this.checked) {
                $('#preTypeSpan').text('времени');
                $('#preParamV').addClass('d-none');
                $('#preParamT').removeClass('d-none');
            }
            else {
                $('#preTypeSpan').text('напряжению');
                $('#preParamT').addClass('d-none');
                $('#preParamV').removeClass('d-none');
            }
        });

        $('#preCurType').change(function () {
            if (this.checked) {
                $('#preCurTypeSpan').text('постоянный');
                $('#preParamImp').addClass('d-none');
                $('#preParamImp2').addClass('d-none');
                $('#preParamConst').removeClass('d-none');
            }
            else {
                $('#preCurTypeSpan').text('импульсный');
                $('#preParamConst').addClass('d-none');
                $('#preParamImp').removeClass('d-none');
                $('#preParamImp2').removeClass('d-none');
            }
        });


    }

    initDelay();
    initPre();

</script>
