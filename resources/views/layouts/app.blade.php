<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <title>@yield('title')</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/responsive.css') }}">

    {{-- Scrollbar --}}
    <link rel="stylesheet" href="{{ asset('template/css/jquery.mCustomScrollbar.min.css') }}">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body class="main-layout">

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    {{-- Loader Start --}}
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('template/images/loading.gif') }}" alt="#" /></div>
    </div>
    {{-- Loader End --}}

    {{-- Header --}}
    @include('layouts.header')

    {{-- Main --}}
    @yield('main')

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- JS --}}
    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/js/popper.min.js') }}"></script>
    <script src="{{ asset('bs/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('template/js/custom.js') }}"></script>
</body>

</html>
