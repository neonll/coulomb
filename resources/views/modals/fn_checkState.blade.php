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
                } else {
                    $.get('/coulomb/getData', function (data) {
                        $('#span_v').text(data.v);
                        $('#span_a').text(data.a);
                        $('#span_ah').text(data.ah);
                        $('#span_status').text(data.status);
                    })
                }
            } else {
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
