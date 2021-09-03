@extends('layouts.common')

@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
@endsection

@section('page-title')
    Results - Patient
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
                    <li>Patient Name: <span><b>{{$result->complaint->patient->first_name . " " . $result->complaint->patient->last_name}}</b></span></li>
                    <li>Appointment Date: <b>{{date('d M', strtotime($result->complaint->patient->appointment_date))}}</b></li>
                    <li>Age: <b>{{date('Y') - date('Y', strtotime($result->complaint->patient->birth_date))}} years</b></li>
                    <li>Complaint: <br> <b class="text-info">{{$result->complaint->message}}</b></li>
                </ul>
                <hr>
                Diagnosed by: <b>Dr. {{$result->complaint->patient->doctor->first_name . " " . $result->complaint->patient->doctor->last_name}}</b>
            </div>
            @if($result->diagnosis)
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Complaint log</h6>
                </div>
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
                @else
                    <p class="text-white bg-success rounded p-3">Laboratory tests are <b>not</b> required.</p>
                @endif
            @endif
        </div>

        <div class="card shadow mb-4 col-md-6 ml-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Final Results</h6>
            </div>
            <div class="card-body">
                <h6><b>Hospital presence:</b></h6>
                @if($result->critical === 'yes')
                    <p class="text-white bg-danger rounded p-3 mt-5">You <b>have</b> to come to the hospital.</p>
                @else
                    <p class="text-white bg-success rounded p-3">You <b>don't</b> have to come to the hospital.</p>
                    <hr>
                    <h6><b>Laboratory tests</b></h6>
                    <p class="text-white bg-success rounded p-3">Laboratory tests are <b>not</b> required.</p>
                    <hr>
                    <h6><b>Medication:</b></h6>
                    @if($result->medication === 'continue')
                        <p class="text-white bg-success rounded p-3"><b>Proceed</b> with the current medication.</p>
                    @elseif($result->medication === 'stop')
                        <p class="text-white bg-danger rounded p-3"><b>Stop</b> the current medication.</p>
                    @elseif($result->medication === 'change')
                        <p class="text-white bg-info rounded p-3"><b>Change</b> the current medication.</p>
                        Changes: <p class="text-white bg-info rounded p-3">{{$result->prescription}}</p>
                    @elseif($result->medication === 'add')
                        <p class="text-white bg-danger rounded p-3"><b>Add</b> to the current medication.</p>
                        Additions: <p class="text-white bg-info rounded p-3">{{$result->prescription}}</p>
                    @endif
                    <hr>
                    <h6><b>General Message:</b></h6>
                    <p class="bg-secondary rounded p-3 text-white">{{$result->message}}</p>
                    <hr>
                    <h6><b>Overall condition</b></h6>
                    <p class="bg-secondary rounded p-3 text-white">
                        {{$result->condition}}
                    </p>
                    <hr>
                    <h6><b>Next appointment:</b></h6>
                    <p class="bg-secondary rounded p-3 text-white">{{date('d F Y', strtotime($result->next_appointment))}}</p>
                @endif
            </div>
        </div>
    </div>


@endsection
