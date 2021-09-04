@extends('layouts.common')

@section('page-title')
    Show complaint- Doctor
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
                    <li>Patient Name: <span><b>{{$complaint->patient->first_name . " " . $complaint->patient->last_name}}</b></span></li>
                    <li>Appointment Date: <b>{{date('d M', strtotime($complaint->created_at))}}</b></li>
                    <li>Age: <b>{{date('Y') - date('Y', strtotime($complaint->patient->birth_date))}} years</b></li>
                    <li>Complaint: <br> <p class="text-white mt-2 bg-secondary p-3 rounded ">{{$complaint->message}}</p></li>
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
                        <input type="hidden" name="patient_id" value="{{$complaint->patient_id}}">

                        <div class="hosp">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Require Hospital Presence</h6>
                                <small>If the patient has to come to the hospital or not</small>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Come to Hospital?</label>
                                <select name="critical" id="critical" class="form-control @error('critical') is-invalid @enderror">
                                    <option disabled selected>Select</option>
                                    <option value="yes" {{old('critical') === 'yes' ? 'selected' : ''}}>Yes</option>
                                    <option value="no" {{old('critical') === 'no' ? 'selected' : ''}}>No</option>
                                </select>
                                @error('critical')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="d-none" id="test">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Laboratory Tests</h6>
                                <small>If the patient requires tests or not</small>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Tests required?</label>
                                <select name="tests" id="tests" class="form-control @error('tests') is-invalid @enderror">
                                    <option disabled selected>Select</option>
                                    <option value="yes" {{old('tests') === 'yes' ? 'selected' : ''}}>Yes</option>
                                    <option value="no" {{old('tests') === 'no' ? 'selected' : ''}}>No</option>
                                </select>
                                @error('tests')
                                <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                                @enderror
                            </div>

                            <div class="form-group d-none" id="required_tests">
                                <label for="">Describe The Required tests</label>
                                <textarea name="required_tests" id="required_tests" cols="30" rows="5" class="form-control  @error('required_tests') is-invalid @enderror ">
                                    {{old('required_tests')}}
                                </textarea>

                                @error('required_tests')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <hr>
                        </div>

                        <div class="meds d-none" id="meds">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Medication</h6>
                            </div>
                            <hr>
                            <div class="form-group">
                                <select name="medication" id="medication" class="form-control @error('medication') is-invalid @enderror">
                                    <option disabled selected>Select</option>
                                    <option value="continue" {{old('medication') === 'continue' ? 'selected' : ''}}>Continue with current</option>
                                    <option value="stop" {{old('medication') === 'stop' ? 'selected' : ''}}>Stop the current medication</option>
                                    <option value="add" {{old('medication') === 'add' ? 'selected' : ''}}>Add your medication with</option>
                                    <option value="change" {{old('medication') === 'change' ? 'selected' : ''}}>Change medication</option>
                                </select>
                                @error('medication')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group d-none" id="medication_description">
                                <label for="">Describe medication instructions</label>
                                <textarea name="prescription" id="" cols="30" rows="5" class="form-control  @error('medication_description') is-invalid @enderror ">
                                     {{old('prescription')}}
                                </textarea>

                                @error('medication_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="general d-none" id="general">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">General Message</h6>
                                <small>Additional Information, Requirements, Suggestions</small>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Message</label>
                                <textarea name="message" id="" cols="30" rows="5" class="form-control @error('message') is-invalid @enderror" >{{old('message')}}</textarea>

                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                            <hr>
                        </div>

                        <div class="next_appointment d-none" id="general">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Next appointment</h6>
                                <small>This date is automatically filled by the system based on the disease of the patient. If you wish to change it, select another date.</small>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Next appointment</label>
                                <input type="date" name="next_appointment" class="form-control @error('next_appointment') is-invalid @enderror" value="{{ $date}}" />

                                @error('next_appointment')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                            <hr>
                        </div>

                        <div class="condition d-none" id="general">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Overall Condition</h6>
                                <small>What would you say is the overall condition of this patient based on this clinic?</small>
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Overall condition</label>
                                <select name="condition" class="form-control @error('condition') is-invalid @enderror" >
                                    <option selected disabled>...</option>
                                    <option value="Critical" {{old('condition') === 'Critical' ? 'selected' : ''}}>Critical</option>
                                    <option value="Bad" {{old('condition') === 'Bad' ? 'selected' : ''}}>Bad</option>
                                    <option value="Normal" {{old('condition') === 'Normal' ? 'selected' : ''}}>Normal</option>
                                    <option value="Good" {{old('condition') === 'Good' ? 'selected' : ''}}>Good</option>
                                    <option value="Excellent" {{old('condition') === 'Excellent' ? 'selected' : ''}}>Excellent</option>
                                </select>
                                @error('condition')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                            <hr>
                        </div>
                        <a  class="btn btn-primary button d-none" data-toggle="modal" data-target="#diagnosisconfirm" id="submit">
                            Submit
                        </a>
                    </form>

                @else
                    <h5><b>You diagnosed this complaint as follows:</b></h5>
                    <hr>
                    @if($complaint->result)
                     <h6><b>Hospital presence:</b></h6>
                        @if($complaint->result->critical === 'yes')
                            <p class="text-white bg-danger rounded p-3 mt-5">The patient <b>has</b> to come to the hospital.</p>
                        @else
                            <p class="text-white bg-success rounded p-3">The patient <b>doesn't</b> have to come to the hospital.</p>
                            <hr>
                            <h6><b>Laboratory tests</b></h6>
                            <p class="text-white bg-success rounded p-3">Laboratory tests are <b>not</b> required.</p>
                            <hr>
                            <h6><b>Medication:</b></h6>
                            @if($complaint->result->medication === 'continue')
                                <p class="text-white bg-success rounded p-3"><b>Proceed</b> with the current medication.</p>
                            @elseif($complaint->result->medication === 'stop')
                                <p class="text-white bg-danger rounded p-3"><b>Stop</b> the current medication.</p>
                            @elseif($complaint->result->medication === 'change')
                                <p class="text-white bg-info rounded p-3"><b>Change</b> the current medication.</p>
                                Changes: <p class="text-white bg-info rounded p-3">{{$complaint->result2->prescription}}</p>
                            @elseif($complaint->result->medication === 'add')
                                <p class="text-white bg-danger rounded p-3"><b>Add</b> to the current medication.</p>
                                Additions: <p class="text-white bg-info rounded p-3">{{$complaint->result->prescription}}</p>
                            @endif
                            <hr>
                            <h6><b>General Message:</b></h6>
                            <p class="bg-secondary rounded p-3 text-white">{{$complaint->result->message}}</p>
                            <hr>
                            <h6><b>Overall condition</b></h6>
                            <p class="bg-secondary rounded p-3 text-white">
                                {{$complaint->result->condition}}
                            </p>
                            <hr>
                            <h6><b>Next appointment:</b></h6>
                            <p class="bg-secondary rounded p-3 text-white">{{date('d F Y', strtotime($complaint->result->next_appointment))}}</p>
                        @endif
                    @elseif($complaint->diagnosis)
                        <h6><b>Hospital presence</b></h6>
                        <p class="text-white bg-success rounded p-3">The patient <b>doesn't</b> have to come to the hospital.</p>
                        <hr>
                        <h6><b>Laboratory tests</b></h6>
                        @if($complaint->diagnosis->tests === 'yes')
                            <p class="text-white bg-info rounded p-3">Laboratory tests are required for further diagnosis.</p>
                            <div class="row">
                                <div class="col-md-6">
                                   <b> Tests:</b>
                                    <p class="text-white bg-secondary rounded p-3">{{$complaint->diagnosis->required_tests}}</p>
                                </div>
                                <div class="col-md-6">
                                    <b>Lab:</b>
                                    <p class="text-white bg-secondary rounded p-3">{{$complaint->diagnosis->lab->name ?? "Unconfirmed"}}</p>
                                </div>
                            </div>
                        @else
                            <p class="text-white bg-success rounded p-3">Laboratory tests are <b>not</b> required.</p>
                            <br>
                        @endif
                    @endif
                @endif
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#critical').change(function () {
                if($(this).val() === "yes"){
                    $('#submit').text('Save Final Result')
                    $('.button').removeClass('d-none')
                    $('#test').addClass('d-none')
                }
                else {
                    $('.button').addClass('d-none')
                    $('#submit').text('Submit')
                    $('#test').removeClass('d-none').change(function () {
                        $('.button').removeClass('d-none')

                        if ($('#tests').val() === "yes"){
                            $('#required_tests').removeClass('d-none')
                            $('#submit').text('Save diagnosis & wait for tests')
                            $('#meds').addClass('d-none')
                            $('#general').addClass('d-none')
                            $('.condition').addClass('d-none')
                            $('.next_appointment').addClass('d-none')

                        }
                        else {
                            $('#submit').text('Save Final Result')
                            $('#required_tests').addClass('d-none')
                            $('#meds').removeClass('d-none')
                            $('#general').removeClass('d-none')
                            $('.next_appointment').removeClass('d-none')
                            $('.condition').removeClass('d-none')
                            $('#medication').change(function () {

                                if ($(this).val() === 'add' || $(this).val() === 'change'){
                                    $('#medication_description').removeClass('d-none')
                                }
                                else{
                                    $('#medication_description').addClass('d-none')
                                }
                            })
                        }
                    })
                }
            })
        });
    </script>
@endsection
