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
                    <li>Patient Name: <span><b>{{$diagnosis->complaint->user->patient->first_name . " " . $diagnosis->complaint->user->patient->last_name}}</b></span></li>
                    <li>Appointment Date: <b>{{date('d M', strtotime($diagnosis->complaint->user->patient->appointment_date))}}</b></li>
                    <li>Age: <b>{{date('Y') - date('Y', strtotime($diagnosis->complaint->user->patient->birth_date))}} years</b></li>
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
                <h4><b>Laboratory Tests</b></h4>
                Tests needed:
                @if($diagnosis->tests == "no")
                    <b class="text-success">No tests required</b>
                @else
                    <b class="text-warning">Tests required</b>
                    <p class="pt-2">Recommended Laboratory:
                            <a href="#" class="text-info font-weight-bold">{{$diagnosis->lab->name ." - " . $diagnosis->lab->location}}</a>
                    </p>
                    <p>Tests needed:</p>
                    <p class="text-info font-weight-bold">{{$diagnosis->required_tests}}</p>
                @endif
                <hr>
                <h4><b>Hospital Attendance</b></h4>
                Do you need to come to the hospital:
                @if($diagnosis->critical == "yes")
                    <b class="text-danger">Yes, at once</b>
                @else
                    <b class="text-success">No</b>
                @endif
                <hr>
                <h4><b>Suggestions & Instructions</b></h4>
                <p class="text-info">{{$diagnosis->message}}</p>
            </div>
        </div>
    </div>


@endsection
