@include('modals.fn_initSliderInput')
@include('modals.fn_initTrigger')
@include('modals.fn_val')
@include('modals.fn_chargeData')

<script>
    $.fn.modal.Constructor.prototype._enforceFocus = function() {};

    $('#modalChargeForm').modal('show');

    function initDelay() {
        initSliderInput('delayHours', 'hours');

        initTrigger('delayTrigger', 'delayHoursDiv');
    }

    function initPre() {
        initSliderInput('preParamV', 'v');
        initSliderInput('preParamT', 'minutes');
        initSliderInput('preCurMax', 'a');
        initSliderInput('preDurImp', 'seconds');
        initSliderInput('prePauseImp', 'seconds');
        initSliderInput('preConstCur', 'a', {'max': 0.7}, {'max': 0.7});

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
            'max': 1.8,
            'start': 0.9,
            'step': 0.05,
            'decimals': 2
        }, {'min': 0.1, 'max': 1.8, 'step': 0.05, 'decimals': 2});

        initSliderInput('asymADischarge', 'a', {
            'min': 0.05,
            'max': 0.7,
            'start': 0.1,
            'step': 0.05,
            'decimals': 2
        }, {'min': 0.05, 'max': 0.7, 'step': 0.05, 'decimals': 2});
        initSliderInput('asymDur', 'seconds', {'min': 5, 'max': 25, 'start': 5}, {'min': 5, 'max': 25});
        initSliderInput('asymRatio', 'percent');

        initSliderInput('chargeEndParamA', 'a', {
            'min': 0.05,
            'max': 0.2,
            'start': 0.1,
            'step': 0.05,
            'decimals': 2
        }, {'min': 0.05, 'max': 0.2, 'step': 0.05, 'decimals': 2});
        initSliderInput('chargeEndParamATime', 'hours', {'start': 16, 'max': 48}, {'max': 48})

        initSliderInput('chargeEndParamVTime', 'hours', {'start': 2, 'min': 0, 'max': 6}, {'min': 0, 'max': 6})

        initTrigger('asymTrigger', 'asymParamDiv');
        initTrigger('chargeEndType', 'chargeEndParamV', ['chargeEndParamA', 'chargeEndParamA2'], 'напряжению', 'току');
    }

    function initExtra() {
        initSliderInput('extraChargeA', 'a', {'min': 0.05, 'max': 1.8, 'start': 0.3}, {'min': 0.05, 'max': 1.8});
        initSliderInput('extraChargePeriod', 'seconds', {'start': 20, 'max': 300}, {'max': 300});
        initSliderInput('extraChargeT', 'hours', {'start': 5, 'max': 240}, {'max': 240})

        const $inputV = [$('#extraChargeV0Input'), $('#extraChargeV1Input')];
        const $sliderV = $('#extraChargeVSlider')[0];

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
        initSliderInput('postChargeStoreA', 'a', {'max': 0.2, 'start': 0.1}, {'max': 0.2});
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

    initCharge();
    initExtra();
    initMisc();

    const $chargeSelectProfile = $('#modalChargeSelectProfile')
        .change(function () {
            let profile_id = $(this).val();

            if (profile_id !== '0') {
                $.get('/profiles/getProfile/' + profile_id, function (data) {
                    console.log(data);
                    $.each(data.data, function (id, val) {
                        if ($('#' + id)[0].type !== 'checkbox')
                            $('#' + id).val(val).trigger('change');
                        else
                            $('#' + id).prop('checked', val === 'true').trigger('change')
                    })
                })
            }
        })

    function getChargeProfiles() {

        let options = '<option value="0">Профиль</option>';

        $.get('/profiles/getProfilesList/charge', function (data) {
            $.each(data, function (id, title) {
                options += `<option value="${id}">${title}</option>`;
            })

            $chargeSelectProfile.html(options);
        })
    }

    getChargeProfiles();



    $('#modalChargeFormSubmit').click(function () {
        let data = chargeData();

        console.log(data);
    })

    $('#modalChargeSave').click(function () {

        let data = {};
        $('#formChargeForm').find('input').each(function () {
            data[$(this).prop('id')] = $(this)[0].type !== 'checkbox' ? $(this).val() : $(this)[0].checked;
        })

        data.type = 'charge';
        data._token = '{{ csrf_token() }}';

        (async () => {

            const { value: title } = await Swal.fire({
                title: 'Введите название',

                input: 'text',
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'Необходимо ввести название профиля!'
                    }
                },
                keydownListenerCapture: true,
                focusConfirm: false
            })

            if (title) {
                data.title = title;
                // console.log(data);

                $.post('/profiles/saveProfile', data, function (result) {
                    console.log(result);
                })
            }

        })()

    })

</script>
