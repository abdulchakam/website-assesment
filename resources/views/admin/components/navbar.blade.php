<nav class="navbar top-navbar navbar-expand-md">
    @if (empty(Auth::user()->name))
        {{ route('login') }}
    @endif
    <div class="navbar-header" data-logobg="skin6">
        <!-- This is for the sidebar toggle which is visible on mobile only -->
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="ti-menu ti-close"></i>
        </a>

        <div class="navbar-brand d-flex justify-content-center">
            <!-- Logo icon -->
            <a href="{{ url('/dashboard') }}">
                <b class="logo-icon">
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('img/logo-default.png') }}" width="50" alt="homepage" class="dark-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <strong class="text-brand font-weight-bold text-uppercase text-center">Administrator</strong>
                </span>
            </a>
        </div>


        <!-- ============================================================== -->
        <!-- Toggle which is visible on mobile only -->
        <!-- ============================================================== -->
        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="#"
            data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti-more"></i>
        </a>
    </div>

    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    @if (empty(Auth::user()->avatar))
                        <img src="{{ asset('/img/avatar/default-avatar.png') }}" width="30" class="rounded-circle">
                    @else
                        <img src="{{ asset('/img/avatar/'.Auth::user()->avatar) }}" width="30" class="rounded-circle">
                    @endif
                    <span class="ml-2 d-none d-lg-inline-block">
                        <span class="text-dark-blue text-capitalize"> {{ Auth::user()->name }}</span>
                        <i data-feather="chevron-down" class="svg-icon text-gradient"></i>
                    </span>
                    <span class="ml-2 d-block d-md-none">
                        <span class="text-dark-blue text-capitalize"> {{ Auth::user()->name }}</span>
                        <i data-feather="chevron-down" class="svg-icon text-gradient"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="logout">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <div class="text-danger">
                            <i data-feather="log-out" class="feather-icon text-danger font-weight-bold"></i>
                            Keluar
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
