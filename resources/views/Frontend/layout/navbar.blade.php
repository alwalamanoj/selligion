{{-- <nav class="navbar navbar-expand-lg navbar-light fixed-top main-nav-bar">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="/">
                <img loading="lazy" src="{{asset('assets/images/logo.png')}}" alt="Selligion" width="80px" class="mt-1 img-fluid">
            </a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('product/selligion-praho-2') ? 'active' : '' }}" href="/product/selligion-praho-2">Selligion Praho 2</a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}
<header id="luxbar" class="luxbar-fixed">
    <input type="checkbox" class="luxbar-checkbox" id="luxbar-checkbox" />
    <div class="luxbar-menu luxbar-menu-right luxbar-menu-material-primary">
        <ul class="luxbar-navigation">
            <li class="luxbar-header">
                <a href="/" class="luxbar-brand">
                    <img loading="lazy" src="{{ asset('assets/images/Selligion-blue-horizon.png') }}" alt="Selligion" class="logo img-fluid"
                        width="150px">
                </a>
                <label class="luxbar-hamburger luxbar-hamburger-doublespin" id="luxbar-hamburger" for="luxbar-checkbox">
                    <span></span> </label>
            </li>
            <li class="luxbar-item secondary-text" ><a href="/">HOME</a></li>
            <li class="luxbar-item secondary-text"><a href="/product/selligion-praho-2">SELLIGION PRAHO</a></li>
            <li class="luxbar-item secondary-text" ><a href="/blogs">BLOGS</a></li>
            <li class="luxbar-item secondary-text" >
                <a href="/my/orders">MY ORDERS</a>
            </li>
            @if (Auth::check())
                @if (Auth::user()->role == "ADMIN")
                <li class="luxbar-item secondary-text" ><a href="/admin/dashboard/order/all">DASHBOARD</a></li>
                @endif
                <li class="luxbar-item dropdown secondary-text"><a href="#">{{ Auth::user()->email }}</a>
                    <ul class="white-bg py-2">
                        <li>
                            <a>
                                <form action="/logout/miniorange" method="POST">
                                    @csrf
                                    <button class="submit" style="border: none; background: none; color:var(--secondary-text)">LOGOUT</button>
                                </form>
                            </a>
                        </li>
                    </ul>
                </li>
            @else
                <li class="luxbar-item secondary-text" ><a href="/login">LOGIN</a></li>
            @endif
        </ul>
    </div>
</header>
