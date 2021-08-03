@extends('layouts.common')

@section('page-title')
    Diagnoses- Doctor
@endsection

@include('doctor.components.profile')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h6 class="m-0 font-weight-bold text-primary">List of diagnoses from patients you are attending</h6>
        </div>
        <div class="card-body text-center" >
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Patient's name</th>
                        <th>Complaint & Diagnosis</th>
                        <th>Lab Results</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if ($diagnoses->count()>0)
                        @foreach($diagnoses as $diagnosis)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$diagnosis->complaint->user->patient->first_name.' '.$diagnosis->complaint->user->patient->last_name}}</td>
                                <td><a href="{{route('complaints.show', $diagnosis->complaint->id)}}"><i class="fas fa-eye mr-2"></i>View</a></td>
                                <td>
                                    @if($diagnosis->tests == "yes")
                                        @if($diagnosis->lab_result)
                                            <a href="{{route('download.lab-result', $diagnosis->lab_result->test_document)}}">Download document</a>
                                        @else
                                            <div class="badge badge-warning">Tests Pending</div>
                                        @endif
                                    @else
                                        Not required
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('results.show', $diagnosis)}}" class="badge badge-info badge-sm">
                                        <small> <i class="fas fa-poll-h"></i></small> Post Final results
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
            </div>
        </div>
    </div>


@endsection
