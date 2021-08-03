@extends('layouts.common')

@section('page-title')
    Roles - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h6 class="m-0 font-weight-bold text-primary">List of all Roles</h6>
        </div>
        <div>
            <a href="{{route('roles.create')}}" class="btn btn-info my-2 ml-4">Add new Role</a>
        </div>

        <div class="card-body text-center" >
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Role ID</th>
                            <th>Role Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                           @forelse($roles as $role)
                               <tr>
                                   <td>{{$role->id}}</td>
                                   <td>{{$role->name}}</td>

                                   <td>
                                       <a class="badge badge-danger" onclick="event.preventDefault(); document.getElementById('roleDelete').submit();">
                                           <small><i class="fas fa-trash-alt"></i></small>
                                       </a>

                                       <form action="{{route('roles.destroy', $role)}}" method="POST" id="roleDelete">
                                           @csrf
                                           @method('DELETE')
                                       </form>
                                   </td>
                               </tr>
                           @empty
                               <tr class="text-center">
                                   <td colspan="6">No Roles yet!</td>
                               </tr>
                           @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
