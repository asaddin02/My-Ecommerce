<div id="project" class="project">
    <div class="container">
        @if (Request::is('/'))
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Hot Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product_main">
                    @foreach ($datas as $data)
                        <div class="project_box mb-5">
                            <div class="dark_white_bg"><img src="{{ asset('storage/' . $data->image) }}" alt="#"
                                    width="110" /></div>
                            <a href="{{ url('/product/detail/' . $data->id) }}">{{ $data->product_name }}
                                Rp.{{ number_format($data->price, '0', '.', '.') }},-</a>
                        </div>
                    @endforeach
                    <div class="col-md-12">
                        <a class="read_more" href="{{ url('/product') }}">See More</a>
                    </div>
                </div>
            </div>
        @else
            @if (isset($datas))
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product_main">
                        @foreach ($datas as $data)
                            <div class="project_box mb-5">
                                <div class="dark_white_bg"><img src="{{ asset('storage/' . $data->image) }}"
                                        alt="#" width="110" /></div>
                                <a href="{{ url('/product/detail/' . $data->id) }}">{{ $data->product_name }}
                                    Rp.{{ number_format($data->price, '0', '.', '.') }},-</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if (isset($hats) || isset($jackets) || isset($tshirts) || isset($pants) || isset($shoes))
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Hat / Top</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product_main">
                        @foreach ($hats as $data)
                            <div class="project_box mb-5">
                                <div class="dark_white_bg"><img src="{{ asset('storage/' . $data->image) }}"
                                        alt="#" width="110" /></div>
                                <a href="{{ url('/product/detail/' . $data->id) }}">{{ $data->product_name }}
                                    Rp.{{ number_format($data->price, '0', '.', '.') }},-</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Jacket</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product_main">
                        @foreach ($jackets as $data)
                            <div class="project_box mb-5">
                                <div class="dark_white_bg"><img src="{{ asset('storage/' . $data->image) }}"
                                        alt="#" width="110" /></div>
                                <a href="{{ url('/product/detail/' . $data->id) }}">{{ $data->product_name }}
                                    Rp.{{ number_format($data->price, '0', '.', '.') }},-</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>T-Shirt</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product_main">
                        @foreach ($tshirts as $data)
                            <div class="project_box mb-5">
                                <div class="dark_white_bg"><img src="{{ asset('storage/' . $data->image) }}"
                                        alt="#" width="110" /></div>
                                <a href="{{ url('/product/detail/' . $data->id) }}">{{ $data->product_name }}
                                    Rp.{{ number_format($data->price, '0', '.', '.') }},-</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Pants</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product_main">
                        @foreach ($pants as $data)
                            <div class="project_box mb-5">
                                <div class="dark_white_bg"><img src="{{ asset('storage/' . $data->image) }}"
                                        alt="#" width="110" /></div>
                                <a href="{{ url('/product/detail/' . $data->id) }}">{{ $data->product_name }}
                                    Rp.{{ number_format($data->price, '0', '.', '.') }},-</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Shoes</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product_main">
                        @foreach ($shoes as $data)
                            <div class="project_box mb-5">
                                <div class="dark_white_bg"><img src="{{ asset('storage/' . $data->image) }}"
                                        alt="#" width="110" /></div>
                                <a href="{{ url('/product/detail/' . $data->id) }}">{{ $data->product_name }}
                                    Rp.{{ number_format($data->price, '0', '.', '.') }},-</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
