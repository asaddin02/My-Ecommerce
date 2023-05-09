@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-4 bg-white ">
                        <h4 class="text-blue d-inline"><b>Register</b></h5>
                            <img src="{{ asset('storage/asset/pngegg.png') }}" alt="" class="position-absolute"
                                style="top: 15px; right: 15px;" width="10%">
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">

                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Name</p>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required placeholder="Your name" autocomplete="name"
                                        autofocus>

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
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required placeholder="Email address"
                                        autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Password</p>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required placeholder="Password" autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Confirm</p>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required placeholder="Confirm password"
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Address</p>
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address" required
                                        placeholder="Your address" autocomplete="new-address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-12">
                                    <p class="mb-1" style="font-size: 14px;">Phone Number</p>
                                    <input id="phone" type="number"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone" required
                                        placeholder="Your number phone" autocomplete="new-phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                    </div>
                    <div class="card-footer bg-white p-3">
                        <div class="row">
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary rounded-pill px-4">
                                    <b>Register</b>
                                </button>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
