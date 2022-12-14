<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard | {{ucfirst(Route::currentRouteName())}}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('orange.png')}}">
    @include('scripts')
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <style>
        a {color: white !important;}
        .hover-underline:hover {
            text-decoration: underline !important;
        }
    </style>
</head>
<body class="sb-nav-fixed" @if(session()->get('alert') !== null) onload="$('.toast').toast('show');" @endif>
    @include('alert')
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="/">
        <img src="{{asset('orange.png')}}" style="width: 30px;height: 30px" alt="">
        Nexon
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
{{--    <!-- Navbar Search-->--}}
{{--    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">--}}
{{--        <div class="input-group">--}}
{{--            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />--}}
{{--            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--    <!-- Navbar-->--}}
    <div class="navbar-nav ms-auto me-3 me-lg-4">
        <a href="{{ route('logout') }}" onclick="
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                            ">
            <i class="bi bi-box-arrow-left me-1"></i> Log out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link @if(Route::currentRouteName() == 'admin') bg-primary active @endif" href="/admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link @if(Route::currentRouteName() == 'edit-categories') bg-primary active @endif" href="/edit-categories">
                        <div class="sb-nav-link-icon"><i class="bi bi-pen"></i></div>
                        Edit categories
                    </a>
                    <a class="nav-link @if(Route::currentRouteName() == 'parser') bg-primary active @endif" href="/parser">
                        <div class="sb-nav-link-icon"><i class="bi bi-arrow-repeat"></i></div>
                        Parser
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer d-inline-flex align-items-center gap-3">
                <img src="https://avatars.dicebear.com/api/bottts/{{Auth::user()->name}}0.svg" style="width: 40px" alt="">
                <div class="small">Logged in as: {{Auth::user()->name}}</div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Nexon 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

</body>
</html>

