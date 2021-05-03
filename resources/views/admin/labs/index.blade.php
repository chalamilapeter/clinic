@extends('layouts.common')

@section('page-title')
    Laboratories - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')
    <div class="row offset-md-1">
        <div class="card shadow mb-4 col-md-5 mr-2 ">
            <div class="card-header py-3 text-center">

                <h6 class="m-0 font-weight-bold text-primary">List of all Laboratories</h6>
            </div>
            <div>
                <a href="{{route('labs.create')}}" class="btn btn-info m-2">Add new Laboratory</a>
            </div>

            <div class="card-body text-center" >
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Lab Name</th>
                            <th>Lab Location</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if ($labs->count()>0)
                            @foreach($labs as $lab)
                                <tr>
                                    <td>{{$lab->name}}</td>
                                    <td>{{$lab->location}}</td>
                                    <td>
                                        <a href="{{route('labs.show', $lab)}}" class="badge badge-info badge-sm">
                                            <small> <i class="fas fa-eye"></i></small>
                                        </a>

                                        <a href="{{route('labs.edit', $lab)}}" class="badge badge-warning">
                                            <small><i class="fas fa-user-edit"></i></small>
                                        </a>

                                        <form action="{{route('roles.destroy', $lab)}}" method="POST">
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
                                <td colspan="6">No Laboratories yet!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4 col-md-5">
            <div class="card-header py-3 text-center">
                <h6 class="m-0 font-weight-bold text-primary">List of all  Lab Technicians</h6>
            </div>
            <div>
                <a href="{{route('lab_technicians.create')}}" class="btn btn-info m-2">Add new Lab technician</a>
            </div>

            <div class="card-body text-center" >
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Technician Name</th>
                            <th>Laboratory</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if ($lab_techs->count()>0)
                            @foreach($lab_techs as $lab_tech)
                                <tr>
                                    <td>{{$lab_tech->lab_technician->first_name . " " . $lab_tech->lab_technician->last_name}}</td>
                                    <td>{{$lab_tech->lab_technician->lab->name}}</td>

                                    <td>
                                        <a href="{{route('labs.show', $lab_tech)}}" class="badge badge-info badge-sm">
                                            <small> <i class="fas fa-eye"></i></small>
                                        </a>

                                        <a href="{{route('labs.edit', $lab_tech)}}" class="badge badge-warning">
                                            <small><i class="fas fa-user-edit"></i></small>
                                        </a>

                                        <form action="{{route('roles.destroy', $lab)}}" method="POST">
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
                                <td colspan="6">No Technicians yet!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection
