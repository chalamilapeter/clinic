@extends('layouts.common')

@section('page-title')
    Laboratories - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-center">

                <h6 class="m-0 font-weight-bold text-primary">List of all Laboratories</h6>
            </div>
            <div>
                <a href="{{route('labs.create')}}" class="btn btn-info mt-2 ml-4">Add new Laboratory</a>
            </div>

            <div class="card-body text-center" >
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Lab Name</th>
                            <th>Lab Location</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @forelse($labs as $lab)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$lab->name}}</td>
                                    <td>{{$lab->location}}</td>
                                    <td>
                                        <a href="{{route('labs.show', $lab)}}" class="badge badge-info badge-sm">
                                            <small> <i class="fas fa-eye"></i></small>
                                        </a>

                                        <a href="{{route('labs.edit', $lab)}}" class="badge badge-warning">
                                            <small><i class="fas fa-user-edit"></i></small>
                                        </a>

                                        <a class="badge badge-danger" onclick="event.preventDefault(); document.getElementById('deleteLab').submit();">
                                            <small><i class="fas fa-trash-alt"></i></small>
                                        </a>

                                        <form action="{{route('roles.destroy', $lab)}}" method="POST" id="deleteLab">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="6">No Laboratories yet!</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
