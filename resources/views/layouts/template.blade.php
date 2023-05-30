<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>

    {{-- Slider --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap"
        rel="stylesheet">

    {{-- Feather Icons --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- Bootstrap --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('template/css/bootstrap.css') }}" />

    {{-- Customization CSS --}}
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>

    <div class="hero_area">

        {{-- Header Start --}}
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('') }}" alt="Brand Logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/') }}">Home <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/shop') }}">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#hottest">Hottest</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact Us</a>
                            </li>
                        </ul>
                        <div class="user_option">
                            @guest
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#signin">
                                    <span class="text-white">Sign In</span>
                                    <i class="text-white" data-feather="log-in"></i>
                                </button>
                            @else
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#settings">
                                    <span class="text-white">{{ Auth::user()->name }}</span>
                                </button>
                            @endguest
                        </div>
                    </div>
                    <div>
                        <div class="custom_menu-btn ">
                            <button>
                                <span class=" s-1"></span>
                                <span class="s-2"></span>
                                <span class="s-3"></span>
                            </button>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        {{-- Header End --}}

        {{-- Hero Content Start --}}
        <section>
            @include('hero')
        </section>
        {{-- Hero Content End --}}

    </div>

    {{-- Modal Login Start --}}
    <div class="modal fade" id="signin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Login End --}}

    {{-- Modal Settings Start --}}
    <div class="modal fade" id="settings" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Settings End --}}

    {{-- Main Content Start --}}
    <main>
        @yield('main')
    </main>
    {{-- Main Content End --}}

    {{-- Footer Start --}}
    <footer class="container-fluid footer_section ">
        <div class="container">
            <p>&copy; 2023 All Rights Reserved, Pasuruan E Commerce</p>
        </div>
    </footer>
    {{-- Footer End --}}

    {{-- JQuery --}}
    <script type="text/javascript" src="{{ asset('template/js/jquery-3.4.1.min.js') }}"></script>

    {{-- Bootstrap --}}
    <script type="text/javascript" src="{{ asset('template/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bs/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Ajax --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
    </script>

    {{-- Customization JS --}}
    <script src="{{ asset('template/js/script.js') }}"></script>
</body>

</html>
