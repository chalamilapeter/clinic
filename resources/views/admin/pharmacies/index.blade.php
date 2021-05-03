@extends('layouts.common')

@section('page-title')
    Pharmacies - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')
    <div class="row offset-md-1">
        <div class="card shadow mb-4 col-md-5 mr-2 ">
            <div class="card-header py-3 text-center">

                <h6 class="m-0 font-weight-bold text-primary">List of all Pharmacies</h6>
            </div>
            <div>
                <a href="{{route('pharmacies.create')}}" class="btn btn-info m-2">Add new Pharmacy</a>
            </div>

            <div class="card-body text-center" >
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Pharmacy Name</th>
                            <th>Pharmacy Location</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if ($pharmacies->count()>0)
                            @foreach($pharmacies as $pharmacy)
                                <tr>
                                    <td>{{$pharmacy->name}}</td>
                                    <td>{{$pharmacy->location}}</td>
                                    <td>
                                        <a href="{{route('pharmacies.show', $pharmacy)}}" class="badge badge-info badge-sm">
                                            <small> <i class="fas fa-eye"></i></small>
                                        </a>

                                        <a href="{{route('pharmacies.edit', $pharmacy)}}" class="badge badge-warning">
                                            <small><i class="fas fa-user-edit"></i></small>
                                        </a>

                                        <form action="{{route('pharmacies.destroy', $pharmacy)}}" method="POST">
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
                                <td colspan="6">No Pharmacy yet!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4 col-md-5">
            <div class="card-header py-3 text-center">
                <h6 class="m-0 font-weight-bold text-primary">List of all  Pharmacists</h6>
            </div>
            <div>
                <a href="{{route('pharmacists.create')}}" class="btn btn-info m-2">Add new  Pharmacist</a>
            </div>

            <div class="card-body text-center" >
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Pharmacist Name</th>
                            <th>Pharmacy</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if ($pharmacists->count()>0)
                            @foreach($pharmacists as $pharmacist)
                                <tr>
                                    <td>{{$pharmacist->pharmacist->first_name . " " . $pharmacist->pharmacist->last_name}}</td>
                                    <td>{{$pharmacist->pharmacist->pharmacy->name}}</td>

                                    <td>
                                        <a href="{{route('pharmacists.show', $pharmacist)}}" class="badge badge-info badge-sm">
                                            <small> <i class="fas fa-eye"></i></small>
                                        </a>

                                        <a href="{{route('pharmacists.edit', $pharmacist)}}" class="badge badge-warning">
                                            <small><i class="fas fa-user-edit"></i></small>
                                        </a>

                                        <form action="{{route('pharmacists.destroy', $pharmacist)}}" method="POST">
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
                                <td colspan="6">No Pharmacist yet!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection
