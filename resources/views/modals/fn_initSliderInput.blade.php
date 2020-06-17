<script>
    function initSliderInput(controlId, type, sliderParams = {}, inputParams = {}, updateAllowed = false) {
        const $input = $('#' + controlId + 'Input');
        const $slider = $('#' + controlId + 'Slider')[0];

        if (typeof $slider.noUiSlider === 'undefined' || updateAllowed === true) {
            let sliderStart, sliderStep, sliderMin, sliderMax, sliderDecimals;
            let sliderParamsDefault = {};
            let sliderParamsLimits = {};

            switch (type) {
                case 'hours':
                    sliderParamsDefault = {
                        'start': 1,
                        'step': 1,
                        'min': 1,
                        'max': 24,
                        'decimals': 0
                    };
                    sliderParamsLimits = {
                        'min': 1,
                        'max': 48,
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
                    sliderParamsLimits = {
                        'min': 3,
                        'max': 16.5,
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
                    sliderParamsLimits = {
                        'min': 0.05,
                        'max': 12,
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
                    sliderParamsLimits = {
                        'min': 1,
                        'max': 300,
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
                    sliderParamsLimits = {
                        'min': 1,
                        'max': 3000,
                    };
                    break;
                case 'percent':
                    sliderParamsDefault = {
                        'start': 15,
                        'step': 5,
                        'min': 10,
                        'max': 50,
                        'decimals': 0
                    };
                    sliderParamsLimits = {
                        'min': 1,
                        'max': 100,
                    };
                    break;
                case 'ah':
                    sliderParamsDefault = {
                        'start': 70,
                        'step': 1,
                        'min': 1,
                        'max': 200,
                        'decimals': 0
                    };
                    sliderParamsLimits = {
                        'min': 1,
                        'max': 200,
                    };
                    break;
            }

            sliderStart = 'start' in sliderParams ? sliderParams.start : sliderParamsDefault.start;
            sliderStep = 'step' in sliderParams ? sliderParams.step : sliderParamsDefault.step;
            sliderMin = 'min' in sliderParams ? sliderParams.min : sliderParamsDefault.min;
            sliderMax = 'max' in sliderParams ? sliderParams.max : sliderParamsDefault.max;
            sliderDecimals = 'decimals' in sliderParams ? sliderParams.decimals : sliderParamsDefault.decimals;

            let sliderMinLimit = sliderParamsLimits.min;
            let sliderMaxLimit = sliderParamsLimits.max;

            if (sliderStart < sliderMinLimit) sliderStart = sliderMinLimit;
            if (sliderMax < sliderMinLimit) sliderMax = sliderMinLimit;

            let inputMin, inputMax, inputStep, inputDecimals, inputPostfix;
            let inputParamsDefault = {};
            let inputParamsLimits = {};

            switch (type) {
                case 'hours':
                    inputParamsDefault = {
                        'min': 1,
                        'max': 24,
                        'step': 1,
                        'decimals': 0,
                        'postfix': 'ч.'
                    };
                    inputParamsLimits = {
                        'min': 1,
                        'max': 48,
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
                    inputParamsLimits = {
                        'min': 3,
                        'max': 16.5,
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
                    inputParamsLimits = {
                        'min': 0.05,
                        'max': 12,
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
                    inputParamsLimits = {
                        'min': 1,
                        'max': 300,
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
                    inputParamsLimits = {
                        'min': 1,
                        'max': 3008,
                    };
                    break;
                case 'percent':
                    inputParamsDefault = {
                        'min': 10,
                        'max': 50,
                        'step': 5,
                        'decimals': 0,
                        'postfix': '%'
                    };
                    inputParamsLimits = {
                        'min': 1,
                        'max': 100,
                    };
                    break;
                case 'ah':
                    inputParamsDefault = {
                        'min': 1,
                        'max': 200,
                        'step': 1,
                        'decimals': 0,
                        'postfix': 'Ач'
                    };
                    inputParamsLimits = {
                        'min': 1,
                        'max': 200,
                    };
                    break;
            }

            inputMin = 'min' in inputParams ? inputParams.min : inputParamsDefault.min;
            inputMax = 'max' in inputParams ? inputParams.max : inputParamsDefault.max;
            inputStep = 'step' in inputParams ? inputParams.step : inputParamsDefault.step;
            inputDecimals = 'decimals' in inputParams ? inputParams.decimals : inputParamsDefault.decimals;
            inputPostfix = 'postfix' in inputParams ? inputParams.postfix : inputParamsDefault.postfix;

            let inputMinLimit = inputParamsLimits.min;
            let inputMaxLimit = inputParamsLimits.max;

            if (inputMax < inputMinLimit) inputMax = inputMinLimit;

            if (typeof $slider.noUiSlider === 'undefined') {
                noUiSlider.create($slider, {
                    start: [sliderStart],
                    step: sliderStep,
                    range: {
                        'min': [sliderMin > sliderMinLimit ? sliderMin : sliderMinLimit],
                        'max': [sliderMax < sliderMaxLimit ? sliderMax : sliderMaxLimit]
                    },
                    format: wNumb({
                        decimals: sliderDecimals
                    })
                })
                    .on('update', function (values, handle) {
                        $input.val(values[handle]);
                    });
            }
            else {
                $slider.noUiSlider.updateOptions({
                    range: {
                        'min': [sliderMin > sliderMinLimit ? sliderMin : sliderMinLimit],
                        'max': [sliderMax < sliderMaxLimit ? sliderMax : sliderMaxLimit]
                    },
                });

                $slider.noUiSlider.set(sliderStart);

            }

            $input.TouchSpin({
                min: inputMin > inputMinLimit ? inputMin : inputMinLimit,
                max: inputMax < inputMaxLimit ? inputMax : inputMaxLimit,
                step: inputStep,
                decimals: inputDecimals,
                postfix: inputPostfix
            })
                .change(function () {
                    $slider.noUiSlider.set(this.value);
                });
        }

    }
</script>
