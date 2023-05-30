@extends('layouts.template')

@section('title', 'Landing Page')

@section('main')
    <section class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                About Us
                            </h2>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua. Ut enim ad minim veniam
                        </p>
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="images/about-img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('trending')

    <section class="discount_section  layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <h2>
                            The Latest Collection
                        </h2>
                        <h2 class="main_heading">
                            50% DISCOUNT
                        </h2>
                        <div class="">
                            <a href="">
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="images/discount-img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="brand_section" id="hottest">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Featured Brands
                </h2>
            </div>
            <div class="brand_container layout_padding2">
                @foreach ($products as $product)
                    <div class="box position-relative">
                        <a href="{{ url('detail/product/' . $product->id) }}">
                            <div class="img-box">
                                <img src="{{ $product->image }}" alt="{{ $product->image }}">
                            </div>
                            <div class="detail-box position-absolute product-description">
                                <h6 class="price">Rp. {{ $product->price }}</h6>
                                <h6>{{ $product->name }}</h6>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <a href="{{ url('/product/all') }}" class="brand-btn">
                See More
            </a>
        </div>
    </section>

    <section class="contact_section layout_padding">
        <div class="container ">
            <div class="heading_container">
                <h2 class="">
                    Contact Us
                </h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="">
                        <div>
                            <input type="text" placeholder="Name" />
                        </div>
                        <div>
                            <input type="email" placeholder="Email" />
                        </div>
                        <div>
                            <input type="text" placeholder="Phone" />
                        </div>
                        <div>
                            <input type="text" class="message-box" placeholder="Message" />
                        </div>
                        <div class="d-flex ">
                            <button>
                                SEND
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="map_container">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                                width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="client_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Testimonial
                </h2>
            </div>
        </div>

        <div class="container">
            <div class="client_container layout_padding2">
                <div class="client_box b-1">
                    <div class="client-id">
                        <div class="img-box">
                            <img src="images/client-1.png" alt="" />
                        </div>
                        <div class="name">
                            <h5>
                                Magna
                            </h5>
                            <p>
                                Consectetur adipiscing
                            </p>
                        </div>
                    </div>
                    <div class="detail">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum
                        </p>
                        <div>
                            <div class="arrow_img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="client_box b-2">
                    <div class="client-id">
                        <div class="img-box">
                            <img src="images/client-2.png" alt="" />
                        </div>
                        <div class="name">
                            <h5>
                                Aliqua
                            </h5>
                            <p>
                                Consectetur adipiscing
                            </p>

                        </div>
                    </div>
                    <div class="detail">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum
                        </p>
                        <div>
                            <div class="arrow_img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="info_section layout_padding2">
        <div class="container">
            <div class="info_logo">
                <h2>
                    Digitf
                </h2>
            </div>
            <div class="row">

                <div class="col-md-3">
                    <div class="info_contact">
                        <h5>
                            About Shop
                        </h5>
                        <div>
                            <div class="img-box">
                                <img src="images/location-white.png" width="18px" alt="">
                            </div>
                            <p>
                                Address
                            </p>
                        </div>
                        <div>
                            <div class="img-box">
                                <img src="images/telephone-white.png" width="12px" alt="">
                            </div>
                            <p>
                                +01 1234567890
                            </p>
                        </div>
                        <div>
                            <div class="img-box">
                                <img src="images/envelope-white.png" width="18px" alt="">
                            </div>
                            <p>
                                demo@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info_info">
                        <h5>
                            Informations
                        </h5>
                        <p>
                            ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info_insta">
                        <h5>
                            Instagram
                        </h5>
                        <div class="insta_container">
                            <div>
                                <a href="">
                                    <div class="insta-box b-1">
                                        <img src="images/i-1.jpg" alt="">
                                    </div>
                                </a>
                                <a href="">
                                    <div class="insta-box b-2">
                                        <img src="images/i-2.jpg" alt="">
                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="">
                                    <div class="insta-box b-3">
                                        <img src="images/i-3.jpg" alt="">
                                    </div>
                                </a>
                                <a href="">
                                    <div class="insta-box b-4">
                                        <img src="images/i-4.jpg" alt="">
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div class="insta-box b-3">
                                        <img src="images/i-5.jpg" alt="">
                                    </div>
                                </a>
                                <a href="">
                                    <div class="insta-box b-4">
                                        <img src="images/i-6.jpg" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info_form ">
                        <h5>
                            Newsletter
                        </h5>
                        <form action="">
                            <input type="email" placeholder="Enter your email">
                            <button>
                                Subscribe
                            </button>
                        </form>
                        <div class="social_box">
                            <a href="">
                                <img src="images/fb.png" alt="">
                            </a>
                            <a href="">
                                <img src="images/twitter.png" alt="">
                            </a>
                            <a href="">
                                <img src="images/linkedin.png" alt="">
                            </a>
                            <a href="">
                                <img src="images/youtube.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
