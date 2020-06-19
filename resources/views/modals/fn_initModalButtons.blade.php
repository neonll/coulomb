<script>
    // Действие на кнопку "Удалить профиль"
    function initDeleteProfile(type) {
        let lc, uc;

        lc = type;

        switch (type) {
            case 'charge':
                uc = 'Charge';
                break;
            case 'service':
                uc = 'Service';
                break;
        }

        $(`#modal${uc}DeleteProfile`).click(function () {
            Swal.fire({
                title: 'Подтвердите удаление',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Удалить',
                cancelButtonText: 'Отмена'
            }).then((result) => {
                if (result.value) {
                    $.post('/profiles/deleteProfile', {
                        'profile_id': Profile[lc].id,
                        '_token': '{{ csrf_token() }}',
                        '_method': 'DELETE'
                    }, function (result) {
                        console.log(result);
                        getProfiles(lc);
                        $(`#modal${uc}SelectProfile`).val('0').trigger('change');

                        Swal.fire(
                            'Профиль удален!',
                            '',
                            'success'
                        )
                    })
                }
            })
        })

    }

    // Действие на кнопку "Запуск"
    function initModalFormSubmit(type) {
        let lc, uc;

        lc = type;

        switch (type) {
            case 'charge':
                $('#modalChargeFormSubmit').click(function () {
                    let data = chargeData();

                    console.log(data);
                })
                break;
            case 'service':
                $('#modalServiceFormSubmit').click(function () {
                    let data = serviceData();

                    console.log(data);
                })
                break;
        }

    }

    // Сохранение формы
    function modalFormSave(type, data) {
        $.post('/profiles/saveProfile', data, function (result) {
            console.log(result);
            getProfiles(type);
        })
    }

    // Действие на кнопку "Сохранить"
    function initModalFormSave(type) {
        let lc, uc;

        lc = type;

        switch (type) {
            case 'charge':
                uc = 'Charge';
                break;
            case 'service':
                uc = 'Service';
                break;
        }

        $(`#modal${uc}Save`).click(function () {

            let data = {};
            $(`#form${uc}Form`).find('input').each(function () {
                data[$(this).prop('id')] = $(this)[0].type !== 'checkbox' ? $(this).val() : $(this)[0].checked;
            })

            data.ah = Profile[lc].ah;

            data.type = lc;
            data._token = '{{ csrf_token() }}';

            if (Profile[lc].id != 0) {
                data.profile_id = Profile[lc].id;

                modalFormSave(lc, data);
            } else {
                (async () => {

                    const {value: title} = await Swal.fire({
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

                        modalFormSave(lc, data);
                    }
                })()
            }
        })
    }
</script>
