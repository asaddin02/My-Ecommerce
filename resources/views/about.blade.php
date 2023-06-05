@extends('layouts.app')

@section('title')

@section('main')
    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="about_text">
                        <h3>The standard Lorem Ipsum </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. </p>
                        <a class="read_more" href="#">Read More</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="about_img">
                        <figure><img src="{{ asset('template/images/black-red.png') }}" alt="#"/></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
