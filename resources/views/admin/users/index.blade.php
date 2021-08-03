@extends('layouts.common')

@section('page-title')
    Users - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">All Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#doctors">Doctors</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#patients">Patients</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#technicians">Lab Technicians</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#pharmacists">Pharmacists</a>
        </li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <div class="tab-pane container active" id="home">
            <div class="card shadow my-4">

                <div class="card-header py-3 text-center">

                    <h6 class="m-0 font-weight-bold text-primary">List of all Users</h6>
                </div>
                <div class="card-body text-center" >
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                            </thead>

                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role->name}}</td>
                                    </tr>

                                    @empty
                                        <tr class="text-center">
                                            <td colspan="6">No Doctors yet!</td>
                                        </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane container fade" id="doctors">
            <div class="card shadow my-4">
                <div class="card-header py-3 text-center">
                    <h6 class="m-0 font-weight-bold text-primary">List of all Doctors</h6>
                </div>
                <div>
                    <a href="{{route('doctors.create')}}" class="btn btn-info m-2">Add new Doctor</a>
                </div>
                <div class="card-body text-center" >
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Specialty</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                                @forelse($doctors as $doctor)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>Dr. {{$doctor->doctor->first_name.' '.$doctor->doctor->last_name}}</td>
                                        <td>{{$doctor->doctor->speciality}}</td>
                                        <td>{{date('Y') - date('Y', strtotime($doctor->doctor->birth_date))}}</td>
                                        <td>{{$doctor->doctor->address}}</td>
                                        <td>{{$doctor->doctor->gender}}</td>
                                        <td>
                                            <a href="{{route('doctors.show', $doctor)}}" class="badge badge-info badge-sm">
                                                <small> <i class="fas fa-eye"></i></small>
                                            </a>

                                            <a href="{{route('doctors.edit', $doctor)}}" class="badge badge-warning">
                                                <small><i class="fas fa-user-edit"></i></small>
                                            </a>

                                            <a class="badge badge-danger" onclick="event.preventDefault(); document.getElementById('deleteDoctor').submit();">
                                                <small><i class="fas fa-trash-alt"></i></small>
                                            </a>

                                            <form action="{{route('doctors.destroy', $doctor)}}" method="POST" id="deleteDoctor">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                  @empty
                                    <tr class="text-center">
                                        <td colspan="6">No Doctors yet!</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        {{$doctors->links()}}
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane container fade" id="patients">
            <div class="card shadow my-4">
                <div class="card-header py-3 text-center">
                    <h6 class="m-0 font-weight-bold text-primary">List of all Patients</h6>
                </div>
                <div>
                    <a href="{{route('patients.create')}}" class="btn btn-info m-2">Add new Patient</a>
                </div>
                <div class="card-body text-center" >
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Disease</th>
                                <th>Age</th>
                                <th>Appointment date</th>
                                <th>Gender</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                                @forelse($patients as $patient)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$patient->patient->first_name.' '.$patient->patient->last_name}}</td>
                                        <td>{{$patient->patient->disease->common_name}}</td>
                                        <td>{{date('Y') - date('Y', strtotime($patient->patient->birth_date))}}</td>
                                        <td>{{$patient->patient->appointment_date}}</td>
                                        <td>{{$patient->patient->gender}}</td>
                                        <td>
                                            <a href="{{route('patients.show', $patient)}}" class="badge badge-info badge-sm">
                                                <small> <i class="fas fa-eye"></i></small>
                                            </a>

                                            <a href="{{route('patients.edit', $patient)}}" class="badge badge-warning">
                                                <small><i class="fas fa-user-edit"></i></small>
                                            </a>

                                            <a class="badge badge-danger" onclick="event.preventDefault(); document.getElementById('patientDelete').submit();">
                                                <small><i class="fas fa-trash-alt"></i></small>
                                            </a>

                                            <form action="{{route('patients.destroy', $patient)}}" method="POST" id="patientDelete">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                   @empty
                                    <tr class="text-center">
                                        <td colspan="6">No Patients yet!</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        {{$patients->links()}}
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane container fade" id="technicians">
            <div class="card shadow my-4">
                <div>
                    <a href="{{route('lab_technicians.create')}}" class="btn btn-info m-2">Add new Lab technician</a>
                </div>

                <div class="card-header py-3 text-center">
                    <h6 class="m-0 font-weight-bold text-primary">List of all  Lab Technicians</h6>
                </div>

                <div class="card-body text-center" >
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Technician Name</th>
                                <th>Laboratory</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @forelse($technicians as $lab_tech)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$lab_tech->lab_technician->first_name . " " . $lab_tech->lab_technician->last_name}}</td>
                                        <td>{{$lab_tech->lab_technician->lab->name}}</td>

                                        <td>
                                            <a href="{{route('labs.show', $lab_tech)}}" class="badge badge-info badge-sm">
                                                <small> <i class="fas fa-eye"></i></small>
                                            </a>

                                            <a href="{{route('labs.edit', $lab_tech)}}" class="badge badge-warning">
                                                <small><i class="fas fa-user-edit"></i></small>
                                            </a>

                                            <a class="badge badge-danger" onclick="event.preventDefault(); document.getElementById('technicianDelete').submit();">
                                                <small><i class="fas fa-trash-alt"></i></small>
                                            </a>

                                            <form action="{{route('lab_technicians.destroy', $lab_tech)}}" method="POST" id="technicianDelete">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>

                                 @empty
                                    <tr class="text-center">
                                        <td colspan="6">No Technicians yet!</td>
                                    </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        {{$technicians->links()}}
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane container fade" id="pharmacists">
            <div class="card shadow my-4">
                <div>
                    <a href="{{route('pharmacists.create')}}" class="btn btn-info m-2">Add new  Pharmacist</a>
                </div>

                <div class="card-header py-2 text-center">
                    <h6 class="m-0 font-weight-bold text-primary">List of all  Pharmacists</h6>
                </div>

                <div class="card-body text-center" >
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Pharmacist Name</th>
                                <th>Pharmacy</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @forelse($pharmacists as $pharmacist)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pharmacist->pharmacist->first_name . " " . $pharmacist->pharmacist->last_name}}</td>
                                        <td>{{$pharmacist->pharmacist->pharmacy->name}}</td>

                                        <td>
                                            <a href="{{route('pharmacists.show', $pharmacist)}}" class="badge badge-info badge-sm">
                                                <small> <i class="fas fa-eye"></i></small>
                                            </a>

                                            <a href="{{route('pharmacists.edit', $pharmacist)}}" class="badge badge-warning">
                                                <small><i class="fas fa-user-edit"></i></small>
                                            </a>

                                            <a class="badge badge-danger" onclick="event.preventDefault(); document.getElementById('pharmacistDelete').submit();">
                                                <small><i class="fas fa-trash-alt"></i></small>
                                            </a>

                                            <form action="{{route('pharmacists.destroy', $pharmacist)}}" method="POST" id="pharmacistDelete">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="6">No Pharmacist yet!</td>
                                    </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        {{$pharmacists->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
