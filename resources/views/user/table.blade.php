@extends('layouts.app')

@section('title', 'User Table')

@section('main')
    <button type="button" class="table-btn m-2" data-bs-toggle="modal" data-bs-target="#addUser">
        Add
        <i class="fa-solid fa-file-circle-plus"></i>
    </button>
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body">
                    <div class="d-flex flex-column align-items-center mb-2">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New User
                        </h1>
                    </div>
                    <form method="POST" action="{{ route('user-table.store') }}">
                        @csrf
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Name</p>
                                    <input id="nameUserAdd" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name" required
                                        placeholder="User Name" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Email</p>
                                    <input id="emailUserAdd" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email" required
                                        placeholder="Email" autocomplete="name" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Role</p>
                                    <select class="form-control @error('role') is-invalid @enderror" name="role"
                                        id="roleUserAdd" required>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Password</p>
                                    <input id="passwordUserAdd" type="password"
                                        class="form-control @error('name') is-invalid @enderror" name="password" required
                                        placeholder="Email" autocomplete="name" autofocus>
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
                <th scope="col">Email</th>
                <th scope="col">Email Verified</th>
                <th scope="col">Role</th>
                <th scope="col">Detail</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $index => $data)
                <tr>
                    <th scope="row">{{ $index + $datas->firstItem() }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        @if (isset($data->email_verified_at))
                            <span class="text-success">Verified<i class="fa-solid fa-circle-check"></i></span>
                        @else
                            <span class="text-danger">Not Verified<i class="fa-solid fa-circle-xmark"></i></span>
                        @endif
                    </td>
                    <td>{{ $data->role }}</td>
                    <td>
                        <button type="button" class="table-btn px-4" data-bs-toggle="modal"
                            data-bs-target="#detailUser{{ $data->id }}">
                            Detail
                            <i class="fa-solid fa-caret-down"></i>
                        </button>
                    </td>
                    <td class="d-flex">
                        @if (Auth::user()->name == $data->name)
                            <span class="text-success">You're logined!</span>
                        @else
                            <form action="{{ route('user.destroy', $data->id) }}">
                                @csrf
                                <input type="submit" class="table-delete-btn px-4 mx-2" value="Banned"
                                    onclick="return confirm('Are you sure you want to banned?')">
                            </form>
                            <form action="{{ route('user.destroy', $data->id) }}">
                                @csrf
                                <input type="submit" class="table-delete-btn px-4" value="Delete"
                                    onclick="return confirm('Are you sure you want to delete?')">
                            </form>
                        @endif
                    </td>
                </tr>
                <div class="modal fade" id="detailUser{{ $data->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0">
                            <div class="modal-body">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><span>Detail User :
                                    </span>{{ $data->name }}</h1>
                                @if (isset($data->photo))
                                    <img src="{{ asset('storage/' . $data->photo) }}" alt="Profile Picture">
                                @else
                                    <img src="{{ asset('template/default/image/profile/profile-user-black.png') }}"
                                        alt="#" width="50">
                                @endif
                                <p>Address :</p>
                                @if (isset($data->address))
                                    <p class="my-2">{{ $data->address }}</p>
                                @else
                                    <p class="text-info">This user have no address<i class="fa-solid fa-circle-info"></i>
                                    </p>
                                @endif
                                <p>Image :</p>
                                @if (isset($data->phone))
                                    <p class="my-2">{{ $data->phone }}</p>
                                @else
                                    <p class="text-info">This user have no phone number<i
                                            class="fa-solid fa-circle-info"></i></p>
                                @endif
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
