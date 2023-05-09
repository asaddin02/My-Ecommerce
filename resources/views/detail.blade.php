@extends('layouts.app')
@section('content')
    <div class="container my-5" style="font-family: 'Georgia'; height: 60vh">
        <div class="row detail-info">
            <div class="col-md-6 text-center detail-img">
                <img src="{{ $product->image }}" width="30%" class="mb-3">
            </div>
            <div class="col-md-4 ms-4">
                <h2 class="mb-4">{{ $product->name }}</h2>
                <div class="mb-3">
                    <p class="d-inline fw-bolder">Price</p>
                    <p class="d-inline">:</p>
                    <p class="d-inline">Rp. {{ number_format($product->price, 0, ',', '.') }},-</p>
                </div>
                <div class="mb-3">
                    <p class="d-inline align-top fw-bolder">Category</p>
                    <p class="d-inline align-top">:</p>
                    <p class="d-inline">{{ $product->category->name }}</p>
                </div>
                <div class="mb-3">
                    <p class="d-inline align-top fw-bolder">Description</p>
                    <p class="d-inline align-top">:</p>
                    <p class="d-inline">{{ $product->desc }}</p>
                </div>
                @guest
                    <a href="" class="button btn-box btn-box-blue btn-box-sm float-end"><i class="bi bi-cart3"></i> Add
                        to Cart</a>
                @else
                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="price_items" value="{{ $product->price }}">
                        <input type="hidden" name="qty" value="1">
                        <button type="submit" class="button btn-box btn-box-blue btn-box-sm float-end"><i
                                class="fa-solid fa-cart-shopping"></i> Add
                            to Cart</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
    </div>
@endsection
