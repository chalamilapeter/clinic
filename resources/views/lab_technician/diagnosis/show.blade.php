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
                    <li>Patient Name: <span><b>{{$diagnosis->complaint->user->patient->first_name . " " . $diagnosis->complaint->user->patient->last_name}}</b></span></li>
                    <li>Disease: <b>{{$diagnosis->complaint->user->patient->disease->scientific_name.'('.$diagnosis->complaint->user->patient->disease->common_name.')'}}</b></li>
                    <li>Age: <b>{{date('Y') - date('Y', strtotime($diagnosis->complaint->user->patient->birth_date))}} years</b></li>
                    <li> Diagnosed by: <b>Dr. {{$diagnosis->user->doctor->first_name . " " . $diagnosis->user->doctor->last_name}}</b></li>
                    <li>Hospital: <b>KCMC</b></li>
                </ul>
                <hr>
                <p>Tests required:</p>
                <p class="text-info font-weight-bold">{{$diagnosis->required_tests}}</p>
                <hr>
            </div>
        </div>

        <div class="card shadow mb-4 col-md-6 ml-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Diagnosis Results</h6>
            </div>
            <div class="card-body">
                <form action="{{route('lab_results.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                       <div>
                           <input type="hidden" name="diagnosis_id" value="{{$diagnosis->id}}">
                           <input type="hidden" name="user_id" value="{{auth()->id()}}">
                           <label for="">Upload test results document</label>
                           <small class="font-italic">(File type: pdf, Max size: 2MB)</small> <br>
                           <input type="file" name="test_document" id="" class="@error('test_document') is-invalid @enderror">
                           @error('test_document')
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                           @enderror
                       </div>

                        <div class="pt-4">
                            <label for="">Remarks, Comments</label> <br>
                            <textarea name="remarks" id="" class="form-control @error('remarks') is-invalid @enderror" cols="30" rows="5"></textarea>
                            @error('remarks')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info">Upload Result</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
