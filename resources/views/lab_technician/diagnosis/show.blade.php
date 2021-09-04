@extends('layouts.common')

@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
@endsection

@section('page-title')
    Diagnosis - Patient
@endsection

@include('lab_technician.components.profile')

@section('content')

    <div class="row">
        <div class="card shadow mb-4 col-md-4 offset-md-1">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Complaint log</h6>
            </div>
            <div class="card-body">
                <ul style="line-height: 40px">
                    <li>Patient Name: <span><b>{{$diagnosis->complaint->patient->first_name . " " . $diagnosis->complaint->patient->last_name}}</b></span></li>
                    <li>Disease: <b>{{$diagnosis->complaint->patient->disease->scientific_name.'('.$diagnosis->complaint->patient->disease->common_name.')'}}</b></li>
                    <li>Age: <b>{{date('Y') - date('Y', strtotime($diagnosis->complaint->patient->birth_date))}} years</b></li>
                    <li> Diagnosed by: <b>Dr. {{$diagnosis->complaint->patient->doctor->first_name . " " . $diagnosis->complaint->patient->doctor->last_name}}</b></li>
                    <li>Hospital: <b>KCMC</b></li>
                </ul>
                <hr>
                <p>Tests required:</p>
                <p class="text-white bg-secondary p-3 rounded font-weight-bold">{{$diagnosis->required_tests}}</p>
                <hr>
            </div>
        </div>

        <div class="card shadow mb-4 col-md-6 ml-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Diagnosis Results</h6>
            </div>
            <div class="card-body">
                @if($diagnosis->lab_result)
                    <div class="mt-5 text-center">
                       <p> <i class="fas fa-check-circle fa-7x text-success"></i></p>
                        <h3>Diagnosis already tested!</h3>
                        <p><a href="{{route('download.lab-result', [$diagnosis->lab_result->id, $diagnosis->lab_result->test_document])}}" class="btn btn-success btn-sm">View the test result</a></p>

                    </div>
                @else
                    <form action="{{route('lab_results.store')}}" method="post" enctype="multipart/form-data" id="lab_results_form">
                        @csrf
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="diagnosis_id" value="{{$diagnosis->id}}">

                                <label for="">Upload test results document</label>
                                <small class="font-italic">(File type: image(png,jpg)/pdf, Max size: 2MB)</small> <br>
                                <input type="file" name="test_document" id="" class="@error('test_document') is-invalid @enderror">
                                @error('test_document')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>

                            <div class="pt-4">
                                <label for="">Remarks, Comments <small>(Optional)</small></label> <br>
                                <textarea name="remarks" id="" class="form-control @error('remarks') is-invalid @enderror" cols="30" rows="5"></textarea>
                                @error('remarks')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <a  class="btn btn-primary" data-toggle="modal" data-target="#labResultsConfirm">
                            Submit
                        </a>
                    </form>
                @endif
            </div>
        </div>
    </div>


@endsection
