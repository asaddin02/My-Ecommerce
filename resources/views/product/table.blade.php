@extends('layouts.app')

@section('title', 'Product Table')

@section('main')
    <button type="button" class="table-btn m-2" data-bs-toggle="modal" data-bs-target="#addProduct">
        Add
        <i class="fa-solid fa-file-circle-plus"></i>
    </button>
    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body">
                    <div class="d-flex flex-column align-items-center mb-2">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Product
                        </h1>
                    </div>
                    <form method="POST" action="{{ route('product-table.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Category</p>
                                    <select class="form-control" name="category_id" id="categoryProductAdd">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Name</p>
                                    <input id="nameAdd" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name" required
                                        placeholder="Name" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Price</p>
                                    <input id="priceAdd" type="number"
                                        class="form-control @error('name') is-invalid @enderror" name="price" required
                                        placeholder="Price" autocomplete="price" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Description</p>
                                    <input id="descAdd" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="desc" required
                                        placeholder="Description" autocomplete="desc" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Image</p>
                                    <input id="imageAdd" type="file"
                                        class="form-control @error('name') is-invalid @enderror" name="image" required
                                        placeholder="Product Name" autocomplete="image" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-5">
                                <button type="submit" class="order px-4" id="saveEditProduct">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-light my-4 overflow-scroll">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Detail</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $index => $data)
                <tr>
                    <th scope="row">{{ $index + $datas->firstItem() }}</th>
                    <td>{{ $data->category->name }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->price }}</td>
                    <td>
                        <button type="button" class="table-btn px-4" data-bs-toggle="modal"
                            data-bs-target="#detailProduct{{ $data->id }}">
                            Detail
                            <i class="fa-solid fa-caret-down"></i>
                        </button>
                    </td>
                    <td class="d-flex">
                        <button type="button" class="table-btn px-4" data-bs-toggle="modal"
                            data-bs-target="#editProduct{{ $data->id }}">
                            Edit
                            <i class="fa-solid fa-file-pen"></i>
                        </button>
                        <form action="{{ route('product.destroy', $data->id) }}">
                            @csrf
                            <input type="submit" class="table-delete-btn px-4" value="Delete" onclick="return confirm('Are you sure you want to delete?')">
                        </form>
                    </td>
                </tr>
                <div class="modal fade" id="detailProduct{{ $data->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0">
                            <div class="modal-body">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><span>Product Name :
                                    </span>{{ $data->name }}</h1>
                                <p>Description :</p>
                                <p class="my-2">{{ $data->desc }}</p>
                                <p>Image :</p>
                                <img src="{{ asset('storage/'.$data->image) }}" alt="Product Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editProduct{{ $data->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0">
                            <div class="modal-body">
                                <div class="d-flex flex-column align-items-center mb-2">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product {{ $data->name }}
                                    </h1>
                                </div>
                                <form method="POST" action="{{ route('product-table.update', $data->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <p class="mb-1" style="font-size: 14px;">Category</p>
                                                <select class="form-control" name="category_id" id="categoryProductEdit">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" @selected($data->category_id == $category->id)>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <p class="mb-1" style="font-size: 14px;">Name</p>
                                                <input id="nameEdit" type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="name" value="{{ $data->name }}" required
                                                    placeholder="Product Name" autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <p class="mb-1" style="font-size: 14px;">Price</p>
                                                <input id="priceEdit" type="number"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="price" value="{{ $data->price }}" required
                                                    placeholder="Product Name" autocomplete="price" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <p class="mb-1" style="font-size: 14px;">Description</p>
                                                <input id="descEdit" type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="desc" value="{{ $data->desc }}" required
                                                    placeholder="Product Name" autocomplete="desc" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <p class="mb-1" style="font-size: 14px;">Image</p>
                                                <input id="imageEdit" type="file"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="image" required placeholder="Product Name"
                                                    autocomplete="image" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <button type="submit" class="order px-4" id="saveEditProduct">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
    <div class="px-5 py-2">
        @isset($datas)
        {{ $datas->links('vendor.pagination.bootstrap-5') }}
        @endisset
    </div>
@endsection
