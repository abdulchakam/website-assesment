<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dinas Komunikasi dan Informatika Provinsi Jawa Tengah</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('template/dist/css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/avatar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iziToast.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    @stack('style')
</head>
<body>
    <div id="app">


        <main class="pt-5">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('template/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap-fileinput/js/fileinput.js') }}" ></script>
    <script src="{{ asset('bootstrap-fileinput/js/locales/id.js') }}" ></script>
    <script src="{{ asset('bootstrap-fileinput/themes/fas/theme.min.js') }}" ></script>
    <script src="{{ asset('js/iziToast.min.js') }}" ></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}" ></script>
    {{-- Jquery Validate --}}
    <script src="{{ asset('js/jquery.validate.min.js') }}" ></script>
    {{-- Ckeditor --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

    <script src="{{ asset('template/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>

    @stack('script')
</body>
</html>
