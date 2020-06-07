@extends('layout.app')

@section('title')
    {{ $session->title }}
@endsection

@section('title-buttons')
    <button class="btn btn-sm btn-outline-success button_start"><i class="fa fa-play"></i></button>
    &nbsp;
    <button class="btn btn-sm btn-outline-danger button_stop"><i class="fa fa-stop"></i></button>
@endsection


@section('content')

@endsection

@section('page-scripts')
    <script>
        function checkState() {
            $.get("/sessions/checkFile", function( state ) {
                if (state == 1) {
                    $('.button_start').attr('disabled', 'disabled');
                    $('.button_stop').removeAttr('disabled');
                }
                else {
                    $('.button_stop').attr('disabled', 'disabled');
                    $('.button_start').removeAttr('disabled');
                }

            });
        }

        checkState();

        window.setInterval(function(){
            checkState();
        }, 5000);

        $('.button_start').click(function () {
            var session_id = {{ $session->id }};
            $.post('/sessions/putFile', { '_token': '{{ csrf_token() }}', 'session_id': session_id })
                .done(function (result) {
                    console.log(result);
                    checkState();
                });
        });

        $('.button_stop').click(function () {
            var session_id = {{ $session->id }};
            $.post('/sessions/deleteFile', { '_token': '{{ csrf_token() }}' })
                .done(function (result) {
                    console.log(result);
                    checkState();
                });
        });
    </script>
@endsection
