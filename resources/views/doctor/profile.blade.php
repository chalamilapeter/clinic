@extends('layouts.common')

@section('page-title')
    Doctor Profile
@endsection

@include('doctor.components.profile')

@section('content')

    @include('components.profile')

@endsection
