@extends('layouts.common')

@section('page-title')
   New Lab - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection

@section('content')
    <form action="{{route('labs.store')}}" method="POST">
        @csrf
        <div class="row">

            <div class="card shadow mb-4 col-md-8 offset-md-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add a Laboratory</h6>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="email">Name</label>
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Location</label>
                        <input type="text" class="form-control form-control-user @error('location') is-invalid @enderror"
                               name="location" value="{{ old('location') }}">

                        @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Phone</label>
                        <input type="text" class="form-control form-control-user @error('phone') is-invalid @enderror"
                               name="phone" value="{{ old('phone') }}">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Website</label>
                        <input type="text" class="form-control form-control-user @error('website') is-invalid @enderror"
                               name="website" value="{{ old('website') }}">

                        @error('website')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class = "text-center">
                        <button type="submit" class="btn btn-info">
                            Save Laboratory
                        </button>
                    </div>

                </div>
            </div>
        </div>



    </form>


@endsection

