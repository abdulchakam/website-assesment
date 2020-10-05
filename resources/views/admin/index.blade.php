<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('template/assets/images/favicon.png') }}">
    <title>Dinas Komunikasi dan Informatika</title>
    <!-- Custom CSS -->
    <link href="{{ asset('template/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('template/dist/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('template/dist/css/select2.min.css') }}" rel="stylesheet">
    <!-- SweetAlert -->

</head>

<body>
    {{-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> --}}
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin6">
            {{-- Navbar --}}
                @include('admin.components.navbar')
            {{-- End Navbar --}}
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            {{-- Sidebar --}}
                @include('admin.components.sidebar')
            {{-- End Sidebar --}}
        </aside>

        <div class="page-wrapper">

            {{-- Breadcrumb --}}
                @include('admin.components.breadcrumb')
            {{-- End Breadcrumb --}}

            <div class="container-fluid">
                @yield('content')
            </div>

            {{-- Footer --}}
                @include('admin.components.footer')
            {{-- End Footer --}}
        </div>
    </div>
    <script src="{{ asset('template/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('template/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('template/dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('template/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('template/dist/js/custom.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('template/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('template/assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('template/dist/js/pages/dashboards/dashboard1.js') }}"></script>
    <script src="{{ asset('template/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>

    {{-- ckeditor --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('template/dist/js/select2.full.min.js') }}"></script>

    {{-- Sweetalert --}}
    <script src="{{ asset('template/dist/js/sweetalert2.all.min.js') }}"></script>


    <script>
        // CKEditor
        $(document).ready(function () {
            CKEDITOR.replace('petunjuk');
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.select-user').select2({
                placeholder: "Pilih User"
            });
        });
    </script>

    @include('sweetalert::alert',['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>

</html>