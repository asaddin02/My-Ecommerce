@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <p class="d-inline fw-bold fs-5">Limited time offer: Save 70% on select items.</p>
                <p class="d-inline fw-bold fs-5">Shop our latest collection of products now!</p>
                <p class="d-inline fw-bold fs-5">Get the best deals on your favorite brands.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset("storage/asset/sara-kurfess-5epnzwsphl0-unsplash.jpg") }}" alt="" width="50%">
            </div>
        </div>
    </div>
    {{-- content --}}
@endsection
