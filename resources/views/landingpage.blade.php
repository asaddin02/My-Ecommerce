@extends('layouts.template')

@section('title', 'Landing Page')

@section('main')
    
    @include('layouts.about')

    @include('layouts.trending')

    @include('layouts.discount')

    @include('layouts.hottest')

    @include('layouts.contact')

    @include('layouts.client')

    @include('layouts.info')

@endsection
