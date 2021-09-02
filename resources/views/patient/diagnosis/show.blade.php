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
                Diagnosed by: <b>Dr. {{$diagnosis->user->doctor->first_name . " " . $diagnosis->user->doctor->last_name}}</b>
            </div>
        </div>

        <div class="card shadow mb-4 col-md-6 ml-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Diagnosis Results</h6>
            </div>
            <div class="card-body">
                <h4><b>Hospital Attendance</b></h4>
                Do you need to come to the hospital:
                @if($diagnosis->critical == "yes")
                    <b class="text-danger">Yes, at once</b>
                @else
                    <b class="text-success">No</b>
                @endif
                <hr>
                <h4><b>Laboratory Tests</b></h4>
                @if($diagnosis->tests == "no")
                    <b class="text-success">No tests required</b>
                @else
                    @if($diagnosis->lab_id === null)
                        <p class="bg-info p-2 rounded">
                            <small class="text-white ">You need to perform tests for further diagnosis. You are required to confirm the lab among the following approved labs to conduct your tests.</small>
                        </p>
                        <form action="{{route('confirm_lab')}}" method = "POST">
                            <div class="row my-4 d-flex ">
                                @csrf
                                <input type="hidden" name="diagnosis_id" value="{{$diagnosis->id}}">
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
                                    <button class="btn btn-success">Confirm</button>
                                </div>
                            </div>
                        </form>

                    @else
                        <p class="bg-success p-2 rounded">
                            <small class="text-white ">You need to perform tests. Confirmed lab: <b>{{$diagnosis->lab->name ." - " . $diagnosis->lab->location}}</b></small>
                        </p>
                    @endif
                    <p>Tests needed:</p>
                    <p class="text-white font-weight-bold ml-3 bg-secondary p-2 pl-4 rounded">{{$diagnosis->required_tests}}</p>
                @endif
                <hr>
                <h4><b>Medication</b></h4>
                    Status:
                @if($diagnosis->medication == 'stop' || $diagnosis->medication == 'continue')
                    @if($diagnosis->medication == 'continue')
                        <b class="text-success">Continue with the current Medication</b>
                    @else
                        <b class="text-danger">Stop with the current Medication</b>
                    @endif
                @else
                    @if($diagnosis->medication == 'add')
                        <b>Add to your current Medication</b>
                        <p class="py-2">Additions:
                    @else
                        <b>Change your current Medication</b>
                        <p class="py-2">Changes:
                    @endif
                    <span class="text-info font-weight-bold">{{$diagnosis->medication_description}}</span></p>
                @endif
                <hr>
                <h4><b>Suggestions & Instructions</b></h4>
                <p class="text-white bg-secondary p-2 rounded ml-2 ">{{$diagnosis->message}}</p>
            </div>
        </div>
    </div>


@endsection
