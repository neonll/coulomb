@include('modals.fn_initSliderInput')
@include('modals.fn_initTrigger')

<script>
    let ah = 70;

    Number.prototype.countDecimals = function () {
        if(Math.floor(this.valueOf()) === this.valueOf()) return 0;
        return this.toString().split(".")[1].length || 0;
    }

    function pround(n, p) {
        // return (Math.round(n / p) * p).toFixed(p.countDecimals());
        return (Math.round(n / p) * p);
    }

    function initDelay() {
        initSliderInput('delayHours', 'hours');

        initTrigger('delayTrigger', 'delayHoursDiv');
    }

    function initPre() {
        initSliderInput('preParamV', 'v');
        initSliderInput('preParamT', 'minutes');
        initSliderInput('preCurMax', 'a', {'max': pround(0.1 * ah, 0.05), 'start': pround(0.05 * ah, 0.05)}, {'max': pround(0.1 * ah, 0.05)}, true);
        initSliderInput('preDurImp', 'seconds');
        initSliderInput('prePauseImp', 'seconds');
        initSliderInput('preConstCur', 'a', {'max': pround(0.075 * ah, 0.05), 'start': pround(0.05 * ah, 0.05)}, {'max': pround(0.075 * ah, 0.05)}, true);

        initTrigger('preTrigger', 'preParamDiv');
        initTrigger('preType', 'preParamT', 'preParamV', 'времени', 'напряжению');
        initTrigger('preCurType', 'preParamConst', ['preParamImp', 'preParamImp2'], 'постоянный', 'импульсный');

    }

    function initCharge() {
        initSliderInput('chargeVMax', 'v', {
            'min': 12,
            'max': 16.5,
            'start': 14.8,
            'step': 0.05,
            'decimals': 2
        }, {'min': 12, 'max': 16.5, 'step': 0.05, 'decimals': 2});
        initSliderInput('chargeVPivot', 'v', {
            'min': 13.4,
            'max': 14.7,
            'start': 14.2,
            'step': 0.05,
            'decimals': 2
        }, {'min': 13.4, 'max': 14.7, 'step': 0.05, 'decimals': 2});
        initSliderInput('chargeAMax', 'a', {
            'min': 0.1,
            'max': pround(0.2 * ah, 0.05),
            'start': pround(0.1 * ah, 0.05),
            'step': 0.05,
            'decimals': 2
        }, {'min': 0.1, 'max': pround(0.2 * ah, 0.05), 'step': 0.05, 'decimals': 2}, true);

        initSliderInput('asymADischarge', 'a', {
            'min': 0.05,
            'max': pround(0.03 * ah, 0.05),
            'start': pround(0.01 * ah, 0.05),
            'step': 0.05,
            'decimals': 2
        }, {'min': 0.05, 'max': pround(0.03 * ah, 0.05), 'step': 0.05, 'decimals': 2}, true);
        initSliderInput('asymDur', 'seconds', {'min': 5, 'max': 25, 'start': 5}, {'min': 5, 'max': 25});
        initSliderInput('asymRatio', 'percent');

        initSliderInput('chargeEndParamA', 'a', {
            'min': 0.05,
            'max': pround(0.015 * ah, 0.05),
            'start': pround(0.01 * ah, 0.05),
            'step': 0.05,
            'decimals': 2
        }, {'min': 0.05, 'max': pround(0.015 * ah, 0.05), 'step': 0.05, 'decimals': 2}, true);
        initSliderInput('chargeEndParamATime', 'hours', {'start': 16, 'max': 48}, {'max': 48})

        initSliderInput('chargeEndParamVTime', 'hours', {'start': 2, 'min': 0, 'max': 6}, {'min': 0, 'max': 6})

        initTrigger('asymTrigger', 'asymParamDiv');
        initTrigger('chargeEndType', 'chargeEndParamV', ['chargeEndParamA', 'chargeEndParamA2'], 'напряжению', 'току');
    }

    function initExtra() {
        initSliderInput('extraChargeA', 'a', {'min': 0.05, 'max': pround(0.12 * ah, 0.05), 'start': pround(0.033 * ah, 0.05)}, {'min': 0.05, 'max': pround(0.12 * ah, 0.05)}, true);
        initSliderInput('extraChargePeriod', 'seconds', {'start': 20, 'max': 300}, {'max': 300});
        initSliderInput('extraChargeT', 'hours', {'start': 5, 'max': 240}, {'max': 240})

        const $inputV = [$('#extraChargeV0Input'), $('#extraChargeV1Input')];
        const $sliderV = $('#extraChargeVSlider')[0];

        if (typeof $sliderV.noUiSlider === 'undefined') {
            noUiSlider.create($sliderV, {
                start: [13.2, 14.5],
                step: 0.05,
                range: {
                    'min': [12],
                    'max': [16.5]
                },
                format: wNumb({
                    decimals: 2
                })
            })
                .on('update', function (values, handle) {
                    $inputV[handle].val(values[handle]);
                });
        }

        $.each($inputV, function (index, val) {
            val.TouchSpin({
                min: 12,
                max: 16.5,
                step: 0.05,
                decimals: 2,
                postfix: 'В'
            })
                .change(function () {
                    $sliderV.noUiSlider.setHandle(index, this.value, true);
                });
        })

        initTrigger('extraChargeTrigger', 'extraChargeParamDiv');

    }

    function initPostCharge() {
        initSliderInput('postChargeStoreV', 'v', {
            'start': 13.6,
            'min': 12.4,
            'max': 14.8,
            'step': 0.05,
            'decimals': 2
        }, {'min': 12.4, 'max': 14.8, 'step': 0.05, 'decimals': 2});
        initSliderInput('postChargeStoreA', 'a', {'max': pround(0.01 * ah, 0.05), 'start': pround(0.007 * ah, 0.05)}, {'max': pround(0.01 * ah, 0.05)}, true);
        initSliderInput('postChargeRechargeV', 'v', {
            'start': 12.4,
            'min': 11.9,
            'max': 12.6,
            'step': 0.05,
            'decimals': 2
        }, {'min': 11.9, 'max': 12.6, 'step': 0.05, 'decimals': 2});

        initTrigger('postChargeTrigger', 'postChargeParamDiv');
        initTrigger('postChargeType', 'postChargeParamRecharge', 'postChargeParamStore', 'Повторный заряд', 'Поддержание заряда');

    }

    function initMisc() {
        initDelay();
        initPre();
        initPostCharge();
    }

    function initChargeForm() {
        ah = chargeProfileAh;

        initCharge();
        initExtra();
        initMisc();
    }


</script>
