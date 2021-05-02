@extends('layouts.common')

@section('page-title')
   New Patient - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')
    @include('admin.components.user_form')
@endsection
