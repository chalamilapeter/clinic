@extends('layouts.common')

@section('page-title')
    Diseases - Admin
@endsection

@section('image')
    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
@endsection


@section('content')
    <div class="card shadow mb-4">
        <div>
            <a href="{{route('diseases.create')}}" class="btn btn-info m-2">Add new Disease</a>
        </div>
        <div class="card-header py-3 text-center">

            <h6 class="m-0 font-weight-bold text-primary">List of all Diseases</h6>
        </div>
        <div class="card-body text-center" >
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Common Name</th>
                            <th>Scientific Name</th>
                            <th>Visit interval (Months)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                       @if ($diseases->count()>0)
                           @foreach($diseases as $disease)
                               <tr>
                                   <td>{{$disease->common_name}}</td>
                                   <td>{{$disease->scientific_name}}</td>
                                   <td>{{$disease->months_interval}}</td>
                                   <td>
                                       <a href="{{route('diseases.show', $disease)}}" class="badge badge-info badge-sm">
                                          <small> <i class="fas fa-eye"></i></small>
                                       </a>

                                       <a href="{{route('diseases.edit', $disease)}}" class="badge badge-warning">
                                           <small><i class="fas fa-user-edit"></i></small>
                                       </a>

                                       <form action="{{route('diseases.destroy', $disease)}}" method="POST">
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
                               <td colspan="6">No Diseases yet!</td>
                           </tr>
                       @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
