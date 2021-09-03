@extends('layouts.common')

@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
@endsection

@section('page-title')
    Diagnosis - Patient
@endsection

@include('patient.components.profile')

@section('content')

    <div class="row">
        <div class="card shadow mb-4 col-md-4 offset-md-1">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Complaint log</h6>
            </div>
            <div class="card-body">
                <ul style="line-height: 40px">
                    <li>Patient Name: <span><b>{{$diagnosis->complaint->patient->first_name . " " . $diagnosis->complaint->patient->last_name}}</b></span></li>
                    <li>Appointment Date: <b>{{date('d M', strtotime($diagnosis->complaint->patient->appointment_date))}}</b></li>
                    <li>Age: <b>{{date('Y') - date('Y', strtotime($diagnosis->complaint->patient->birth_date))}} years</b></li>
                    <li>Complaint: <br> <b class="text-info">{{$diagnosis->complaint->message}}</b></li>
                </ul>
                <hr>
                Diagnosed by: <b>Dr. {{$diagnosis->complaint->patient->doctor->first_name . " " . $diagnosis->complaint->patient->doctor->last_name}}</b>
            </div>
        </div>

        <div class="card shadow mb-4 col-md-6 ml-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Diagnosis Results</h6>
            </div>
            <div class="card-body">
                <h6><b>Hospital presence</b></h6>
                <p class="text-white bg-success rounded p-3">You <b>don't</b> have to come to the hospital.</p>
                <hr>
                <h6><b>Laboratory tests</b></h6>
                @if($diagnosis->tests === 'yes')
                    <p class="text-white bg-info rounded p-3">Laboratory tests are required for further diagnosis.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <b> Tests:</b>
                            <p class="text-white bg-secondary rounded p-3">{{$diagnosis->required_tests}}</p>
                        </div>
                        <div class="col-md-6">
                            <b>Lab:</b>
                            <p class="text-white bg-secondary rounded p-3">{{$diagnosis->lab->name ." - " . $diagnosis->lab->location ?? "Unconfirmed"}}</p>
                        </div>
                    </div>
                    @if($diagnosis->lab_id === null)
                        <p class="bg-info p-2 rounded">
                            <small class="text-white font-weight-bold">You are required to confirm the lab among the following approved labs to conduct your tests.</small>
                        </p>
                        <form action="{{route('confirm_lab')}}" method = "POST">
                            @csrf
                            <input type="hidden" name="diagnosis_id" value="{{$diagnosis->id}}">
                            <div class="row ">
                                <div class="col-md-8">
                                    <label for="">Choose a lab</label>
                                    <select name="lab_id" id="lab_id" class="form-control @error('lab_id') is-invalid @enderror">
                                        <option disabled selected>Select</option>
                                        @if($labs->count()>0)
                                            @foreach($labs as $lab)
                                                <option value="{{$lab->id}}">{{$lab->name . ' - ' . $lab->location}}</option>
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
                                <div class="col-md-4">
                                    <label for="" class="d-block">Confirm</label>
                                    <button class="btn btn-success w-100">Confirm</button>
                                </div>
                            </div>
                        </form>
                    @endif
                @else
                    <p class="text-white bg-success rounded p-3">Laboratory tests are <b>not</b> required.</p>
                @endif
                <hr>
            </div>
        </div>
    </div>


@endsection
