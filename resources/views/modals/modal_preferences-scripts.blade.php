<script>
    $('#modalPreferencesSubmit').click(function () {
        let data = {
            'ip': $('#prefIp').val(),
            '_token': '{{ csrf_token() }}'
        };

        $.post('/preferences/save', data, function (result) {
            console.log(result);
            if (result === 'success')
                $('#modalPreferences').modal('hide');
            else
                Swal.fire(
                    'Не удалось сохранить!',
                    'Попробуйте еще раз',
                    'error'
                )
        })
    })

</script>
