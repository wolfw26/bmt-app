<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3 ">
        <nav aria-label="breadcrumb" class="container">
            <div class="row">
                <div class="col-md-4">
                    {{-- Pages --}}
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark text-monospace active" aria-current="page">{{ $title }}</li>
                    </ol>
                </div>
                <div class="col-md-6">
                    {{-- title --}}
                    @if (Auth::user())
                    <h6 class="font-weight-bolder mb-0">{{ $title }}
                        {{ Auth::user()->role }}
                    </h6>
                    @endif
                </div>
                @auth
                    <div class="col-md-2">
                    {{-- dropdown user aktif --}}
                    <div class="btn-group dropdown mt-0 ml-auto">
                        <button type="button" class="btn btn-sm bg-gradient-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item border-radius-md" href="{{ route('admin.profil') }}">Profil</a></li>
                            <li><a class="dropdown-item border-radius-md" href="{{ route('logout') }}">Log Out</a></li>
                        </ul>
                    </div>
                    {{-- toggle sidebar Humburger --}}
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    </div>
                @endauth
            </div>
        </nav>
    </div>
</nav>
{{-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 navbar-heading">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark text-monospace active" aria-current="page">{{ $title }}</li>
</ol> --}}
{{-- Title --}}
{{-- @if (Auth::user())
    <h6 class="font-weight-md-bolder mb-0 navbar-text my-0 d-none d-lg-block mx-auto">{{ $title }}
{{ Auth::user()->role }}</h6>
@endif --}}
