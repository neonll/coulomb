@extends('layout.app')

@section('title')
    Сессии
@endsection

@section('title-buttons')
    <a href="{{ route('sessions.create') }}" class="btn btn-sm btn-outline-secondary">Создать</a>
@endsection


@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Название</th>
                <th>Комментарий</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sessions as $session)
            <tr>
                <td>{{ $session->title }}</td>
                <td>{{ $session->comment }}</td>
                <td>
                    <a href="{{ route('sessions.edit', $session->id) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                    &nbsp;
                    <a href="javascript:;" class="btn btn-sm btn-outline-danger button_delete" data-session_id="{{ $session->id }}"><i class="fa fa-trash"></i></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection

@section('page-scripts')
    <script>
        $('.button_delete').click(function () {
            var session_id = $(this).data('session_id');
            Swal.fire({
                title: "Подтвердите удаление",
                text: "При удалении все данные, относящиеся к данной сессии, будут также удалены!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Удалить!",
                cancelButtonText: "Отмена",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.post('/sessions/'+session_id, { '_method': 'DELETE', '_token': '{{ csrf_token() }}' })
                        .done(function (result) {
                            console.log(result);
                            location.reload();
                        });
                }
            });
        })
    </script>
@endsection
