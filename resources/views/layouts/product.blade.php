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
                    <div class="project_box ">
                        <div class="dark_white_bg"><img src="{{ $data->image }}" alt="#" /></div>
                        <h3>{{ $data->name }} ${{ $data->price }}</h3>
                    </div>
                @endforeach
                <div class="col-md-12">
                    <a class="read_more" href="#">See More</a>
                </div>
            </div>
        </div>
    </div>
</div>
