@extends('layouts.app')

@section('title', 'Contact')

@section('main')
    <div id="contact" class="contact mb-5">
        <div class="con_bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <form id="request" class="main_form">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <input class="contactus" required placeholder="Name" type="type" name="Name">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input class="contactus" required placeholder="Phone Number" type="type" name="Phone Number">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input class="contactus" required placeholder="Email" type="type" name="Email">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input class="contactus" required placeholder="Address" type="type" name="Address">
                                </div>
                                <div class="col-md-12">
                                    <input class="contactusmess" required placeholder="Message" type="type" Message="Name">
                                </div>
                                <div class="col-md-12">
                                    <button class="send_btn">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
