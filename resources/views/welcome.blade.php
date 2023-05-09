@extends('layouts.app')
@section('content')
    <div class="container-fluid p-0">
        <img src="https://themewagon.github.io/famms/images/slider-bg.jpg" alt="" height="600" width="100%">
        <div class="position-absolute col-md-4" style="top: 30%; left: 10%;">
            <h1 class="mb-3 fw-bolder" style="font-family: 'Playfair Display'; font-size: 4rem;">
                <span class="text-primary">Sale 20% Off</span>
                On Everything
            </h1>
            <p class="mb-5" style="font-family:'Franklin Gothic Medium';">Lorem ipsum dolor sit, amet consectetur
                adipisicing elit. Harum, fuga ipsam nemo eaque veniam
                voluptate dolores autem delectus? Labore placeat quos cupiditate ad quae! Ab corrupti accusamus adipisci
                rerum vitae?</p>
            @guest
                <a class="btn-box-blue button" href="#" data-bs-toggle="modal" data-bs-target="#login"><b>Shop
                        Now</b></a>
            @else
                <a class="btn-box-blue button"href="{{ url('home') }}" data-bs-toggle="modal" data-bs-target="#login"><b>Shop
                        Now</b></a>
            @endguest
        </div>
    </div>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1 class="text-center mt-5 mb-5 fw-bolder border-bottom border-4 pb-2 border-dark"
                    style="font-family: 'Playfair Display';">Why shop <span class="text-primary">With us ?</span></h1>
            </div>
        </div>
        <div class="row text-white">
            <div class="col-md-4">
                <div class="card text-center bg-welcome p-5" style="font-family: 'Montserrat';">
                    <h2><i class="fa-solid fa-truck-fast"></i></h2>
                    <h2>Fast Delivery</h2>
                    <p class="fs-5">variations of passages of Lorem Ipsum available</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center bg-welcome p-5" style="font-family: 'Montserrat';">
                    <h2><i class="fa-solid fa-sack-dollar"></i></h2>
                    <h2>Free Shipping</h2>
                    <p class="fs-5">variations of passages of Lorem Ipsum available</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center bg-welcome p-5" style="font-family: 'Montserrat';">
                    <h2><i class="fa-sharp fa-solid fa-medal"></i></h2>
                    <h2>Best Quality</h2>
                    <p class="fs-5">variations of passages of Lorem Ipsum available</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0 bg-welcome1" style="padding-top: 8rem !important;">
        <div class="offset-6 col-md-4">
            <h1 class="mb-3 fw-bolder" style="font-family: 'Playfair Display'; font-size: 4rem;">
                #New Arrival
            </h1>
            <p class="mb-5" style="font-family:'Franklin Gothic Medium';">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Nihil non error, laudantium perferendis quos, ipsam quam nisi ea temporibus deleniti
                aliquid</p>
            @guest
                <a class="btn-box-blue button" href="#" data-bs-toggle="modal" data-bs-target="#login"><b>Shop
                        Now</b></a>
            @else
                <a class="btn-box-blue button"href="{{ url('home') }}"><b>Shop
                        Now</b></a>
            @endguest
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-3">
                <h1 class="text-center mt-5 mb-5 fw-bolder border-bottom border-4 pb-2 border-dark"
                    style="font-family: 'Playfair Display';">Our <span class="text-primary">Products</span></h1>
            </div>
        </div>
        <div class="row mb-4">
            @foreach ($products as $product)
                <div class="col-md-4 mb-3">
                    <div class="bg-welcome3 position-relative naik">
                        <img src="{{ $product->image }}" alt="">
                        @guest
                            <div class="for-more">
                                <a href="{{ route('loginfisrt') }}" class="btn-box-blue button btn-box-sm">Detail</a>
                            </div>
                        @else
                            <div class="for-more">
                                <a href="{{ route('product.show', $product) }}"
                                    class="btn-box-blue button btn-box-sm me-2">Detail</a>
                            </div>
                        @endguest
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-3 text-center">
                <a href="#" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#login">
                    <h5 style="font-family: 'Franklin Gothic Medium';" class="text-more button fw-bolder p-3">More Products
                        >>
                    </h5>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid p-4 before-footer" style="z-index: 0;" style="font-family: 'Franklin Gothic Medium';">
        <div class="row p-4">
            <div class="col-md-6 text-center">
                <h4 class="">Support By:</h4>
                <img class="" src="{{ asset('storage/asset/1.png') }}" alt="" width="23%">
                <img class="" src="{{ asset('storage/asset/2.png') }}" alt="" width="23%">
                <img class="" src="{{ asset('storage/asset/3.png') }}" alt="" width="23%">
                <img class="" src="{{ asset('storage/asset/4.png') }}" alt="" width="23%">
            </div>
            <div class="col-md-3">
                <h4 class="mb-3">Menu</h4>
                <p class="mb-0"><a href="#" class="text-dark"
                        style="text-decoration: none; font-family: 'Franklin Gothic Medium';"><i
                            class="fa-solid fa-house"></i>&ensp;&nbsp; Home</a></p>
                <p class="mb-0"><a href="#" class="text-dark"
                        style="text-decoration: none; font-family: 'Franklin Gothic Medium';"><i
                            class="fa-brands fa-shopify"></i>&ensp;&nbsp; Shop</a></p>
                <p class="mb-0"><a href="#" class="text-dark"
                        style="text-decoration: none; font-family: 'Franklin Gothic Medium';"><i
                            class="fa-solid fa-cart-shopping"></i>&ensp;&nbsp; Cart</a></p>
                <p class="mb-0"><a href="#" class="text-dark"
                        style="text-decoration: none; font-family: 'Franklin Gothic Medium';"><i
                            class="fa-sharp fa-solid fa-users"></i>&ensp;&nbsp; About Us</a></p>
                <p class="mb-0"><a href="{{ url('contact') }}" class="text-dark"
                        style="text-decoration: none; font-family: 'Franklin Gothic Medium';"><i
                            class="fa-solid fa-address-book"></i>&ensp;&nbsp; Contact Us</a></p>
            </div>
            <div class="col-md-3">
                <h4 class="mb-3">Contact Us</h4>
                <img src="{{ asset('storage/asset/pngwing.com (1) (3).png') }}" alt="" width="10%">
                <p class="d-inline"><a href="#" class="text-dark"
                        style="text-decoration: none; font-family: 'Franklin Gothic Medium';">+6285706151662</a></p> <br>
                <img src="{{ asset('storage/asset/pngwing.com (2).png') }}" alt="" width="10%">
                <p class="d-inline"><a href="#" class="text-dark"
                        style="text-decoration: none; font-family: 'Franklin Gothic Medium';">prasada.arif@gmail.com</a>
                </p><br>
                <img src="{{ asset('storage/asset/pngwing.com (1) (1).png') }}" alt="" width="10%">
                <p class="d-inline"><a href="#" class="text-dark"
                        style="text-decoration: none; font-family: 'Franklin Gothic Medium';">prasada_arif</a></p> <br>
                <img src="{{ asset('storage/asset/pngwing.com (1) (2).png') }}" alt="" width="10%">
                <p class="d-inline"><a href="#" class="text-dark"
                        style="text-decoration: none; font-family: 'Franklin Gothic Medium';">Asadin</a></p>
            </div>
        </div>
    </div>
@endsection
