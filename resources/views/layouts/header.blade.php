<header>
    <div class="header">
        <div class="header_top d_none1">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="conta_icon ">
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-whatsapp text-black"></i>
                                    <span>+62 88 - 88 - 88</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="social_icon">
                            <li> <a href="#"><i class="fa-brands fa-facebook-f text-white"></i>
                                </a>
                            </li>
                            <li> <a href="#"><i class="fa-brands fa-twitter text-white"></i></a></li>
                            <li> <a href="#"><i class="fa-brands fa-linkedin-in text-white"></i></a></li>
                            <li> <a href="#"><i class="fa-brands fa-instagram text-white"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="se_fonr1">
                            <form action="#">
                                <div class="select-box">
                                    <label for="select-box1" class="label select-box1"><span
                                            class="label-desc">English</span> </label>
                                    <select id="select-box1" class="select">
                                        <option value="Choice 1">English</option>
                                        <option value="Choice 1">Falkla</option>
                                        <option value="Choice 2">Germa</option>
                                        <option value="Choice 3">Neverl</option>
                                    </select>
                                </div>
                            </form>
                            <span class="time_o">Open hour: 8.00 - 18.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_midil">
            <div class="container">
                <div class="row d_flex">
                    <div class="col-md-4">
                        <ul class="conta_icon d_none1">
                            @guest
                                <li>
                                    <i class="fa-solid fa-envelope"></i>
                                    <span>ecommerce@gmail.com</span>
                                </li>
                            @else
                                <li>
                                    <button type="button" class="link" data-bs-toggle="modal" data-bs-target="#settings">
                                        @if (isset(Auth::user()->photo))
                                            <img src="" alt="#">
                                        @else
                                            <img src="{{ asset('template/default/image/profile/profile-user-black.png') }}"
                                                alt="#" width="30">
                                        @endif
                                        <span>{{ Auth::user()->email }}</span>
                                    </button>
                                </li>
                                <div class="modal fade" id="settings" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0">
                                            <div class="modal-body">
                                                <div class="d-flex flex-column align-items-center mb-2">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Settings</h1>
                                                    <button class="order" id="editProfile">Edit Profile</button>
                                                </div>
                                                <form method="POST" action="{{ route('edit.profile', Auth::user()->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        <div class="row mb-3">
                                                            <div class="col-md-12">
                                                                <p class="mb-1" style="font-size: 14px;">Name</p>
                                                                <input id="nameEdit" type="text"
                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                    name="name" value="{{ Auth::user()->name }}" required
                                                                    placeholder="Your name" autocomplete="name" autofocus
                                                                    readonly>
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-12">
                                                                <p class="mb-1" style="font-size: 14px;">Email</p>
                                                                <input id="emailEdit" type="email"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    name="email" value="{{ Auth::user()->email }}"
                                                                    required placeholder="Email address"
                                                                    autocomplete="email" readonly>
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-12">
                                                                <p class="mb-1" style="font-size: 14px;">Address</p>
                                                                @if (isset(Auth::user()->address))
                                                                    <input id="addressEdit" type="text"
                                                                        class="form-control @error('address') is-invalid @enderror"
                                                                        name="address" required placeholder="Your address"
                                                                        autocomplete="new-address"
                                                                        value="{{ Auth::user()->address }}" readonly>
                                                                @else
                                                                    <input id="addressEdit" type="text"
                                                                        class="form-control @error('address') is-invalid @enderror"
                                                                        name="address" required placeholder="New Address"
                                                                        autocomplete="new-address" readonly>
                                                                @endif
                                                                @error('address')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-12">
                                                                <p class="mb-1" style="font-size: 14px;">Phone Number
                                                                </p>
                                                                @if (isset(Auth::user()->phone))
                                                                    <input id="phoneEdit" type="number"
                                                                        class="form-control @error('phone') is-invalid @enderror"
                                                                        name="phone" required
                                                                        placeholder="Your number phone"
                                                                        autocomplete="new-phone"
                                                                        value="{{ Auth::user()->phone }}" readonly>
                                                                @else
                                                                    <input id="phoneEdit" type="number"
                                                                        class="form-control @error('phone') is-invalid @enderror"
                                                                        name="phone" required placeholder="Phone Number"
                                                                        autocomplete="new-phone" readonly>
                                                                @endif
                                                                @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row mb-5">
                                                            <button type="submit" class="order px-4 d-none"
                                                                id="saveEdit">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="d-flex flex-column align-items-center mb-2">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password
                                                    </h1>
                                                    <button class="order" id="editPassword">Change</button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('edit.password', Auth::user()->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        <div class="row mb-3">
                                                            <div class="col-md-12">
                                                                <p class="mb-1" style="font-size: 14px;">Current
                                                                    Password</p>
                                                                <input id="currentPasswordEdit" type="password"
                                                                    class="form-control @error('password') is-invalid @enderror"
                                                                    name="current_password" required
                                                                    placeholder="Current Password"
                                                                    autocomplete="new-password"
                                                                    value="{{ old('password') }}" readonly>
                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-12">
                                                                <p class="mb-1" style="font-size: 14px;">Password</p>
                                                                <input id="newPasswordEdit" type="password"
                                                                    class="form-control @error('password') is-invalid @enderror"
                                                                    name="password" required placeholder="New Password"
                                                                    autocomplete="new-password"
                                                                    value="{{ old('password') }}" readonly>
                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-12">
                                                                <p class="mb-1" style="font-size: 14px;">Confirm</p>
                                                                <input id="newPasswordConfirmEdit" type="password"
                                                                    class="form-control" name="password_confirmation"
                                                                    required placeholder="Confirm password"
                                                                    autocomplete="new-password" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-5">
                                                            <button type="submit" class="order px-4 d-none"
                                                                id="savePassword">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endguest
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <a class="logo" href="{{ url('/') }}"><img
                                src="{{ asset('template/images/logo.png') }}" alt="#" /></a>
                    </div>
                    <div class="col-md-4">
                        <ul class="right_icon d_none1">
                            @guest
                                <button type="button" class="order px-4" data-bs-toggle="modal"
                                    data-bs-target="#login">
                                    Login
                                </button>
                            @else
                                <li><a href="{{ url('/cart') }}"><i class="fa-solid fa-cart-shopping fa-2x mx-2"></i>
                                </li>
                                <a href="" class="order"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    @guest
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/about') }}">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/product') }}">Products</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/fashion') }}">Fashion</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/news') }}">News</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
                                        </li>
                                    @else
                                        @if (Auth::user()->role == 'admin')
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/product') }}">Products List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/product/table') }}">Products</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/category/table') }}">Category</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/user/table') }}">User</a>
                                            </li>
                                        @else
                                            <li class="nav-item active">
                                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/about') }}">About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/product') }}">Products</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/fashion') }}">Fashion</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/news') }}">News</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
                                            </li>
                                        @endif
                                    @endguest
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-md-4">
                        <div class="search">
                            <form action="">
                                <input class="form_sea" type="text" placeholder="Search" name="search">
                                <button type="submit" class="seach_icon"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-body">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-1" style="font-size: 14px;">Email</p>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required placeholder="Email address"
                                    autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-1" style="font-size: 14px;">Password</p>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required placeholder="Password" autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-5">
                            <button type="submit" class="order px-4">Login</button>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fw-bold mb-0">Don't have an account?<button type="button"
                                        class="link mx-1" data-bs-toggle="modal" data-bs-target="#register">
                                        Register
                                    </button></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-body">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Register</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-1" style="font-size: 14px;">Name</p>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required placeholder="Your name"
                                    autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-1" style="font-size: 14px;">Email</p>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required placeholder="Email address"
                                    autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-1" style="font-size: 14px;">Password</p>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required placeholder="Password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-1" style="font-size: 14px;">Confirm</p>
                                <input type="password" class="form-control" name="password_confirmation" required
                                    placeholder="Confirm password" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-5">
                            <button type="submit" class="order px-4">Register</button>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="fw-bold mb-0">Already have account?<button type="button" class="link mx-1"
                                        data-bs-toggle="modal" data-bs-target="#login">
                                        Login
                                    </button></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
