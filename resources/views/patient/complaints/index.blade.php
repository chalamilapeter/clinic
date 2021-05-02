@extends('layouts.common')

@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
@endsection

@section('page-title')
    Complaints - Patient
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')

    <div class="row">
        <div class="card shadow mb-4 col-md-4 offset-md-1">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Appointment Info</h6>
            </div>
            <div class="card-body">
                <p>Appointment date (each month): <span class="text-info font-weight-bold">{{date('d')}}</span></p>
                <p>Can you make an appointment right now? <span class="text-success font-weight-bold">Yes</span></p>
            </div>
        </div>

        <div class="card shadow mb-4 col-md-6 ml-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Complaints Log</h6>
            </div>
            <div class="card-body">
                <form action="{{route('complaints.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="message">Describe how you feel since your last appointment</label>
                        <textarea class="form-control @error('message') is-invalid @enderror"
                                 name="message" value="{{ old('message') }}" rows="7">
                        </textarea>

                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script>
        ClassicEditor
            .create( document.querySelector( '#message' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
