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