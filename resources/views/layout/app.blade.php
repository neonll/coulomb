<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Панель управления Кулон-912">
    <meta name="author" content="https://github.com/neonll">
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
@include('layout._header_menu')

<main role="main" class="col-md-11 ml-sm-auto col-lg-12 px-md-4">

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@yield('title')</h1>
        @hasSection('title-buttons')
            <div class="btn-toolbar mb-2 mb-md-0">
                @yield('title-buttons')
            </div>
        @endif
    </div>

    @yield('content')


</main><!-- /.container -->

@include('modals.modal_charge_form')
{{--@include('modals.modal_service_form')--}}
@include('modals.modal_preferences')

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

<script>
    let State = 0;

    function checkState() {
        $.get("/sessions/getCurrentState", function (data) {
            const session = data.session;
            const point = data.state ? data.state : null;

            if (session.id != 0) {
                $('.button_start').attr('disabled', 'disabled');
                $('.button_stop').removeAttr('disabled');
                $('#span_state').html('запущена (<a href="{{ route('sessions.index') }}/' + session.id + '">' + session.title + '</a>)');
                State = 1;
            } else {
                $('.button_stop').attr('disabled', 'disabled');
                $('.button_start').removeAttr('disabled');
                $('#span_state').text('остановлена');
                State = 0;
            }

            if (point) {
                if (moment().diff(moment(point.datetime), 'seconds') < 30) {
                    $('#span_v').text(point.v);
                    $('#span_a').text(point.a);
                    $('#span_ah').text(point.ah);
                    $('#span_status').text(point.status);
                }
                else {
                    $.get('/coulomb/getData', function (data) {
                        $('#span_v').text(data.v);
                        $('#span_a').text(data.a);
                        $('#span_ah').text(data.ah);
                        $('#span_status').text(data.status);
                    })
                }
            }
            else {
                $.get('/coulomb/getData', function (data) {
                    $('#span_v').text(data.v);
                    $('#span_a').text(data.a);
                    $('#span_ah').text(data.ah);
                    $('#span_status').text(data.status);
                })
            }

        });
    }

    checkState();

    window.setInterval(function () {
        checkState();
    }, 5000);
</script>

<script>
    // Устранение конфликта между modal и swal
    $.fn.modal.Constructor.prototype._enforceFocus = function() {};

    // Для отладки
    $('#modalChargeForm').modal('show');

    let Profile = {};
</script>

@include('modals.fn_initSelectProfile')
@include('modals.fn_getProfiles')

<script>
    function initAhInputProfile(type) {
        return $(`#${type}ProfileAHInput`)
            .change(function () {
                Profile[type].ah = $(this).val();
                initModalForm(type);
            })
    }

    function initAhSliderProfile(type) {
        initSliderInput(type + 'ProfileAH', 'ah', {'start': Profile[type].ah}, {}, true);

        $(`#${type}ProfileAHSlider`)[0].noUiSlider.on('change', function () {
            Profile[type].ahInput.trigger('change');
        })
    }

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
                    $.post('/profiles/deleteProfile', {'profile_id': Profile[lc].id, '_token': '{{ csrf_token() }}', '_method': 'DELETE'}, function (result) {
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
                uc = 'Service';
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

                        modalFormSave(lc, data);
                    }
                })()
            }
        })
    }
</script>

@include('modals.form_charge_form-scripts')
@include('modals.fn_chargeData')

<script>
    $.each(['charge'], function (i, type) {
        Profile[type] = {
            'id': 0,
            'select': initSelectProfile(type),
            'ah': 70,
            'ahInput': initAhInputProfile(type),
        };

        getProfiles(type);
        initAhSliderProfile(type);
        initModalForm(type);
        initDeleteProfile(type);
        initModalFormSubmit(type);
        initModalFormSave(type);
    })
</script>

@include('modals.modal_preferences-scripts')

@yield('page-scripts')

