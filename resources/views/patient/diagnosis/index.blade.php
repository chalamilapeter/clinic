@extends('layouts.common')

@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
@endsection

@section('page-title')
    Diagnosis - Patient
@endsection

@include('patient.components.profile')

@section('content')

    <div class="card-body text-center" >
        <h4 class="font-weight-bold">Diagnoses</h4>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Doctor</th>
                    <th>Appointment date</th>
                    <th>Lab status</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @if ($diagnoses->count()>0)
                    @foreach($diagnoses as $diagnosis)
                        <tr>
                            <td>{{$diagnosis->id}}</td>
                            <td>Dr. {{$diagnosis->complaint->doctor->first_name." ".$diagnosis->complaint->doctor->last_name}}</td>
                            <td>{{$diagnosis->complaint->created_at->format('d F Y')}}</td>
                            <td>{!!  $diagnosis->lab ? '<badge class = "badge badge-success"> Confirmed </badge>': '<badge class = "badge badge-danger"> Unconfirmed </badge>' !!}</td>
                            <td>
                                <a href="{{route('diagnosis.show', $diagnosis)}}" class="badge badge-info badge-sm">
                                    <small> <i class="fas fa-eye"></i></small>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center">
                        <td colspan="6">No Diagnoses yet!</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-2">
                {{$diagnoses->links()}}
            </div>
        </div>
    </div>


@endsection
