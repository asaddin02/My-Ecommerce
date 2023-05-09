@extends('layouts.app')
@section('content')
    <div class="container mt-5" id="shop-content">
        <div class="row mb-5">
            <div class="col-md-3 position-relative">
                <h5 style="font-family: Poppins; border-top-left-radius: 0.375rem;
                border-bottom-left-radius: 0.375rem;color:#002c3e;"
                    class="border border-1 border-dark p-2 d-flex align-middle">
                    Category Products <button class="ms-3 border-0 bg-white klik" style="color: #002c3e;"><i
                            class="fa-solid fa-circle-chevron-right"></i></button></h5>
                <ul class="for-klik pagination">
                    <li>
                        <a href="/shop" class="page-link">
                            All
                        </a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="page-item">
                            <a href="/shop/category/{{ $category->id }}" class="page-link">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row mb-4">
            @foreach ($products as $product)
                <div class="col-md-3 mb-3">
                    <div class="bg-welcome3 position-relative naik" style="width: 17rem;">
                        <img src="{{ asset($product->image) }}">
                        <div class="for-shop text-center" style="font-family: 'Franklin Gothic Medium';">
                            <h5 class="mb-3">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->desc, 50, '...') }}</p>
                            <a href="{{ route('product.show', $product) }}" style="display: block;"
                                class="btn-box-blue btn-box-sm button mb-2">Detail</a>
                            @guest
                                <a href="#"style="display: block;" class="btn-box-red btn-box-sm button"
                                    data-bs-toggle="tooltip" title="Add to cart" data-bs-placement="bottom"><i
                                        class="fa-solid fa-cart-shopping"></i></a>
                            @else
                                <form action="{{ route('cart.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="price_items" value="{{ $product->price }}">
                                    <input type="hidden" name="qty" value="1">
                                    <button type="submit" style="width: 100%" class="btn-box-red btn-box-sm button"
                                        data-bs-toggle="tooltip" title="Add to cart" data-bs-placement="bottom"><i
                                            class="fa-solid fa-cart-shopping"></i></button>
                                </form>
                            @endguest
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mb-5">
            {{ $products->Links('pagination::bootstrap-5') }}
        </div>
    </div>

    {{-- ajax --}}
    {{-- <script>
        $(document).ready(function() {
            $(".page-link").click(function(e) {
                e.preventDefault();
                var url = $(this).attr("href");
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "JSON",
                    success: function(data) {
                        window.location = url;
                    }
                });
            });
        });
    </script> --}}
@endsection
