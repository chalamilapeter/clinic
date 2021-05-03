@extends('layouts.common')

@section('page-title')
   New Role - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection

@section('content')
    <form action="{{route('roles.store')}}" method="POST">
        @csrf
        <div class="row">

            <div class="card shadow mb-4 col-md-8 offset-md-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add a Role</h6>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="email">Role Name</label>
                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class = "text-center">
                        <button type="submit" class="btn btn-info">
                            Save Role
                        </button>
                    </div>

                </div>
            </div>
        </div>



    </form>


@endsection

