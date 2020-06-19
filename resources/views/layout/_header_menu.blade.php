<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Кулон-912</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
            aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarHeader">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <div class="row ml-0 mt-2 mr-2">
                    <div class="ml-0 text-warning font-weight-bolder"><span id="span_status"></span></div>
                    <div class="ml-2 text-success font-weight-bolder"><span id="span_v">--.--</span> В</div>
                    <div class="ml-2 text-danger font-weight-bolder"><span id="span_a">--.--</span> А</div>
                    <div class="ml-2 text-primary font-weight-bolder"><span id="span_ah">--.--</span> Ач</div>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('sessions.index') }}">Сессии</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#modalChargeForm">Заряд</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#modalServiceForm">Сервис</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#modalPreferences">Настройки</a>
            </li>

{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                   aria-expanded="false">Dropdown</a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="dropdown01">--}}
{{--                    <a class="dropdown-item" href="#">Action</a>--}}
{{--                    <a class="dropdown-item" href="#">Another action</a>--}}
{{--                    <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                </div>--}}
{{--            </li>--}}
        </ul>
        {{--        <form class="form-inline my-2 my-lg-0">--}}
        {{--            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
        {{--            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>--}}
        {{--        </form>--}}
    </div>
</nav>
