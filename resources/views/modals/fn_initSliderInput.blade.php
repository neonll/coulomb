<script>
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
            case 'percent':
                sliderParamsDefault = {
                    'start': 15,
                    'step': 5,
                    'min': 10,
                    'max': 50,
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
            case 'percent':
                inputParamsDefault = {
                    'min': 10,
                    'max': 50,
                    'step': 5,
                    'decimals': 0,
                    'postfix': '%'
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
</script>
