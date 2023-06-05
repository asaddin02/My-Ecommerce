@extends('layouts.app')

@section('title', 'Contact')

@section('main')
    <div id="contact" class="contact">
        <div class="con_bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <form id="request" class="main_form">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <input class="contactus" placeholder="Name" type="type" name="Name">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input class="contactus" placeholder="Phone Number" type="type" name="Phone Number">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input class="contactus" placeholder="Email" type="type" name="Email">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input class="contactus" placeholder="Address" type="type" name="Address">
                                </div>
                                <div class="col-md-12">
                                    <input class="contactusmess" placeholder="Message" type="type" Message="Name">
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
