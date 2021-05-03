@extends('layouts.common')

@section('page-title')
   New Lab Technician - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection

@section('content')
        @include('admin.components.user_form')

        <div class="row ">
            <div class="col-md-12">
                <label for="email">Laboratory</label>
                <select name="lab_id" class="form-control @error('lab_id') is-invalid @enderror">
                    <option selected disabled>Select</option>
                    @if ($labs->count()>0)
                        @foreach($labs as $lab)
                            <option value="{{$lab->id}}">{{$lab->name}}</option>
                        @endforeach
                    @else
                    @endif
                </select>
                @error('lab_id')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
        </div>
        <div class="m-3">
            <button class="btn btn-primary">
                Save Technician
            </button>
        </div>
        </div>
        </div>
        </div>
        </form>
@endsection

