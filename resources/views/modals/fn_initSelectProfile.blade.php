<script>
    // Инициализация и действия при выборе профиля в заголовке
    function initSelectProfile(type) {
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

        return $(`#modal${uc}SelectProfile`)
            .change(function () {
                Profile[lc].id = $(this).val();

                if (Profile[lc].id != 0) {
                    $(`#modal${uc}ProfileParams`).addClass('d-none');
                    $(`#modal${uc}DeleteProfile`).removeClass('d-none');

                    $.get('/profiles/getProfile/' + Profile[lc].id, function (data) {
                        console.log(data);
                        Profile[lc].ah = data.ah;
                        initModalForm(lc);

                        $.each(data.data, function (id, val) {
                            if ($('#' + id)[0].type !== 'checkbox')
                                $('#' + id).val(val).trigger('change');
                            else
                                $('#' + id).prop('checked', val === 'true').trigger('change')
                        })
                    })
                } else {
                    $(`#modal${uc}ProfileParams`).removeClass('d-none');
                    $(`#modal${uc}DeleteProfile`).addClass('d-none');
                }
            })
    }
</script>
