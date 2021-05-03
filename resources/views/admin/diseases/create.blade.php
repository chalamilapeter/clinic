@extends('layouts.common')

@section('page-title')
   New Disease - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection

@section('content')
    <form action="{{route('diseases.store')}}" method="POST">
        @csrf
        <div class="row">

            <div class="card shadow mb-4 col-md-8 offset-md-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add a disease</h6>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="email">Common Name</label>
                        <input type="text" class="form-control form-control-user @error('common_name') is-invalid @enderror"
                               name="common_name" value="{{ old('common_name') }}">

                        @error('common_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="text">Scientific Name</label>
                        <input type="text" class="form-control form-control-user @error('scientific_name') is-invalid @enderror"
                                name="scientific_name" value="{{ old('scientific_name') }}">

                        @error('scientific_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="text">Months Interval</label>
                        <input type="text" class="form-control form-control-user @error('months_interval') is-invalid @enderror"
                               name="months_interval" value="{{ old('months_interval') }}">

                        @error('months_interval')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class = "text-center">
                        <button type="submit" class="btn btn-info">
                            Save Disease
                        </button>
                    </div>

                </div>
            </div>
        </div>



    </form>


@endsection

