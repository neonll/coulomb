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

    function initPre(pre = '') {
        initSliderInput(pre + 'preParamV', 'v');
        initSliderInput(pre + 'preParamT', 'minutes');
        initSliderInput(pre + 'preCurMax', 'a', {'max': pround(0.1 * ah, 0.05), 'start': pround(0.05 * ah, 0.05)}, {'max': pround(0.1 * ah, 0.05)}, true);
        initSliderInput(pre + 'preDurImp', 'seconds');
        initSliderInput(pre + 'prePauseImp', 'seconds');
        initSliderInput(pre + 'preConstCur', 'a', {'max': pround(0.075 * ah, 0.05), 'start': pround(0.05 * ah, 0.05)}, {'max': pround(0.075 * ah, 0.05)}, true);

        initTrigger(pre + 'preTrigger', pre + 'preParamDiv');
        initTrigger(pre + 'preType', pre + 'preParamT', pre + 'preParamV', 'времени', 'напряжению');
        initTrigger(pre + 'preCurType', pre + 'preParamConst', [pre + 'preParamImp', pre + 'preParamImp2'], 'постоянный', 'импульсный');

    }

    function initCharge(pre = '') {
        initSliderInput(pre + 'chargeVMax', 'v', {
            'min': 12,
            'max': 16.5,
            'start': 14.8,
            'step': 0.05,
            'decimals': 2
        }, {'min': 12, 'max': 16.5, 'step': 0.05, 'decimals': 2});
        initSliderInput(pre + 'chargeVPivot', 'v', {
            'min': 13.4,
            'max': 14.7,
            'start': 14.2,
            'step': 0.05,
            'decimals': 2
        }, {'min': 13.4, 'max': 14.7, 'step': 0.05, 'decimals': 2});
        initSliderInput(pre + 'chargeAMax', 'a', {
            'min': 0.1,
            'max': pround(0.2 * ah, 0.05),
            'start': pround(0.1 * ah, 0.05),
            'step': 0.05,
            'decimals': 2
        }, {'min': 0.1, 'max': pround(0.2 * ah, 0.05), 'step': 0.05, 'decimals': 2}, true);

        initSliderInput(pre + 'asymADischarge', 'a', {
            'min': 0.05,
            'max': pround(0.03 * ah, 0.05),
            'start': pround(0.01 * ah, 0.05),
            'step': 0.05,
            'decimals': 2
        }, {'min': 0.05, 'max': pround(0.03 * ah, 0.05), 'step': 0.05, 'decimals': 2}, true);
        initSliderInput(pre + 'asymDur', 'seconds', {'min': 5, 'max': 25, 'start': 5}, {'min': 5, 'max': 25});
        initSliderInput(pre + 'asymRatio', 'percent');

        initSliderInput(pre + 'chargeEndParamA', 'a', {
            'min': 0.05,
            'max': pround(0.015 * ah, 0.05),
            'start': pround(0.01 * ah, 0.05),
            'step': 0.05,
            'decimals': 2
        }, {'min': 0.05, 'max': pround(0.015 * ah, 0.05), 'step': 0.05, 'decimals': 2}, true);
        initSliderInput(pre + 'chargeEndParamATime', 'hours', {'start': 16, 'max': 48}, {'max': 48})

        initSliderInput(pre + 'chargeEndParamVTime', 'hours', {'start': 2, 'min': 0, 'max': 6}, {'min': 0, 'max': 6})

        initTrigger(pre + 'asymTrigger', pre + 'asymParamDiv');
        initTrigger(pre + 'chargeEndType', pre + 'chargeEndParamV', [pre + 'chargeEndParamA', pre + 'chargeEndParamA2'], 'напряжению', 'току');
    }

    function initExtra(pre = '') {
        initSliderInput(pre + 'extraChargeA', 'a', {'min': 0.05, 'max': pround(0.12 * ah, 0.05), 'start': pround(0.033 * ah, 0.05)}, {'min': 0.05, 'max': pround(0.12 * ah, 0.05)}, true);
        initSliderInput(pre + 'extraChargePeriod', 'seconds', {'start': 20, 'max': 300}, {'max': 300});
        initSliderInput(pre + 'extraChargeT', 'hours', {'start': 5, 'max': 240}, {'max': 240})

        const $inputV = [$(`#${pre}extraChargeV0Input`), $(`#${pre}extraChargeV1Input`)];
        const $sliderV = $(`#${pre}extraChargeVSlider`)[0];

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

        initTrigger(pre + 'extraChargeTrigger', pre + 'extraChargeParamDiv');

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

    function initDischarge() {
        initSliderInput('dischargeV', 'v', {
            'min': 7.3,
            'max': 13,
            'start': 10.7,
            'step': 0.05,
            'decimals': 2
        }, {'min': 7.3, 'max': 13, 'step': 0.05, 'decimals': 2});

        initSliderInput('dischargeA', 'a', {
            'min': 0.05,
            'max': pround(0.33 * ah, 0.05),
            'start': pround(0.05 * ah, 0.05),
            'step': 0.05,
            'decimals': 2
        }, {'min': 0.05, 'max': pround(0.33 * ah, 0.05), 'step': 0.05, 'decimals': 2}, true);

        initSliderInput('dischargePause', 'hours', {
            'min': 0,
            'max': 5,
            'start': 1,
            'step': 0.5,
            'decimals': 1
        }, {'min': 0, 'max': 5, 'step': 0.5, 'decimals': 1});

    }

    function initDischargeExtra() {
        initSliderInput('dischargeExtraV', 'v', {
            'min': 0.05,
            'max': 1,
            'start': 0.3,
            'step': 0.05,
            'decimals': 2
        }, {'min': 0.05, 'max': 1, 'step': 0.05, 'decimals': 2});
        initSliderInput('dischargeExtraA', 'a', {
            'min': 0.05,
            'max': pround(0.1 * ah, 0.05),
            'start': pround(0.02 * ah, 0.05),
            'step': 0.05,
            'decimals': 2
        }, {'min': 0.05, 'max': pround(0.1 * ah, 0.05), 'step': 0.05, 'decimals': 2}, true);
        initSliderInput('dischargeExtraPause', 'seconds', {
            'max': 300,
            'start': 10,
        }, {'max': 300});
        initSliderInput('dischargeExtraHours', 'hours', {
            'min': 0.5,
            'max': 5,
            'start': 0.5,
            'step': 0.5,
            'decimals': 1
        }, {'min': 0.5, 'max': 5, 'step': 0.5, 'decimals': 1});

        initTrigger('dischargeExtraTrigger', 'dischargeExtraParamDiv');

    }

    function initServiceCharge() {

        initTrigger('serviceChargeTrigger', 'serviceChargeParamDiv');

        initPre('service');
        initCharge('service');
        initExtra('service');

        initSliderInput('cyclesCount', 'count');

    }

    function initModalForm(type) {
        switch (type) {
            case 'charge':
                ah = Profile.charge.ah;
                initCharge();
                initExtra();
                initMisc();
                break;
            case 'service':
                ah = Profile.service.ah;
                initDischarge();
                initDischargeExtra();
                initServiceCharge();
                break;
        }
    }


</script>
