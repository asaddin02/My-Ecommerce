@extends('layouts.app')

@section('title', 'Category Table')

@section('main')
    <button type="button" class="table-btn m-2" data-bs-toggle="modal" data-bs-target="#addCategory">
        Add
        <i class="fa-solid fa-file-circle-plus"></i>
    </button>
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body">
                    <div class="d-flex flex-column align-items-center mb-2">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Category
                        </h1>
                    </div>
                    <form method="POST" action="{{ route('category-table.store') }}">
                        @csrf
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Name</p>
                                    <input id="nameAdd" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name" required
                                        placeholder="Category Name" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-5">
                                <button type="submit" class="order px-4" id="saveEditProduct">Add</button>
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
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $index => $data)
                <tr>
                    <th scope="row">{{ $index + $datas->firstItem() }}</th>
                    <td>{{ $data->name }}</td>
                    <td class="d-flex">
                        <button type="button" class="table-btn px-4" data-bs-toggle="modal"
                            data-bs-target="#editCategory{{ $data->id }}">
                            Edit
                            <i class="fa-solid fa-file-pen"></i>
                        </button>
                        <form action="{{ route('category.destroy', $data->id) }}">
                            <input type="submit" class="table-delete-btn px-4" name="id" value="Delete">
                        </form>
                    </td>
                </tr>
                <div class="modal fade" id="editCategory{{ $data->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0">
                            <div class="modal-body">
                                <div class="d-flex flex-column align-items-center mb-2">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product {{ $data->name }}
                                    </h1>
                                </div>
                                <form method="POST" action="{{ route('category-table.update', $data->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <p class="mb-1" style="font-size: 14px;">Name</p>
                                                <input id="nameEdit" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ $data->name }}" required placeholder="Category Name"
                                                    autocomplete="name" autofocus>
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
