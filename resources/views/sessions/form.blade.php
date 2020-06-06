<div class="col-md-8 order-md-1">
    @if ($action == 'edit')
        <form action="{{ route('sessions.update', $session->id) }}" method="POST" id="form_session">
            @method('PATCH')
            @else
                <form action="{{ route('sessions.store') }}" method="POST" id="form_session">
                    @endif
                    @csrf

                    <div class="form-group row">
                        <label>Название</label>
                        <input type="text" class="form-control" required name="title" @isset($session)value="{{ $session->title }}"@endisset>
                    </div>
                    <div class="form-group row">
                        <label>Комментарий</label>
                        <input type="text" class="form-control" name="comment" @isset($session)value="{{ $session->comment }}"@endisset>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Сохранить</button>
                    </div>

                </form>
</div>
