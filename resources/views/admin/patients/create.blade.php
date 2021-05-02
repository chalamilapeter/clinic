@extends('layouts.common')

@section('page-title')
   New Patient - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')
    @include('admin.components.user_form')
   <div class="row ">
       <div class="col-md-6">
           <label for="">Disease</label>
           <select name="disease_id" class="form-control @error('disease_id') is-invalid @enderror">
               <option selected disabled>Select</option>
               @if($diseases->count()>0)
                   @foreach($diseases as $disease)
                       <option value="{{$disease->id}}">{{+1}}. {{ $disease->common_name }}</option>
                   @endforeach
               @else
                   <option disabled> None </option>
               @endif
           </select>
           @error('disease_id')
           <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
           @enderror
       </div>

       <div class="col-md-6">
           <label for="">Appointment date:</label>
           <input type="date" name="appointment_date" value="{{old('appointment_date')}}" class="form-control form-control-user  @error('appointment_date') is-invalid @enderror">
           @error('appointment_date')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
           @enderror
       </div>
   </div>
    <div class="row ">
        <div class="col-md-6">
            <label for="">Doctor</label>
            <select name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror">
                <option selected disabled>Select</option>
                @if($doctors->count()>0)
                    @foreach($doctors as $doctor)
                        <option value="{{$doctor->id}}">{{+1}} Dr. {{$doctor->doctor->first_name . " " .$doctor->doctor->last_name  }}</option>
                    @endforeach
                @else
                    <option disabled> None </option>
                @endif
            </select>
            @error('doctor_id')
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

