<div id="project" class="project">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Featured Products</h2>
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
                            Rp.{{ number_format($data->price, '0', '.', '.') }},-</a>
                    </div>
                @endforeach
                @if (!Request::is('product'))
                    <div class="col-md-12">
                        <a class="read_more" href="{{ url('/product') }}">See More</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
