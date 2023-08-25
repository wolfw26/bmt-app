<aside class="sidenav  navbar  navbar-vertical navbar-expand-xs border-0 border-radius-xl fixed-start my-3 ms-3 " id="sidenav-main">
    <div class="sidenav-header d-block">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        {{-- <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank"> --}}
        <img src="{{ asset('img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">BMT-APP | {{ $title }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link  {{ request()->routeIs('beranda') ? ' active' : '' }}" href="{{ route('beranda') }}">
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <div class="dropdown">
                <button class="nav-link border-0 bg-transparent dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Master Data
                </button>
                <ul class="dropdown-menu position-absolute" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item {{ request()->routeIs('admin.dataadmin') ? ' bg-secondary text-white ' : '' }} border-radius-2xl" href="{{ route('admin.dataadmin') }} ">Admin</a></li>
                    <li><a class="dropdown-item {{ request()->routeIs('admin.jabatan') ? ' bg-secondary text-white ' : '' }} border-radius-2xl" href="{{ route('admin.jabatan') }} ">Jabatan</a></li>
                    <li><a class="dropdown-item border-radius-2xl " href="#">Karyawan</a></li>
                    <li><a class="dropdown-item border-radius-2xl" href="#">Peserta</a></li>
                    <li><a class="dropdown-item border-radius-2xl" href="#">Ruang</a></li>
                    <li><a class="dropdown-item border-radius-2xl" href="#">Jabatan</a></li>
                    <li><a class="dropdown-item border-radius-2xl" href="#">Ujian</a></li>
                </ul>
            </div>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('tables') ? ' active' : '' }}  " href="{{ route('tables') }}">
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.karyawan') ? ' active' : '' }}" href="{{ route('admin.karyawan') }}">
                    <span class="nav-link-text ms-1">Karyawan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('vr') ? ' active' : '' }}" href="{{ route('vr') }}">
                    <span class="nav-link-text ms-1">Virtual Reality</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>


        </ul>
    </div>
</aside>
