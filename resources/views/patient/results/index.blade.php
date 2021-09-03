@extends('layouts.common')

@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
@endsection

@section('page-title')
    Results - Patient
@endsection

@include('patient.components.profile')

@section('content')

    <div class="card-body text-center" >
        <h4 class="font-weight-bold">Results</h4>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Doctor</th>
                    <th>Appointment date</th>
                    <th>General condition</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @if ($results->count()>0)
                    @foreach($results as $result)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>Dr. {{$doctor}}</td>
                            <td>{{$result->complaint->created_at->format('d F Y')}}</td>
                            <td>
                                @if($result->condition === "Critical")
                                    <span class="badge badge-danger">Critical</span>
                                @elseif($result->condition === "Bad")
                                    <span class="badge badge-warning">Bad</span>
                                @elseif($result->condition === "Normal")
                                    <span class="badge badge-secondary">Normal</span>
                                @elseif($result->condition === "Good")
                                    <span class="badge badge-info">Good</span>
                                @elseif($result->condition === "Excellent")
                                    <span class="badge badge-success">Excellent</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('results.show', $result)}}" class="badge badge-info badge-sm">
                                    <small> <i class="fas fa-eye"></i></small>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center">
                        <td colspan="6">No results yet!</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-2">
                {{$results->links()}}
            </div>
        </div>
    </div>


@endsection
