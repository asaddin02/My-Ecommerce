@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center mt-5 text-primary">-Contact Us-</h1>
        <div class="row mt-5 mb-5">
            <div class="col-md-4">
                <div class="card shadow" style="border-radius: 0;">
                    <div class="card-body">
                        <h3 class="text-primary"><i class="fa-solid fa-location-dot me-2"></i>Location</h3>
                        <p class="mb-0">Babat Rt/Rw 001/012, Randupitu, Gempol, Pasuruan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow" style="border-radius: 0;">
                    <div class="card-body">
                        <h3 class="text-primary"><i class="fa-solid fa-envelope me-2"></i>Email</h3>
                        <p class="mb-0">prasada.arif@gmail.com</p>
                        <p class="mb-0">asadin.co@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow" style="border-radius: 0;">
                    <div class="card-body">
                        <h3 class="text-primary"><i class="fa-brands fa-telegram me-2"></i>Join Telegram</h3>
                        <p class="mb-0">t.me/pemersatubangsa</p>
                        <p class="mb-0">t.me/indoviral</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card shadow" style="border-radius: 0;">
                    <div class="card-body">
                        <form action="{{ route('send') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputName" class="form-label">Name</label>
                                    <input type="text" id="inputName" style="border-radius:0;" class="form-control mb-3"
                                        name="name">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" id="inputEmail" style="border-radius:0;" class="form-control mb-3"
                                        name="email">
                                </div>
                            </div>
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" id="inputAddress" style="border-radius:0;" class="form-control mb-3"
                                name="address">
                            <label for="inputFeedback" class="form-label">Your Feedback</label>
                            <textarea name="feedback" style="border-radius:0;" class="form-control mb-3" id="inputFeedback" cols="20"
                                rows="5"></textarea>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
