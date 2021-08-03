@extends('layouts.common')

@section('page-title')
    Post Final Results- Doctor
@endsection

@include('doctor.components.profile')

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
            </div>
        </div>

        <div class="card shadow mb-4 col-md-6 ml-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Diagnosis</h6>
            </div>
            <div class="card-body">
            
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>

        document.getElementById('medication').addEventListener('change', showMedform)
        function showMedform(){
            if(document.getElementById('medication').value === "change" || document.getElementById('medication').value === "add"){
                document.getElementById('medication_description').className = "form-group d-block"
            }else{
                document.getElementById('medication_description').className = "form-group d-none"
                document.getElementById('medication_description').value = ""
            }
        }

        document.getElementById('tests').addEventListener('change', showTestForm)
        function showTestForm(){
            if(document.getElementById('tests').value === "yes"){
                document.getElementById('required_tests').className = "form-group d-block"
            }else{
                document.getElementById('required_tests').className = "form-group d-none"
                document.getElementById('required_tests').value = ""
            }
        }


    </script>
@endsection
