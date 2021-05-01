@extends('layouts.common')

@section('page-title')
    Doctor
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')

    @include('components.profile')

@endsection
