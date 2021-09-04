@extends('layouts.common')

@section('page-title')
    Lab Results - Doctor
@endsection

@include('doctor.components.profile')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h6 class="m-0 font-weight-bold text-primary">List of lab results of diagnoses from patients you are attending</h6>
        </div>
        <div class="card-body text-center" >
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Patient's name</th>
                        <th>Laboratory</th>
                        <th>Lab Results Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if ($diagnoses->count()>0)
                        @foreach($diagnoses as $diagnosis)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$diagnosis->complaint->patient->first_name.' '.$diagnosis->complaint->patient->last_name}}</td>
                                <td>{{$diagnosis->lab_result ? $diagnosis->lab->name : 'Unconfirmed'}}</td>
                                <td>
                                    {!! $diagnosis->lab_result ? '<span class = "badge badge-success"> Tested </span>' : 'Unconfirmed' !!}
                                </td>
                                <td>
                                    <a href="{{route('diagnosis.show', $diagnosis)}}" class="badge badge-info badge-sm">
                                        <small> <i class="fas fa-eye"></i></small>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td colspan="6">No Complaints yet!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-2">
                    {{$diagnoses->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection
