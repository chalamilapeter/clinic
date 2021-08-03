@extends('layouts.common')

@section('page-title')
    Complaints- Doctor
@endsection

@include('doctor.components.profile')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h6 class="m-0 font-weight-bold text-primary">List of complaints from patients you are attending</h6>
        </div>
        <div class="card-body text-center" >
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Patient's name</th>
                        <th>Disease</th>
                        <th>Age</th>
                        <th>Appointment date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if ($complaints->count()>0)
                        @foreach($complaints as $complaint)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$complaint->user->patient->first_name.' '.$complaint->user->patient->last_name}}</td>
                                <td>{{$complaint->user->patient->disease->common_name}}</td>
                                <td>{{date('Y') - date('Y', strtotime($complaint->user->patient->birth_date))}}</td>
                                <td>{{date('d M Y', strtotime($complaint->created_at))}}</td>
                                <td>
                                    @if($complaint->status == 'diagnosed')
                                        <div class="badge badge-success">Diagnosed</div>
                                    @else
                                        <div class="badge badge-danger">undiagnosed</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('complaints.show', $complaint)}}" class="badge badge-info badge-sm">
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
                    {{$complaints->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection
