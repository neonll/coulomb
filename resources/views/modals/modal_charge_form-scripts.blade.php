@include('modals.form_charge_form-scripts')
@include('modals.fn_chargeData')

<script>
    // Устранение конфликта между modal и swal
    $.fn.modal.Constructor.prototype._enforceFocus = function() {};

    // Для отладки
    $('#modalChargeForm').modal('show');

    let profile_id = 0;

    // Инициализация и действия при выборе профиля в заголовке
    const $chargeSelectProfile = $('#modalChargeSelectProfile')
        .change(function () {
            profile_id = $(this).val();

            if (profile_id != 0) {
                $('#modalChargeProfileParams').addClass('d-none');

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
            else {
                $('#modalChargeProfileParams').removeClass('d-none');
            }
        })

    // Загрузка и отображение существующих профилей
    function getChargeProfiles() {

        let options = '<option value="0">Новый профиль</option>';

        $.get('/profiles/getProfilesList/charge', function (data) {
            $.each(data, function (id, title) {
                options += `<option value="${id}">${title}</option>`;
            })

            $chargeSelectProfile.html(options);
        })
    }

    getChargeProfiles();

    let chargeProfileAh = 70;

    initSliderInput('chargeProfileAH', 'ah', {'start': chargeProfileAh});

    const $chargeProfileAHInput = $('#chargeProfileAHInput')
        .change(function () {
            chargeProfileAh = $(this).val();
            // console.log(val);
            initChargeForm();

        })

    $('#chargeProfileAHSlider')[0].noUiSlider.on('change', function () {
        $chargeProfileAHInput.trigger('change');
    })

    initChargeForm();


    // Действие на кнопку "Запуск"
    $('#modalChargeFormSubmit').click(function () {
        let data = chargeData();

        console.log(data);
    })

    // Сохранение формы
    function chargeSave(data) {
        $.post('/profiles/saveProfile', data, function (result) {
            console.log(result);
        })
    }

    // Действие на кнопку "Сохранить"
    $('#modalChargeSave').click(function () {

        let data = {};
        $('#formChargeForm').find('input').each(function () {
            data[$(this).prop('id')] = $(this)[0].type !== 'checkbox' ? $(this).val() : $(this)[0].checked;
        })

        data.type = 'charge';
        data._token = '{{ csrf_token() }}';

        if (profile_id != 0) {
            data.profile_id = profile_id;

            chargeSave(data);
        }
        else {
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

                    chargeSave(data);
                }
            })()
        }
    })

</script>
