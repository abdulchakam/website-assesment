<!-- Sidebar scroll-->
<div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="fas fa-home fa-lg mt-1"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

            <li class="nav-small-cap">
                <span class="hide-menu">Data</span>
            </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <i class="fas fa-list fa-lg mt-1"></i>
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
                        <i class="far fa-building fa-lg mt-1"></i>
                        <span class="hide-menu">Instansi</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('instansi') }}" aria-expanded="false">
                                <span class="hide-menu">Lihat Instansi</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <i class="fas fa-tasks fa-lg mt-1"></i>
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
                        <i data-feather="user" class="feather-icon"></i>
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

            {{-- <li class="list-divider"></li> --}}

            {{-- <li class="nav-small-cap"><span class="hide-menu">Pengaturan</span></li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                    <i class="fas fa-cogs fa-lg mt-1"></i>
                    <span class="hide-menu">Website </span>
                </a>
                <ul aria-expanded="false" class="collapse first-level base-level-line">
                    <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                class="hide-menu"> Title Website</span></a>
                    </li>
                    <li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)"
                            aria-expanded="false"><span class="hide-menu">Header Website</span></a>
                        <ul aria-expanded="false" class="collapse second-level base-level-line">
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link">
                                    <span class="hide-menu"> Halaman Admin</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="javascript:void(0)" class="sidebar-link">
                                    <span class="hide-menu"> Halaman User</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="javascript:void(0)" class="sidebar-link">
                            <span class="hide-menu"> Footer Website</span>
                            </a>
                    </li>
                </ul>
            </li> --}}

            <li class="list-divider"></li>

            <br>
            <li class="sidebar-item d-flex justify-content-center">
                <button class="btn btn-yellow radius-10 font-weight-medium btn-info" data-id="{{ Auth::user()->id }}">
                    Informasi User
                    <i class="fas fa-chevron-right fa-lg ml-2"></i>
                </button>
            </li>

        </ul>
    </nav>
</div>
