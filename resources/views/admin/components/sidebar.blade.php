<!-- Sidebar scroll-->
<div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                    <i data-feather="home" class="feather-icon"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

            <li class="list-divider"></li>

            <li class="nav-small-cap">
                <span class="hide-menu">Data</span>
            </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <i data-feather="database" class="feather-icon mx-1"></i>
                        <span class="hide-menu">Indikator</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('indikators.index') }}" aria-expanded="false">
                                <span class="hide-menu">Lihat Indikator</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <i data-feather="database" class="feather-icon mx-1"></i>
                        <span class="hide-menu">Rekap</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('rekaps.index') }}" aria-expanded="false">
                                <span class="hide-menu">Lihat Rekap</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <li class="list-divider"></li>

            <li class="nav-small-cap"><span class="hide-menu">User</span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <i data-feather="users" class="feather-icon"></i>
                        <span class="hide-menu">Admin </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('users.index')}}" class="sidebar-link">
                                <span class="hide-menu"> {{ $link ?? 'User Admin' }} </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <i data-feather="users" class="feather-icon"></i>
                        <span class="hide-menu">Dinas </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{ route('users-dinas') }}" class="sidebar-link">
                                <span class="hide-menu">{{ $link ?? 'User Dinas'}}</span>
                            </a>
                        </li>
                    </ul>
                </li>

            <li class="list-divider"></li>

            <li class="nav-small-cap"><span class="hide-menu">Pengaturan</span></li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                    <i data-feather="settings" class="feather-icon"></i>
                    <span class="hide-menu">Website </span>
                </a>
                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <span class="hide-menu">Identitas Website</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <span class="hide-menu">Logo Website</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="list-divider"></li>

            <li class="sidebar-item ">
                <a class="sidebar-link sidebar-link " href="#" aria-expanded="false">
                    <i data-feather="log-out" class="feather-icon text-danger font-weight-bold"></i>
                    <span class="hide-menu text-danger font-weight-bold">Logout</span>
                </a>
            </li>

        </ul>
    </nav>
</div>
