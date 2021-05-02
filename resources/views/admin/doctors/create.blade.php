@extends('layouts.common')

@section('page-title')
   New Doctor - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')
    @include('admin.components.user_form')
   <div class="row ">
       <div class="col-md-12">
           <label for="">Specialty</label>
           <input type="text" name="speciality" value="{{old('speciality')}}" class="form-control form-control-user  @error('speciality') is-invalid @enderror">
           @error('speciality')
           <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
           @enderror
       </div>
   </div>
    <div class="m-3">
    <button class="btn btn-primary">
        Save User
    </button>
    </div>
    </div>
    </div>
    </div>
    </form>
@endsection

