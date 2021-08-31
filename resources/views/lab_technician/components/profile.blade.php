@section('name')

    @if(auth()->user()->lab_technician->first_name != null)
        {{auth()->user()->lab_technician->first_name . " " . auth()->user()->lab_technician->last_name }}
        <small> - {{auth()->user()->lab_technician->lab->name}}</small>
    @else
        {{auth()->user()->email}}
    @endif

@endsection
