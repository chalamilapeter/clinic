@extends('layouts.common')

@section('page-title')
   New Pharmacist - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection

@section('content')
        @include('admin.components.user_form')

        <div class="row ">
            <div class="col-md-12">
                <label for="email">Pharmacy</label>
                <select name="pharmacy_id" class="form-control @error('pharmacy_id') is-invalid @enderror">
                    <option selected disabled>Select</option>
                    @if ($pharmacies->count()>0)
                        @foreach($pharmacies as $pharmacy)
                            <option value="{{$pharmacy->id}}">{{$pharmacy->name}}</option>
                        @endforeach
                    @else
                    @endif
                </select>
                @error('pharmacy_id')
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

