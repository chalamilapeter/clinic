@extends('layouts.common')

@section('page-title')
    Patients - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')
    <div class="card shadow mb-4">
        <div>
            <a href="{{route('patients.create')}}" class="btn btn-info m-2">Add new patient</a>
        </div>
        <div class="card-header py-3 text-center">

            <h6 class="m-0 font-weight-bold text-primary">List of all patients</h6>
        </div>
        <div class="card-body text-center" >
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Disease</th>
                            <th>Age</th>
                            <th>Appointment date</th>
                            <th>Gender</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                       @if ($patients->count()>0)
                           @foreach($patients as $patient)
                               <tr>
                                   <td>{{$patient->first_name.' '.$patient->last_name}}</td>
                                   <td>{{$patient->disease->common_name}}</td>
                                   <td>{{$patient->birth_date}}</td>
                                   <td>{{$patient->appointment_date}}</td>
                                   <td>{{$patient->gender}}</td>
                                   <td>
                                       <a href="{{route('patients.show', $patient)}}" class="badge badge-info badge-sm">
                                          <small> <i class="fas fa-eye"></i></small>
                                       </a>

                                       <a href="{{route('patients.edit', $patient)}}" class="badge badge-warning">
                                           <small><i class="fas fa-user-edit"></i></small>
                                       </a>

                                       <form action="{{route('patients.destroy', $patient)}}" method="POST">
                                           @csrf
                                           @method('DELETE')
                                           <button type="submit" class="badge badge-danger">
                                               <small><i class="fas fa-trash-alt"></i></small>
                                           </button>
                                       </form>
                                   </td>
                               </tr>
                           @endforeach
                       @else
                           <tr class="text-center">
                               <td colspan="6">No Patients yet!</td>
                           </tr>
                       @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
