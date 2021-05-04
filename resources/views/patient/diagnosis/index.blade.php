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
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Doctor</th>
                    <th>Appointment date</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @if ($diagnosis->count()>0)
                    @foreach($diagnosis as $diag)
                        <tr>
                            <td>{{$diag->id}}</td>
                            <td>Dr. {{$diag->user->doctor->first_name." ".$diag->user->doctor->last_name}}</td>
                            <td>{{date('d M Y' , strtotime($diag->complaint->created_at))}}</td>
                            <td>
                                <a href="{{route('diagnosis.show', $diag)}}" class="badge badge-info badge-sm">
                                    <small> <i class="fas fa-eye"></i></small>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center">
                        <td colspan="6">No Diagnosis yet!</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>


@endsection
