<div class="mb-4">
    <div class="col-12 bg-dark text-light">
        <div class="container py-3 d-flex">
            <a href="{{ route('welcome') }}" class="d-flex align-items-end">
                <img src="{{ asset('images/logo.png') }}" style="width: 50px" alt="">
                <p class="fs-4">exon</p>
            </a>
            <div class="d-flex align-items-center gap-2 ms-4 fs-5">
                <a href="/"><i class="fa-brands fa-facebook"></i></a>
                <a href="/"><i class="fa-brands fa-instagram"></i></a>
                <a href="/"><i class="fa-brands fa-telegram"></i></a>
            </div>
            <div class="d-flex align-items-center gap-2 ms-auto fs-5">
                <a href="/"><img src="{{ asset('/images/am.png') }}" style="width: 25px" alt=""></a>
                <a href="/"><img src="{{ asset('/images/ru.png') }}" style="width: 25px" alt=""></a>
                <a href="/"><img src="{{ asset('/images/en.png') }}" style="width: 25px" alt=""></a>
            </div>
            @guest
                <div class="d-flex ms-4 align-items-center gap-3">
                    <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket me-1"></i> Login</a>
                    <a href="{{ route('register') }}"><i class="fa-solid fa-user me-1"></i> Register</a>
                </div>
            @endguest
            @auth
                <div class="d-flex ms-4 align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success"><a href="{{ route('home') }}"><i class="fa-solid fa-user me-1"></i> {{ Auth::user()->name }}</a></button>
                        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('home') }}"><i class="fa-solid fa-home me-1"></i> Home</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endauth
        </div>
    </div>
    <div class="col-12 py-1" style="background: linear-gradient(to right,#9bff00,#00d9ff)">
        <p class="text-center text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos.</p>
    </div>
</div>
