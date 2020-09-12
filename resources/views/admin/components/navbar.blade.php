<nav class="navbar top-navbar navbar-expand-md">
    <div class="navbar-header" data-logobg="skin6">
        <!-- This is for the sidebar toggle which is visible on mobile only -->
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="ti-menu ti-close"></i>
        </a>

        <div class="navbar-brand">
            <!-- Logo icon -->
            <a href="index.html">
                {{-- <b class="logo-icon">
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('template/assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{ asset('template/assets/images/logo-icon.png') }}" alt="homepage" class="light-logo" />
                </b> --}}
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <strong class="text-gradient font-weight-bold text-uppercase text-center">Administrator</strong>
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
                    <img src="{{ asset('template/assets/images/users/profile-pic.jpg') }}"
                        alt="user" class="rounded-circle" width="30">
                    <span class="ml-2 d-none d-lg-inline-block">
                        <span class="text-dark-blue text-capitalize"> {{ Auth::user()->name }}</span>
                        <i data-feather="chevron-down" class="svg-icon text-gradient"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i data-feather="user"class="svg-icon mr-2 ml-1"></i>
                        My Profile
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                        Account Setting
                    </a>

                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <div class="text-danger">
                                    <i data-feather="power"class="svg-icon mr-2 ml-1"></i>
                                    Logout
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
