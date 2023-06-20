@extends('layouts.app')

@section('title', 'Product Detail')

@section('main')
    <div class="container d-flex justify-content-center align-items-center my-lg-5">
        <div class="card d-flex flex-column justify-content-center align-items-center border-0" style="width: 18rem;">
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Product Image">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <h2 class="card-title text-center mb-1 text-black fw-bold">{{ $product->name }}</h2>
                <p class="card-text text-center mb-2">{{ $product->desc }}</p>
                <p class="card-text text-start mb-2">Rp.{{ number_format($product->price, '0', '.', '.') }},-</p>
                <div class="d-flex my-2">
                    @guest
                        <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#login">
                            <span>Buy Now</span> <i class="fa-solid fa-hand-holding-dollar"></i>
                        </button>
                        <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#login">
                            <span>Add To Cart</span> <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    @else
                        <a href="{{ url('/product') }}" class="btn btn-primary mx-2"><span>Buy Now</span> <i
                                class="fa-solid fa-hand-holding-dollar"></i></a>
                        <div>
                            <form id="add-cart-form" class="d-flex align-items-end" action="{{ route('cart-list.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div>
                                    <button class="btn btn-primary mx-2" type="submit"><span>Add
                                            To Cart</span> <i class="fa-solid fa-cart-shopping"></i></button>
                                </div>
                                <div>
                                    <span class="mx-2">Quantity</span>
                                    <input type="number" name="qty" required autofocus>
                                </div>
                                <input type="hidden" name="price_items" value="{{ $product->price }}">
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <div id="project" class="project">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Products with similar categories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product_main">
                    @foreach ($datas as $data)
                        <div class="project_box mb-5">
                            <div class="dark_white_bg"><img src="{{ asset('storage/' . $data->image) }}" alt="#"
                                    width="110" /></div>
                            <a href="{{ url('/product/detail/' . $data->id) }}">{{ $data->name }}
                                ${{ $data->price }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
