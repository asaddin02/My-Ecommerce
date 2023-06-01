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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Bootstrap --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('template/css/bootstrap.css') }}" />

    {{-- Customization CSS --}}
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>

    {{-- Hero Start --}}
    <div class="hero_area">

        {{-- Header Start --}}
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container overflow-scroll">
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <img src="{{ asset('') }}" alt="Brand Logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link text-primary">Home</a>
                            </li>
                            <li class="nav-item">
                                @if (request()->is('/'))
                                    <a href="#about" class="nav-link">About</a>
                                @else
                                    <a href="{{ url('/about') }}" class="nav-link">About</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/shop') }}" class="nav-link">Shop</a>
                            </li>
                            @if (request()->is('/'))
                                <li class="nav-item">
                                    <a href="#hottest" class="nav-link">Hottest</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                @if (request()->is('/'))
                                    <a href="#contact" class="nav-link">Contact Us</a>
                                @else
                                    <a href="{{ url('/contact') }}" class="nav-link">Contact Us</a>
                                @endif
                            </li>
                        </ul>
                        <div class="user_option">
                            @guest
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#signin">
                                    <span class="text-white">Sign In</span>
                                    <i class="fa-solid fa-right-to-bracket text-white mx-1"></i>
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
                    {{-- Modal Login Start --}}
                    <div class="modal fade" id="signin" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-header border-0 d-flex justify-content-end align-items-center">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                        aria-label="Close">X</button>
                                </div>
                                <div class="modal-body p-4 p-md-5">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-circle-user fa-4x my-2"></i>
                                    </div>
                                    <h3 class="text-center mb-4">Sign In</h3>
                                    <form method="POST" action="{{ route('login') }}" class="login-form">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control rounded-left" name="email"
                                                placeholder="Email" autofocus required>
                                        </div>
                                        <div class="form-group d-flex">
                                            <input type="password" class="form-control rounded-left" name="password"
                                                placeholder="Password" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit"
                                                class="form-control btn btn-primary rounded submit px-3">Login</button>
                                        </div>
                                        <div class="form-group d-md-flex">
                                            <div class="form-check w-50">
                                                <label class="custom-control fill-checkbox">
                                                    <input type="checkbox" class="fill-control-input">
                                                    <span class="fill-control-indicator"></span>
                                                    <span class="fill-control-description">Remember Me</span>
                                                </label>
                                            </div>
                                            <div class="w-50 text-md-right">
                                                <a href="#">Forgot Password</a>
                                            </div>
                                        </div>
                                    </form>
                                    <p>Not a member? <button type="button" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#signup">
                                            <span class="text-black">Create an account.</span>
                                        </button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal Login End --}}

                    {{-- Modal Register Start --}}
                    <div class="modal fade" id="signup" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-header border-0 d-flex justify-content-end align-items-center">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                        aria-label="Close">X</button>
                                </div>
                                <div class="modal-body p-4 p-md-5">
                                    <h3 class="text-center mb-4">Sign Up</h3>
                                    <form method="POST" action="{{ route('register') }}" class="login-form">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control rounded-left" name="name"
                                                placeholder="Name" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control rounded-left" name="email"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="form-group d-flex">
                                            <input type="password" class="form-control rounded-left" name="password"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="form-group d-flex">
                                            <input type="password" class="form-control rounded-left"
                                                name="password_confirmation" placeholder="Confirm Password" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit"
                                                class="form-control btn btn-primary rounded submit px-3">Sign
                                                Up</button>
                                        </div>
                                    </form>
                                    <p>Have an account? <button type="button" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#signin">
                                            <span class="text-black">Sign In.</span>
                                        </button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal Register End --}}

                    {{-- Modal Login Fisrt Start --}}
                    <div class="modal fade" id="loginFirst" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0">
                                <div class="modal-header border-0">
                                    <h2 class="modal-title" id="exampleModalLabel">Login First</h2>
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                        aria-label="Close">X</button>
                                </div>
                                <div class="modal-body d-flex justify-content-center align-items-center">
                                    <div>
                                        <span>You must login first,</span>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                                            data-bs-target="#signin">
                                            Sign In
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal Login Fisrt End --}}

                    {{-- Modal Settings Start --}}
                    <div class="modal fade" id="settings" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal Settings End --}}
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
    {{-- Hero End --}}

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
