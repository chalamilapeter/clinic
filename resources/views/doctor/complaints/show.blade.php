@extends('layouts.common')

@section('page-title')
    Show complaint- Doctor
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')

    <div class="row">
        <div class="card shadow mb-4 col-md-4 offset-md-1">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Complaint log</h6>
            </div>
            <div class="card-body">
                <ul style="line-height: 40px">
                    <li>Patient Name: <span><b>{{$complaint->user->patient->first_name . " " . $complaint->user->patient->last_name}}</b></span></li>
                    <li>Appointment Date: <b>{{date('d M', strtotime($complaint->user->patient->appointment_date))}}</b></li>
                    <li>Age: <b>{{date('Y') - date('Y', strtotime($complaint->user->patient->birth_date))}} years</b></li>
                    <li>Complaint: <br> <b class="text-info">{{$complaint->message}}</b></li>
                </ul>
            </div>
        </div>

        <div class="card shadow mb-4 col-md-6 ml-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Diagnosis</h6>
            </div>
            <div class="card-body">
                @if($complaint->status == "undiagnosed")
                    <form action="{{route('diagnosis.store')}}" method="post" id="diagnosis-form">
                        @csrf
                        <input type="hidden" name="complaint_id" value="{{$complaint->id}}">
                        <input type="hidden" name="user_id" value="{{auth()->id()}}">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Medication</h6>
                        </div>
                        <hr>
                        <div class="form-group">

                            <select name="medication" id="medication" class="form-control @error('medication') is-invalid @enderror">
                                <option disabled selected>Select</option>
                                <option value="continue">Continue with current</option>
                                <option value="stop">Stop the current medication</option>
                                <option value="add">Add your medication with</option>
                                <option value="change">Change medication</option>
                            </select>

                            @error('medication')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group d-none" id="medication_description">
                            <label for="">Describe medication instructions</label>
                            <textarea name="medication_description" id="" cols="30" rows="5" class="form-control  @error('medication_description') is-invalid @enderror ">
                        </textarea>

                            @error('medication_description')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <hr>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Laboratory Tests</h6>
                            <small>If the patient requires tests or not</small>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Tests required?</label>
                            <select name="tests" id="tests" class="form-control @error('tests') is-invalid @enderror">
                                <option disabled selected>Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                            @error('tests')
                            <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                            @enderror
                        </div>

                        <div class="form-group d-none" id="required_tests">
                            <div class="my-2">
                                <label for="">Recommend a lab</label>
                                <select name="lab_id" id="lab_id" class="form-control @error('lab_id') is-invalid @enderror">
                                    <option disabled selected>Select</option>
                                    @if($labs->count()>0)
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
                            <label for="">Describe The Required tests</label>
                            <textarea name="required_tests" id="required_tests" cols="30" rows="5" class="form-control  @error('required_tests') is-invalid @enderror ">
                       </textarea>

                            @error('required_tests')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <hr>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Require Hospital Presence</h6>
                            <small>If the patient has to come to the hospital or not</small>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Come to Hospital?</label>
                            <select name="critical" id="critical" class="form-control @error('critical') is-invalid @enderror">
                                <option disabled selected>Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                            @error('critical')
                            <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                            @enderror
                        </div>

                        <hr>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">General Message</h6>
                            <small>Additional Information, Requirements, Suggestions</small>
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Message</label>
                            <textarea name="message" id="" cols="30" rows="5" class="form-control @error('message') is-invalid @enderror" ></textarea>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                            @enderror
                        </div>
                        <a  class="btn btn-primary" data-toggle="modal" data-target="#diagnosisconfirm">
                            Submit
                        </a>
                    </form>

                @else
                    <div class="d-flex align-items-center justify-content-center h-50">
                        <h3>Complaint already diagnosed!</h3>
                    </div>
                @endif
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
