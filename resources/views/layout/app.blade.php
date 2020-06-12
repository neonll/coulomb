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

@include('modals.modal_charge_form');

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

@include('modals.modal_charge_form-scripts')

@yield('page-scripts')

