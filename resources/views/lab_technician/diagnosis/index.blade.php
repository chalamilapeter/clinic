@extends('layouts.common')

@section('page-title')
    Diagnosis - Technician
@endsection

@include('lab_technician.components.profile')

@section('content')

    <div class="card-body text-center" >
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Hospital</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @if ($diagnoses->count()>0)
                    @foreach($diagnoses as $diagnosis)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>KCMC</td>
                            <td>{{$diagnosis->complaint->patient->first_name." ".$diagnosis->complaint->patient->last_name}}</td>
                            <td>Dr. {{$diagnosis->complaint->patient->doctor->first_name." ".$diagnosis->complaint->patient->doctor->last_name}}</td>
                            <td>{{date('d M Y' , strtotime($diagnosis->created_at))}}</td>
                            <td>
                                @if($diagnosis->lab_result)
                                    <div class="badge badge-success">Tested</div>
                                @else
                                    <div class="badge badge-danger">untested</div>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('lab_tech.show', $diagnosis)}}" class="badge badge-info badge-sm">
                                    <small> <i class="fas fa-eye"></i></small>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center">
                        <td colspan="7">No Diagnoses yet!</td>
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
