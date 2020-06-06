<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
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
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Кулон-912</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
{{--        <form class="form-inline my-2 my-lg-0">--}}
{{--            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
{{--            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>--}}
{{--        </form>--}}
    </div>
</nav>

<main role="main" class="col-md-11 ml-sm-auto col-lg-12 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@yield('title')</h1>
        @hasSection('title-buttons')
        <div class="btn-toolbar mb-2 mb-md-0">
            @yield('title-buttons')
{{--            <div class="btn-group mr-2">--}}
{{--                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>--}}
{{--                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>--}}
{{--            </div>--}}
{{--            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">--}}
{{--                <span data-feather="calendar"></span>--}}
{{--                This week--}}
{{--            </button>--}}
        </div>
        @endif
    </div>

    @yield('content')


</main><!-- /.container -->
<script src="{{ asset('js/app.js') }}"></script>

{{-- Flash message --}}
@if (Session::has('flash'))
    <script>
        flashData = ['{{ Session::get('flash')[0] }}', '{{ Session::get('flash')[1] }}'];

        var Flash = {
            'state' : flashData[0],
            'message' : flashData[1],
            'delay' : (flashData[0] === 'danger') ? 0 : 2000
        };

        $.notify(
            {
                message: Flash.message,
            },{
                type: Flash.state,
                delay: Flash.delay,
            }
        );
    </script>
@endif

@yield('page-scripts')
