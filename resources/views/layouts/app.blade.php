<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" same-site="strict">

    <title>My E-commerce</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('bs/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bs/css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{ asset('bs/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bs/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-HtW314MLotpBzhI_"></script>
</head>

<body>
    @isset($preloader)
        <div class="preloader">
            <div class="loading">
                <img src="{{ asset('storage/asset/pngegg(3).png') }}" class="d-inline-block" alt="" width="7%">
                <img src="{{ asset('storage/asset/ecommerce.png') }}" class="d-inline-block" alt="" width="50%">
                <img src="{{ asset('storage/asset/Fidget-spinner.gif') }}" alt="">
            </div>
        </div>
    @endisset
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-3 position-sticky"
            style="top: 0; z-index:10000;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('storage/asset/pngegg(3).png') }}" alt="" width="4%">
                    <img src="{{ asset('storage/asset/ecommerce.png') }}" alt="" width="35%">
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item dropdown me-3">
                                <a href="{{ url('about') }}"
                                    class="position-relatif d-inline navlink-hover {{ Request::is('about') ? 'bg-nav' : 'navbar-other' }}"
                                    style="padding: 26.5px;"><i class="me-2 fa-sharp fa-solid fa-users"></i>About Us</a>
                                <a href="{{ url('contact') }}"
                                    class="position-relatif d-inline navlink-hover {{ Request::is('contact') ? 'bg-nav' : 'navbar-other' }}"
                                    style="padding: 26.5px;"><i class="me-2 fa-solid fa-address-book"></i>Contact us</a>
                            </li>
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="me-2 text-more button fw-bolder px-3 py-2" href="#"
                                        style="text-decoration: none;" data-bs-toggle="modal"
                                        data-bs-target="#login">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a href="{{ url('home') }}"
                                    class="position-relatif d-inline me-0 navlink-hover {{ Request::is('home') ? 'bg-nav' : 'navbar-other' }}"
                                    style="padding: 27.5px;"><i class="me-2 fa-solid fa-house"></i></i>Home</a>
                                <a href="{{ route('shop.index') }}"
                                    class="position-relatif d-inline me-0 navlink-hover {{ Request::is('shop') ? 'bg-nav' : 'navbar-other' }}"
                                    style="padding: 27.5px;"><i class="me-2 fa-solid fa-store"></i></i>Shop</a>
                                <a href="/cart"
                                    class="position-relatif d-inline navlink-hover me-4 {{ Request::is('cart') ? 'bg-nav' : 'navbar-other' }}"
                                    style="padding: 27.5px;" id="cart"><i
                                        class=" me-2 fa-solid fa-cart-shopping"></i>Cart</a>
                                <a id="navbarDropdown"
                                    class="dropdown-toggle btn btn-sm px-3 border rounded-pill border-1 border-primary text-primary"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    MENU
                                </a>

                                <div class="dropdown-menu dropdown-menu-end pe-1" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-hover" style="font-size: 16px;"
                                        href="{{ route('profile.index') }}">
                                        <i class="me-2 fa-solid fa-person"></i>{{ __('My Profile') }}
                                    </a>
                                    <a class="dropdown-item text-hover" style="font-size: 16px;"
                                        href="{{ url('about') }}">
                                        <i class="me-2 fa-sharp fa-solid fa-users"></i>{{ __('About Us') }}
                                    </a>
                                    <a class="dropdown-item text-hover" style="font-size: 16px;"
                                        href="{{ url('contact') }}">
                                        <i class="me-2 fa-solid fa-address-book"></i>{{ __('Contact Us') }}
                                    </a>
                                    <a class="dropdown-item text-hover" style="font-size: 16px;"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="me-2 fa-solid fa-right-from-bracket"></i>{{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
    <div class="container-fluid" style="box-shadow: 0 -5px 4px rgba(0, 0, 0, 0.097);">
        <div class="row justify-content-center p-3">
            <div class="col-md-12 text-center">
                <div class="footer">
                    <small style="font-family: 'Montserrat', sans-serif; font-weight:600;">Copyright &copy; 2022 .
                        Powered by Prasada
                        Arif Nurudin</small> <br>
                    <small style="font-family: 'Montserrat', sans-serif; font-weight:600;">Distributed by
                        Asadin.co</small>
                </div>
            </div>
        </div>
    </div>
    {{-- alert --}}
    @include('sweetalert::alert')
    {{-- modal --}}
    @include('auth.login')
    {{-- ajax --}}
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll(
            '[data-bs-toggle="tooltip"],[data-bs-tombol="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        $(document).ready(function() {
            $('.preloader').delay('2000').fadeOut();
        });
    </script>


</body>

</html>
