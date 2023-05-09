@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5" id="load">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 style="font-family: arial;">{{ $data->name }}</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="row" id="some-element">
                            <div class="col-md-2 border-end border-2 border-primary">
                                <a href="profile?load=data" id="klik" data-value="1"
                                    class="text-dark text-hover d-block mb-4"
                                    style="text-decoration: none; font-weight: 500;"><i
                                        class="bi bi-person-circle me-2"></i>My Data</a>
                                <a href="profile?load=sandi" id="klik" data-value="1"
                                    class="text-dark text-hover d-block" style="text-decoration: none; font-weight: 500;"><i
                                        class="bi bi-gear-fill me-2"></i>Password</a>
                            </div>
                            @if (!isset($_GET['load']) || $_GET['load'] == 'data')
                                <div class="col-md-2">
                                    <div class="mb-3 text-center">
                                        <img src="{{ asset('storage/asset/pexels-photo-298863.jpeg') }}"
                                            class="img-profile p-1" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <p style="font-size: 14px; margin: 0;" class="fw-bold">Name :</p>
                                        <p style="font-size: 16px;" class="mb-0 fw-lighter">{{ $data->name }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p style="font-size: 14px; margin: 0;" class="fw-bold">Email :</p>
                                        <p style="font-size: 16px;" class="mb-0 fw-lighter">{{ $data->email }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p style="font-size: 14px; margin: 0;" class="fw-bold">Address :</p>
                                        <p style="font-size: 16px;" class="mb-0 fw-lighter">{{ $data->address }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p style="font-size: 14px; margin: 0;" class="fw-bold">Phone Number :</p>
                                        <p style="font-size: 16px;" class="mb-0 fw-lighter">{{ $data->phone }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-5">
                                    <h3 class="mb-4">Update Password</h3>
                                    <form action="{{ route('password', $data->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="mb-5">
                                            <p style="font-size: 14px" class="mb-1 fw-bolder">Your Password <sup
                                                    class="text-danger" style="font-size: 14px;"><b>*</b></sup></p>
                                            <input required type="password" autocomplete="Password" placeholder="Password"
                                                class="form-control" name="oldpass">
                                        </div>
                                        <div class="mb-3">
                                            <p style="font-size: 14px" class="mb-1 fw-bolder">New Password <sup
                                                    class="text-danger" style="font-size: 14px;"><b>*</b></sup></p>
                                            <input required type="password" autocomplete="New password"
                                                placeholder="New password" class="form-control" name="password">
                                        </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3" style="margin-top: 38.7%;">
                                        <p style="font-size: 14px" class="mb-1 fw-bolder">Confirm New Password <sup
                                                class="text-danger" style="font-size: 14px;"><b>*</b></sup></p>
                                        <input required type="password" autocomplete="Re-type password"
                                            placeholder="Re-type password" class="form-control" name="repassword">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if (!isset($_GET['load']) || $_GET['load'] == 'data')
                        <div class="card-footer text-end bg-white p-3">
                            <a href="#" class="rounded-pill button btn-box-yellow btn-box-xs"
                                data-bs-toggle="modal" data-bs-target="#profile"><i
                                    class="bi bi-pencil-square me-2"></i>Edit
                                Profile</a>
                        </div>
                    @else
                        <div class="card-footer text-end bg-white p-3">
                            <button class="rounded-pill button btn-box-yellow btn-box-xs" type="submit"><i
                                    class="bi bi-pencil-square me-2"></i>Edit
                                Password</button>
                        </div>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-blue" id="exampleModalLabel"><b>Update Profile</b></h4>
                    <img src="{{ asset('storage/asset/pngegg.png') }}" alt="" width="13%">
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('profile.update', $data->id) }}">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-1" style="font-size: 14px;">Name</p>
                                <input type="text" class="form-control form-control-sm" name="name"
                                    value="{{ $data->name }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-1" style="font-size: 14px;">Email</p>
                                <input type="email" class="form-control form-control-sm" name="email"
                                    value="{{ $data->email }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-1" style="font-size: 14px;">Address</p>
                                <input type="text" class="form-control form-control-sm" name="address"
                                    value="{{ $data->address }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="mb-1" style="font-size: 14px;">Phone</p>
                                <input type="number" class="form-control form-control-sm" name="phone"
                                    value="{{ $data->phone }}">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="rounded-pill button btn-box-blue btn-box-xs">
                                <b>Update</b>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // $(document).ready(function() {
        //     $('#klik').click(function() {
        //         var href = $(this).attr('href');
        //         var parts = href.split('?');
        //         var data = parts[1];
        //         $.ajax({
        //             type: "get",
        //             url: "localhost:8000/profile",
        //             data: "data",
        //             dataType: "dataType",
        //             success: function(response) {
        //                 if (data = 'load=sandi') {
        //                     window.history.pushState({}, '',
        //                         '/localhost:8000/profile?load=sandi');
        //                 } else {
        //                     window.history.pushState({}, '',
        //                         '/localhost:8000/profile?load=data');
        //                 }
        //             }
        //             error: function() {
        //                 $('#error-message').text('An error occurred');
        //             }
        //         });
        //     });
        // });
    </script>
@endsection
