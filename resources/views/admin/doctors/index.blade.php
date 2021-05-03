@extends('layouts.common')

@section('page-title')
    Doctors - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')
    <div class="card shadow mb-4">
        <div>
            <a href="{{route('doctors.create')}}" class="btn btn-info m-2">Add new Doctor</a>
        </div>
        <div class="card-header py-3 text-center">

            <h6 class="m-0 font-weight-bold text-primary">List of all Doctors</h6>
        </div>
        <div class="card-body text-center" >
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Specialty</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                       @if ($doctors->count()>0)
                           @foreach($doctors as $doctor)
                               <tr>
                                   <td>Dr. {{$doctor->first_name.' '.$doctor->last_name}}</td>
                                   <td>{{$doctor->speciality}}</td>
                                   <td>{{$doctor->birth_date}}</td>
                                   <td>{{$doctor->address}}</td>
                                   <td>{{$doctor->gender}}</td>
                                   <td>
                                       <a href="{{route('doctors.show', $doctor)}}" class="badge badge-info badge-sm">
                                          <small> <i class="fas fa-eye"></i></small>
                                       </a>

                                       <a href="{{route('doctors.edit', $doctor)}}" class="badge badge-warning">
                                           <small><i class="fas fa-user-edit"></i></small>
                                       </a>

                                       <form action="{{route('doctors.destroy', $doctor)}}" method="POST">
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
                               <td colspan="6">No Doctors yet!</td>
                           </tr>
                       @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
