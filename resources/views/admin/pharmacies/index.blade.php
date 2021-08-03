@extends('layouts.common')

@section('page-title')
    Pharmacies - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-center">

                <h6 class="m-0 font-weight-bold text-primary">List of all Pharmacies</h6>
            </div>
            <div>
                <a href="{{route('pharmacies.create')}}" class="btn btn-info ml-4 my-2">Add new Pharmacy</a>
            </div>

            <div class="card-body text-center" >
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Pharmacy Name</th>
                            <th>Pharmacy Location</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if ($pharmacies->count()>0)
                            @foreach($pharmacies as $pharmacy)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$pharmacy->name}}</td>
                                    <td>{{$pharmacy->location}}</td>
                                    <td>
                                        <a href="{{route('pharmacies.show', $pharmacy)}}" class="badge badge-info badge-sm">
                                            <small> <i class="fas fa-eye"></i></small>
                                        </a>

                                        <a href="{{route('pharmacies.edit', $pharmacy)}}" class="badge badge-warning">
                                            <small><i class="fas fa-user-edit"></i></small>
                                        </a>

                                        <a class="badge badge-danger" onclick="event.preventDefault(); document.getElementById('pharmacyDelete').submit();">
                                            <small><i class="fas fa-trash-alt"></i></small>
                                        </a>

                                        <form action="{{route('pharmacies.destroy', $pharmacy)}}" method="POST" id="pharmacyDelete">
                                            @csrf
                                            @method('DELETE')
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
                <div class="d-flex align-items-center justify-content-center">
                    {{$pharmacies->links()}}
                </div>
            </div>
        </div>

@endsection
